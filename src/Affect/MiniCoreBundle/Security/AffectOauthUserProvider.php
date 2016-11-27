<?php

namespace Affect\MiniCoreBundle\Security;

use Affect\MiniCoreBundle\Blog\Adapter\VkontakteAdapter;
use Affect\MiniCoreBundle\Entity\User;
use FOS\UserBundle\Model\UserInterface as FOSUserInterface;
use HWI\Bundle\OAuthBundle\OAuth\Response\UserResponseInterface;
use HWI\Bundle\OAuthBundle\Security\Core\User\FOSUBUserProvider;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;

class AffectOauthUserProvider extends FOSUBUserProvider
{
    public function loadUserByOAuthUserResponse(UserResponseInterface $response)
    {
        try {
            return parent::loadUserByOAuthUserResponse($response);
        } catch (UsernameNotFoundException $e) {
            if (null !== $response->getEmail()) {
                $user = $this->userManager->findUserByUsernameOrEmail($response->getEmail());
            } else {
                $user = $this->userManager->findUserByUsername($response->getNickname());
            }

            if ($user) {
                return $this->updateUserByOAuthUserResponse($user, $response);
            }

            return $this->createUserByOAuthUserResponse($response);
        }
    }

    public function connect(UserInterface $user, UserResponseInterface $response)
    {
        $this->updateUserByOAuthUserResponse($user, $response);
        $this->userManager->updateUser($user);
    }

    protected function createUserByOAuthUserResponse(UserResponseInterface $response)
    {
        /** @var User $user */
        $user = $this->userManager->createUser();
        $this->updateUserByOAuthUserResponse($user, $response);

        $providerName  = $response->getResourceOwner()->getName();

        if (null !== $email = $response->getEmail()) {
            $user->setEmail($email);
        }

        $resp = $response->getResponse();

        $username = '';
        if (isset($resp["response"]) && is_array($resp["response"][0]) && isset($resp["response"][0])) { // VK
            $username = "vk" . $resp["response"][0]['uid'];
        }

        if (isset($resp['id']) && isset($resp['link'])) {
            $username = "fb" . $resp['id'];
        } elseif (isset($resp['id'])) {
            $username = "tw" . $resp['id'];
        }

        if('instagram' == $providerName){
            $user->setInstagramId($resp['data']['username']);
        }

//        if (isset($resp['uid'])) {
//            $username = "ok" . $resp['uid'];
//        }

        $user->setUsername($username);

        $user->setFullName($response->getRealName());
        $user->setPlainPassword(substr(sha1($response->getAccessToken()), 0, 10));
        $user->setEnabled(true);
        $this->userManager->updateUser($user);

        return $user;
    }

    protected function updateUserByOAuthUserResponse(FOSUserInterface $user, UserResponseInterface $response)
    {
        $providerName        = $response->getResourceOwner()->getName();
        $providerNameSetter  = 'set' . ucfirst($providerName) . 'Id';
        $providerTokenSetter = 'set' . ucfirst($providerName) . 'AccessToken';
        $user->$providerNameSetter($response->getUsername());
        $user->$providerTokenSetter($response->getAccessToken());

        return $user;
    }
}
