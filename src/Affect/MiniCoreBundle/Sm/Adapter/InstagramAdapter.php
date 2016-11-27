<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

/**
 * CLIENT ID      98385716d79243af992dd1402fcb204e
 * CLIENT SECRET  9d9f2fc0550149668a55bccff043435f
 */

use Affect\Common\Rpc\FaultException;
//use Marlboro\UserBundle\Alt1\WebClient;
use Affect\MiniCoreBundle\Services\WebClient;
use Affect\MiniCoreBundle\Entity\User;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class InstagramAdapter implements SmRequestInterface, AdapterInterface
{
    const INSTAGRAM_URL = "https://api.instagram.com";


    public static $requestCount = 0;
    public static $requestTimeMark;

    private $clientId;
    private $clientSecret;
    private $logger;
    private $profileRequestCache = [];


    /**
     * @param string $clientId
     * @param string $clientSecret
     * @param LoggerInterface $logger
     */
    public function __construct($clientId, $clientSecret, LoggerInterface $logger = null)
    {
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->logger       = $logger;
    }

    /**
     * @return string
     */
    public function getAdapterId()
    {
        return 'IG';
    }

    /**
     * https://api.instagram.com/oauth/authorize/?client_id=CLIENT-ID&redirect_uri=REDIRECT-URI&response_type=code
     * @param string $redirectUri
     *
     * @return string
     */
    public function getAuthUrl($redirectUri)
    {
        $path = "/oauth/authorize/?client_id={$this->clientId}&redirect_uri={$redirectUri}&response_type=code";

        return self::INSTAGRAM_URL . $path;
    }

    public function getToken(Request $request, $redirectUri)
    {

        //error=access_denied&error_reason=user_denied&error_description=The+user+denied+your+request
        if ($request->get('error')) {
            return false;
        }

        $code = $request->get('code');

        $params = [
            'client_id'     => $this->clientId,
            'client_secret' => $this->clientSecret,
            'grant_type'    => 'authorization_code',
            'redirect_uri'  => $redirectUri,
            'code'          => $code
        ];

        $token = '';

        $path       = '/oauth/access_token';
        $webClient  = new WebClient([], null, $this->logger);
        $requestUrl = self::INSTAGRAM_URL . $path;

//            try {
        $result = $webClient->request($requestUrl, 'POST', $params);
        $data   = $result->getContent();
        $data   = json_decode($data, true);

//{"access_token": "574378161.9838571.ad17e459d96b4c5e96123aff28b49755", "user": {
//    "username": "albatros_m",
//    "bio": "",
//    "website": "",
//    "profile_picture": "https:\/\/igcdn-photos-h-a.akamaihd.net\/hphotos-ak-xpf1\/t51.2885-19\/10611163_804440719586431_1147838584_a.jpg",
//    "full_name": "Albatros",
//    "id": "574378161"
//}}

        $this->profileRequestCache['sm']       = 'ig';
        $this->profileRequestCache['id']       = $data['user']['id'];
        $this->profileRequestCache['idForUrl'] = $data['user']['username'];
        $this->profileRequestCache['fullName'] = $data['user']['full_name'];

//?            } catch (RequestException $e) {
//            } catch (FaultException $e) {
//                //не обновляем аватарку
//            }


        return $token;
    }

//    /**
//     * @param BlogerInterface $bloger
//     *
//     * @return int
//     */
//    public function getSubscribersCount(BlogerInterface $bloger)
//    {
//        //users/278352239
//        /** @var BlogerVkInstagram $bloger */
//        $path = "/users/" . $bloger->getInstaUserId();
//        $res  = $this->sendRequest($path);
//
//        if (isset($res['data']['counts']['followed_by'])) {
//            return $res['data']['counts']['followed_by'];
//        }
//
//        return 0;
//    }

    /**
     * @param string $instaPostId
     *
     * @return array|bool
     */
    public function getPostInfoById($instaPostId)
    {
        $path = "/media/shortcode/$instaPostId";
        $res  = $this->sendRequest($path);

        if ($res['meta'] = 200) {
            if (isset($res['data']['caption']['from'])) {
                $instaUserData = $res['data']['caption']['from'];

                return $instaUserData;
            } elseif (isset($res['data']['user'])) {
                $instaUserData = $res['data']['user'];

                return $instaUserData;
            } else {
                echo "\n====[{$instaPostId}]==========\n";
            }
        } else {
            return false;
        }

        return false;
    }

    /**
     * @param string $path
     * @param array $params
     * throws InstagramOAuthRateLimitException
     *
     * @return bool|array
     */
    public function sendRequest($path, $params = array())
    {
        //https://api.instagram.com/v1/media/shortcode/tDELkkNllZ?access_token=271252644.1fb234f.1afbaa67e49a461cab8fcd0f794597f6
        $version = "1";

        $params['access_token'] = $this->accessToken;

        $query  = self::INSTAGRAM_URL . '/v' . $version . $path . '?' . $this->prepareParams($params);
        $resRaw = $this->curl_get_contents($query);

        $res = json_decode($resRaw, true);
        if (isset($res['error_type'])) {
            switch ($res['error_type']) {
                case 'OAuthRateLimitException':
                    throw new InstagramOAuthRateLimitException($res['error_message']);
            }
        }

        return $res;
    }

    private function curl_get_contents($url)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $buffer;
    }

    private function prepareParams($params)
    {
        $pice = array();
        foreach ($params as $k => $v) {
            $pice[] = $k . '=' . urlencode($v);
        }

        return implode('&', $pice);
    }

    /**
     * @param string $accessToken
     *
     * @return array
     */
    public function getBasicProfile($accessToken)
    {
        return $this->profileRequestCache;
    }
}
