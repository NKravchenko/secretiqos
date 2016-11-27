<?php

namespace Affect\MiniWebBundle\Controller;

use Affect\MiniCoreBundle\Entity\User;
use Affect\MiniCoreBundle\Sm\Adapter\InstagramAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response as HttpResponse;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class SmController extends MController
{

    /**
     * тут проверяем добавлена ли уже выбранная соцсеть
     * готовим ссылку на авторизацию в соцсеть...
     * редиректим юзера на авторизацию...
     *
     * @param $sm
     * @param Request $request
     *
     * @return Response
     */
    public function smAddAction($sm, Request $request)
    {
//        $smId      = $request->get('sm');
        $smId      = $sm;
        $smFactory = $this->get('affect.sm.adapter_factory');
        $smAdapter = $smFactory->getSmAdapter($smId);

//        $f1UserBoosterRepository = $this->getRepository('F1UserBooster');
//
//        $f1User = $this->getUser();
//
//        if (null !== ($f1UserBooster = $f1UserBoosterRepository->findOneBy(
//                ['boosterType' => F1BoosterType::BOOSTER_SOCIAL, 'f1User' => $f1User]
//            ))
//        ) {
//            return new Response('бустер не активирован');
//        }

        $redirectUri = $this->generateUrl('affect_mini_sm_login', ['smId' => $smId], UrlGeneratorInterface::ABSOLUTE_URL);
        $authUrl     = $smAdapter->getAuthUrl($redirectUri);

        return $this->redirect($authUrl);
    }

    /**
     * сюда юзер приходит после авторизации в соцсети...
     * определяем сеть, подключаем адаптер...
     *  -> разбор ответа, подтягивание токена, получение профиля...
     *
     * @param $smId
     * @param Request $request
     *
     * @return Response
     */
    public function smLoginAction($smId, Request $request)
    {
        $userRepo = $this->getRepository('User');
        /** @var User $user */
        $user     = $userRepo->find($this->getUser()->getId());

        $smFactory = $this->get('affect.sm.adapter_factory');
        /** @var InstagramAdapter $smAdapter */
        if (false === ($smAdapter = $smFactory->getSmAdapter($smId))) {
            return new Response('Page not found', 404);
        }

        //нужно для запроса токена
        $redirectUri = $this->generateUrl('affect_mini_sm_login', ['smId' => $smId], UrlGeneratorInterface::ABSOLUTE_URL);

        $token = $smAdapter->getToken($request, $redirectUri);

        $profile = $smAdapter->getBasicProfile($token);

        $smResult   = false;
        $resultHtml = 'Cетевой профиль не подключен';

        if ($profile) {

            $em     = $this->getManager();

            switch($smId){
                case 'fb':
                    $user->setFacebookId($profile['idForUrl']);
                    $user->setFacebookAccessToken($profile['id']);
                    break;
                case 'ig':
                    $user->setInstagramId($profile['idForUrl']);
                    $user->setInstagramAccessToken($profile['id']);
                    break;
                case 'tw':
                    $user->setTwitterId($profile['idForUrl']);
                    $user->setTwitterAccessToken($profile['id']);
                    break;
            }

            $em->persist($user);
            $em->flush();

            $smResult = true;

            $resultHtml = $this->render(
                'MiniWebBundle:Sm:smList.html.twig',
                [
                    'user' => $this->getUser(),
                ]
            )->getContent();
        }

        $result = $this->render(
            'MiniWebBundle:Sm:result.html.twig',
            [
                'result'     => $smResult,
                'resultHtml' => $resultHtml,
            ]
        );

        return $result;
    }

}
