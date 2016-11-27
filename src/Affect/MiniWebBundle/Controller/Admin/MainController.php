<?php

namespace Affect\MiniWebBundle\Controller\Admin;

use Affect\MiniCoreBundle\Entity\User;
use Affect\MiniCoreBundle\Enum\AgencyType;
use Affect\MiniCoreBundle\Enum\CriteriaMatchType;
use Affect\MiniCoreBundle\Enum\RegisteredInProgramType;
use Affect\MiniCoreBundle\Enum\StatusType;
use Affect\MiniCoreBundle\Enum\TypeOfRecruitmentType;
use Affect\MiniCoreBundle\Enum\TypeOfSurveyType;
use Affect\MiniCoreBundle\Repository\UserRepository;
use Affect\MiniWebBundle\Controller\MController;
use Affect\MiniWebBundle\View\AjaxResult;
use FOS\UserBundle\Mailer\TwigSwiftMailer;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends MController
{
    public function indexAction()
    {
        $user = $this->getUser();

        /** @var UserRepository $userRepo */
        $userRepo = $this->getRepository('User');

        $params = [];

        if ($user->hasRole('ROLE_MP')) {
            $params['agency'] = AgencyType::MP;
        }

        if ($user->hasRole('ROLE_RSVP')) {
            $params['agency'] = AgencyType::RSVP;
        }

        if ($this->isGranted('ROLE_VIEW_PR')) {
            $params['pr'] = true;
        }

        if ($this->isGranted('ROLE_VIEW_NOT_MATCH_USERS')) {
            $params['view_not_match_users'] = true;
        }

        $users = $userRepo->findByAdminCredentials($params);

        return $this->render(
            'MiniWebBundle:Admin/Main:index.html.twig',
            [
                'users' => $users,
            ]
        );
    }

    public function paramUpdateAction(Request $request)
    {
        $result              = new AjaxResult();
        $result->contentName = 'inline';

        $userId        = $request->get('id');
        $paramStatusId = $request->get('status');
        $paramType     = $request->get('type');

        $userRepo = $this->getRepository('User');

        $mailTemplateName = false;
        /** @var User $user */
        if (null !== ($user = $userRepo->findOneBy(['id' => $userId]))) {
            switch ($paramType) {
                case 'matchCriteria':
                    $user->setMatchCriteria($paramStatusId);
                    if (CriteriaMatchType::NO == $paramStatusId) {
                        $user->setStatus(null);
                    }
                    break;
                case 'status':
                    $user->setStatus($paramStatusId);
                    if (StatusType::VIP == $user->getStatus()) {
                        $user->setTypeOfRecruitment(TypeOfRecruitmentType::PR);
                    }
                    if (StatusType::NO == $paramStatusId) {
                        $mailTemplateName = 'MiniWebBundle:Mailer:userNotMatch.html.twig';
                    }
                    break;
                case 'regInProgramm':
                    $user->setRegInProgramm($paramStatusId);
                    break;
                case 'typeOfSurvey':
                    $user->setTypeOfSurvey($paramStatusId);
                    break;
                case 'typeOfRecruitment':
                    if (StatusType::VIP != $user->getStatus()) {
                        $user->setTypeOfRecruitment($paramStatusId);
                    }
                    break;
            }
            $em = $this->getManager();

            $em->persist($user);
            $em->flush();

            $result->content = $this->render(
                'MiniWebBundle:Admin/Main:userItem.html.twig',
                [
                    'user' => $user,
                ]
            )->getContent();

            //--mailing
            $mailParameters = ['user' => $user];
            if ($mailTemplateName) {
                /** @var TwigSwiftMailer $mailer */
                $mailer     = $this->getMailer();
                $sendResult = $mailer->sendEmail(
                    $mailTemplateName,
                    $mailParameters,
                    [$this->container->getParameter('mailer_user') => $this->container->getParameter('mailer_user_name')],
                    $user->getEmail()
                );
            }
            //--/mailing
        } else {
            $result->error = 'User not found';
        }

        return new JsonResponse($result);
    }

    public function allGenerateReportAction()
    {
        $user = $this->getUser();

        /** @var UserRepository $userRepo */
        $userRepo = $this->getRepository('User');

        $params = [];

        if ($user->hasRole('ROLE_MP')) {
            $params['agency'] = AgencyType::MP;
        }

        if ($user->hasRole('ROLE_RSVP')) {
            $params['agency'] = AgencyType::RSVP;
        }

        if ($this->isGranted('ROLE_VIEW_PR')) {
            $params['pr'] = true;
        }

        if ($this->isGranted('ROLE_VIEW_NOT_MATCH_USERS')) {
            $params['view_not_match_users'] = true;
        }

        $users = $userRepo->findByAdminCredentials($params);

        $data = [];
        /**
         * @var User $row
         */
        foreach ($users as $key => $row) {
            $data[$key]['createdAt']         = $row->getCreatedAt()->format('Y-m-d');
            $data[$key]['firstName']         = $row->getFirstName();
            $data[$key]['surnameName']       = $row->getSurnameName();
            $data[$key]['referrerFirstName'] = $row->getReferrerFirstName();

            $smList = "";
            foreach ($row->getSocialprofiles() as $sm => $smProfile) {
                $smList .= "$sm|$smProfile ";
            }

            $data[$key]['sm'] = $smList;

            $data[$key]['mobile'] = $row->getMobile();
            $data[$key]['email']  = $row->getEmail();

            $data[$key]['criteria']    = (!$row->getMatchCriteria()) ? '-' : new CriteriaMatchType($row->getMatchCriteria());
            $data[$key]['status']      = (!$row->getStatus()) ? '-' : new StatusType($row->getStatus());
            $data[$key]['programm']    = (!$row->getRegInProgramm()) ? '-' : new RegisteredInProgramType($row->getRegInProgramm());
            $data[$key]['survey']      = (!$row->getTypeOfSurvey()) ? '-' : new TypeOfSurveyType($row->getTypeOfSurvey());
            $data[$key]['recruitment'] = (!$row->getTypeOfRecruitment()) ? '-' : new TypeOfRecruitmentType($row->getTypeOfRecruitment());
            $data[$key]['ref']         = (!$row->getReffered()) ? '-' : new AgencyType($row->getReffered());
        }

        $showRef =  ($this->isGranted('ROLE_PM_USER'))?true:false;
        $report = $this->getExcelExportService()->createAllUsersReport($data, $showRef);

        return $report->sendAllUsersReport();
    }


    /** @return TwigSwiftMailer */
    protected function getMailer()
    {
        return $this->get('affect.service.mailer');
    }
}
