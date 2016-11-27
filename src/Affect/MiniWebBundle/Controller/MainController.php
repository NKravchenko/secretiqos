<?php

namespace Affect\MiniWebBundle\Controller;

use Affect\MiniCoreBundle\Enum\AgencyType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class MainController extends Controller
{

    public function indexAction(Request $request)
    {
        //проверим сессию, если не реферал то 404
        $session = $request->getSession();

        $ref = $session->get('ref');
        switch ($ref) {
            case AgencyType::MP:
                $agencyRef = 'MP';
                break;
            case AgencyType::RSVP:
                $agencyRef = 'RSVP';
                break;
            default:
                throw new NotFoundHttpException();
        }


        $user = $this->getUser();
        if ($user && (AgencyType::MP === $user->getReffered() || AgencyType::RSVP === $user->getReffered())) {
            return $this->render('MiniWebBundle:Quiz:anketaOK.html.twig');
        }

        if ($user) {
            return $this->redirectToRoute('affect_mini_quiz_anketa');
        }

        return $this->render('MiniWebBundle:Main:index.html.twig', ['ref' => $agencyRef]);
    }

    public function referalAction($refId, Request $request)
    {
        $session = $request->getSession();

        switch ($refId) {
            case 'mp':
            case 'M9LFKF56FA':
                $session->set('ref', AgencyType::MP);

                return $this->redirectToRoute('affect_mini_homepage');
                break;
            case 'rsvp':
            case 'R7HSHJ825Y':
                $session->set('ref', AgencyType::RSVP);

                return $this->redirectToRoute('affect_mini_homepage');
                break;
        }

        throw new NotFoundHttpException();
    }
}
