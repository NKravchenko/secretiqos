<?php

namespace Affect\MiniWebBundle\Controller;

use Affect\MiniCoreBundle\Entity\User;
use Affect\MiniCoreBundle\Enum\AgencyType;
use Affect\MiniCoreBundle\Form\Type\UserAnketaType;
use Affect\MiniCoreBundle\Repository\QuestionRepository;
use Symfony\Component\HttpFoundation\Request;

class QuizController extends MController
{

    public function indexAction()
    {
        /** @var QuestionRepository $questionRepository */
        $questionRepository = $this->getRepository('Question');

        $questions = $questionRepository->findBy([], ['id' => 'ASC']);

        return $this->render(
            'MiniWebBundle:Quiz:index.html.twig',
            [
                'questions' => $questions,
            ]
        );
    }

    public function createAction(Request $request)
    {
        /** @var User $user */
        $user         = $this->getUser();
        $responseRepo = $this->getRepository('Response');

        $responsesReq = $request->get('response', []);

        foreach ($responsesReq as $qId => $rId) {
            if (null !== ($response = $responseRepo->findOneBy(['id' => $rId, 'question' => $qId]))) {
                $user->addResponse($response);
            }
        }

        $em = $this->getManager();
        $em->persist($user);
        $em->flush();

        return $this->redirectToRoute('affect_mini_quiz_anketa');
    }

    /**
     * anketa step1
     */
    public function anketaNewAction()
    {
        /** @var User $user */
        $user = $this->getUser();

        if( AgencyType::MP == $user->getReffered() || AgencyType::RSVP == $user->getReffered()){
            return $this->render('MiniWebBundle:Quiz:anketaOK.html.twig');
        }

        $userAnketaForm = $this->createForm(new UserAnketaType(), new User());

        return $this->render(
            'MiniWebBundle:Quiz:anketa.html.twig',
            [
                'form' => $userAnketaForm->createView(),
                'user' => $user,
            ]
        );
    }

    /**
     * anketa step2
     */
    public function anketaCreateAction(Request $request)
    {

        if (null === ($user = $this->getUser())) {
            return $this->redirectToRoute('affect_mini_homepage');
        }

        $userReq = $request->get('User');

        $userRepo = $this->getRepository('User');
        $user     = $userRepo->find($user->getId());

        $userAnketaForm = $this->createForm(new UserAnketaType(), $user);
        $userAnketaForm->submit($userReq);

        if ($userAnketaForm->isValid()) {
            /** @var User $user */
            $user = $userAnketaForm->getNormData();
            $session = $request->getSession();

            $user->setReffered($session->get('ref'));

            $em = $this->getManager();
            $em->persist($user);
            $em->flush($user);
        } else {
            return $this->render(
                'MiniWebBundle:Quiz:anketa.html.twig',
                [
                    'form' => $userAnketaForm->createView(),
                ]
            );
        }

        //OK
//        return $this->redirectToRoute('affect_mini_quiz_anketa');
        return $this->render('MiniWebBundle:Quiz:anketaOK.html.twig');
    }
}
