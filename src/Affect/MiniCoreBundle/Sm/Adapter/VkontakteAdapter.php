<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Marlboro\UserBundle\Entity\User;
use Affect\MiniCoreBundle\Sm\Service\VkontakteService;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use vk_vkapiClass;
use vkapi;

class VkontakteAdapter implements SmRequestInterface, AdapterInterface
{
    /** @var vkapi */
    private $vkApi;
    /** @var  VkontakteService */
    private $vkService;

    /**
     * @var int The number of calls that have been made to Graph.
     */
    public static $requestCount = 0;
    public static $requestTimeMark;
    private $logger;

    private $profileRequestCache = [];

    public function __construct(vk_vkapiClass $vkApi, VkontakteService $vkService, LoggerInterface $logger = null)
    {
        $this->vkApi     = $vkApi;
        $this->vkService = $vkService;
        $this->logger    = $logger;

        self::$requestCount = 0;
    }

    /**
     * @return int
     */
    public function getAdapterId()
    {
        return 'VK';
    }

    /**
     * @param User $user
     *
     * @return int
     */
    public function getFrientdsCount(User $user)
    {
        if ('' == $user->getSocialNetworkId()) {
            return 0;
        }

        if (false !== ($res = $this->sendRequest('friends.get', ['user_id' => $user->getSocialNetworkId()]))) {
            return count($res);
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return int
     */
    public function getSubscribersCount(User $user)
    {
        if ('' == $user->getSocialNetworkId()) {
            return 0;
        }

        if (false !== ($res = $this->sendRequest('users.getFollowers', ['user_id' => $user->getSocialNetworkId()]))) {
            if (isset($res['count'])) {
                return $res['count'];
            }

            return 0;
        }

        return false;
    }

    //stub
    public function resolveIdByUsername($userName)
    {

        if (false == ($res = $this->sendRequest('users.get', ['user_ids' => $userName]))) {
            return false;
        }

        $netUserId = $res[0]['uid'];

        return $netUserId;
    }

    /**
     * @param string $searchQuery
     *
     * @return bool|array
     */
    public function getNewsFeed($searchQuery = null)
    {
        $params = ['count' => '200'];
        /**
         * from_id
         * text
         */

        if ($searchQuery) {
            $params['q'] = $searchQuery;
        }

        if (false == ($res = $this->sendRequest('newsfeed.search', $params))) {
            return false;
        }


        $feed = [];
        foreach ($res['items'] as $id => $post) {

            $item = [
                'netUserId'         => $post['from_id'],
//                'text'=> $post['text'],
                'instaPostId'       => $this->vkService->getInstaPostIdFromVkText($post['text']),
                'isInstaEtalonPost' => $this->vkService->isInstaEtalonPost($post['text']),
            ];
            if (0 < $item['netUserId'] && false !== $item['instaPostId']) {
                $feed[$item['netUserId']] = $item;
            }
        }

        return $feed;
    }

    /**
     * @param $netUserId
     * @param $postId
     */
    public function repost($netUserId, $postId)
    {
        $params = ["object" => "wall{$netUserId}_{$postId}",
                   "text"   => "api repost"
        ];

        $res = $this->sendRequest('wall.repost', $params);

        echo "<pre>" . print_r($res, 1) . "</pre>";
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function getAvatarUrl(User $user)
    {

        if ('' == $user->getSocialId()) {
            return 0;
        }

        if (false !== ($res = $this->sendRequest(
                'users.get',
                [
                    'user_id' => $user->getSocialId(),
                    'fields'  => 'photo_100',
//                    'access_token' => $user->getVkontakteAccessToken(),
                ]
            ))
        ) {
            return $res[0]['photo_100'];
        }

        return false;
    }

    /**
     * @param string $vkMethod
     * @param array $params
     *
     * @return bool|array
     */
    private function sendRequest($vkMethod, $params = array())
    {
        if (3 <= static::$requestCount && date('His') == static::$requestTimeMark) {
            sleep(1);
        }

        $res = $this->vkApi->api($vkMethod, $params);

        //очередной запрос в текущую секунду?
        if (date('His') == static::$requestTimeMark) {
            static::$requestCount++;
        } else { //нет, сбросим счётчик
            static::$requestCount    = 1;
            static::$requestTimeMark = date('His');
        }

        if (isset($res['error'])) {
//LOGS            echo "\n\nVK.ERROR: [{$res['error']['error_code']}]-'{$res['error']['error_msg']}' Request method: [{$vkMethod}] params:" . print_r($params, 1) . ")";
            if ($this->logger) {
                $this->logger->error(
                    "VK.ERROR: [{$res['error']['error_code']}]-'{$res['error']['error_msg']}' Request method: [{$vkMethod}] params:" . print_r(
                        $params,
                        1
                    ) . ")"
                );
            }

            if (6 == $res['error']['error_code']) {
                sleep(1); //Too many requests per second
            }

            return false;
        }

        return $res['response'];
    }

    /**
     * @param string $redirectUri
     *
     * @internal param string $returnUrl
     * @return string
     */
    public function getAuthUrl($redirectUri)
    {
        return $this->vkApi->getOauthUrl($redirectUri);
    }

    /**
     * @param Request $request
     * @param string $redirectUri
     *
     * @return mixed
     */
    public function getToken(Request $request, $redirectUri)
    {
        $code = $request->get('code');

        $res = $this->vkApi->accessTokenRequest($code, $redirectUri);

//        {"error":"invalid_grant","error_description":"Code is invalid or expired."}

        if (isset($res['error'])) {
            return false;
            //todo exception
        }

        $token = $res['access_token'];
        $id    = $res['user_id'];

        $this->profileRequestCache['id'] = $id;

        return $token;
    }

    /**
     * @param string $accessToken
     *
     * @return array
     */
    public function getBasicProfile($accessToken)
    {
        $id = $this->profileRequestCache['id'];

        if (false !== ($res = $this->sendRequest(
                'users.get',
                [
                    'user_id' => $id,
                    'fields'    => 'screen_name, photo_100',
                    'name_case' => 'Nom',
//                    'access_token' => $user->getVkontakteAccessToken(),
                ]
            ))
        ) {
            $res = $res[0];
            $profile = [
                'sm'       => 'vk',
                'id'       => $id,
                'idForUrl' => $res['screen_name'],
                'fullName' => $res['first_name'] . ' ' . $res['last_name'],
            ];

            return $profile;
        }

        return false;
    }
}
