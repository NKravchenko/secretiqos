<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Marlboro\UserBundle\Entity\User;
use odnoklassniki_odnoklassnikiClass;
use Symfony\Component\HttpFoundation\Request;

class OdnoklassnikiAdapter implements SmRequestInterface, AdapterInterface
{
    /** @var \odnoklassniki_odnoklassnikiClass */
    private $odnoklassnikiClient;
    private $profileRequestCache = null;

    public function __construct(odnoklassniki_odnoklassnikiClass $odnoklassnikiClient)
    {
        $this->odnoklassnikiClient = $odnoklassnikiClient;
    }

    /**
     * @return string
     */
    public function getAdapterId()
    {
        return 'OK';
    }

    public function getOkCode()
    {
        echo "getOkCode: " . $this->odnoklassnikiClient->getCode();
    }

    public function sendRequest($method, $params)
    {
        if (!is_null($this->odnoklassnikiClient->getCode())) {

            if ($this->odnoklassnikiClient->changeCodeToToken($this->odnoklassnikiClient->getCode())) {
                $this->odnoklassnikiClient->makeRequest($method, $params);
            }
        } else {
            print "<div><a class=\"odkl-oauth-lnk\" href=\"http://www.odnoklassniki.ru/oauth/authorize?client_id=217568256&scope=VALUABLE_ACCESS&response_type=code&redirect_uri=http://artem.deaddev.com/php_sdk/example.php\"></a></div>";
        }
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function getAvatarUrl(User $user)
    {
        if (null == $this->profileRequestCache) {
            $this->odnoklassnikiClient->setToken($user->getOdnoklassnikiAccessToken());
            $current_user              = $this->odnoklassnikiClient->makeRequest(
                'users.getCurrentUser',
                ["fields" => "name,pic_1,pic_2,pic_5", "ext_perm" => "EMAIL"]
            );
            $this->profileRequestCache = $current_user;
        }

        if (isset($this->profileRequestCache['pic_5'])) {
            if (!strpos($this->profileRequestCache['pic_5'], 'stub')) {
                return $this->profileRequestCache['pic_5'];
            }
        }

        return false;
    }

    /**
     * https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=code
     * @param string $redirectUri
     *
     * @return string
     */
    public function getAuthUrl($redirectUri)
    {
        $params = [
            'client_id'     => $this->odnoklassnikiClient->getAppId(),
            'scope'         => 'VALUABLE_ACCESS',
            'response_type' => 'code',
            'redirect_uri'  => $redirectUri,
            'layout'        => 'w',
        ];

        return $this->odnoklassnikiClient->getAuthorizeAddress() . '?' . http_build_query($params);
    }

    /**
     * @param Request $request
     * @param string $redirectUri
     *
     * @return mixed|void
     */
    public function getToken(Request $request, $redirectUri)
    {
        //error=access_denied&error_reason=user_denied&error_description=The+user+denied+your+request
        if ($request->get('error')) {
            return false;
        }

        $this->odnoklassnikiClient->setRedirecrUri($redirectUri);
        $code = $request->get('code');
        $this->odnoklassnikiClient->changeCodeToToken($code);

        $token = $this->odnoklassnikiClient->getAccessToken();

        return $token;
    }

    /**
     * @param string $accessToken
     *
     * @return array
     */
    public function getBasicProfile($accessToken)
    {
            $this->odnoklassnikiClient->setToken($accessToken);

            $currentUser              = $this->odnoklassnikiClient->makeRequest(
                'users.getCurrentUser',
                ["fields" => "uid, name, pic_1,pic_2,pic_5", "ext_perm" => "EMAIL"]
            );
            $this->profileRequestCache = $currentUser;

        $profile = [
            'sm'       => 'ok',
            'id'       => $currentUser['uid'],
            'idForUrl' => $currentUser['uid'],
            'fullName' => $currentUser['name'],
           ];

        return $profile;
    }
}
