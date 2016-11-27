<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Facebook\FacebookCanvasLoginHelper;
use Facebook\FacebookRedirectLoginHelper;
use Facebook\FacebookSession;
use Facebook\GraphUser;
use Marlboro\UserBundle\Entity\User;
use Facebook\FacebookAuthorizationException;
use Facebook\FacebookRequest;
use Facebook\FacebookRequestException;
use Facebook\FacebookResponse;
use Facebook\FacebookSDKException;
use Facebook\FacebookServerException;
use Facebook\FacebookThrottleException;
use Facebook\HttpClients\FacebookCurlHttpClient;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;

class FacebookAdapter implements SmRequestInterface, AdapterInterface
{
    const FB_URL = "https://graph.facebook.com/v2.2";

    /** @var FacebookCurlHttpClient */
    private $fbClient;
    private $clientId;
    private $clientSecret;
    private $accessToken;
    private $logger;

    /**
     * @var int The number of calls that have been made to Graph.
     */
    public static $requestCount = 0;

    public function __construct(FacebookCurlHttpClient $facebookCurlHttpClient, $clientId, $clientSecret, LoggerInterface $logger = null)
    {
        //facebookCurlHttpClient = new FacebookCurlHttpClient(new FacebookCurl());
        $this->fbClient     = $facebookCurlHttpClient;
        self::$requestCount = 0;
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->logger       = $logger;

        FacebookSession::setDefaultApplication($this->clientId, $this->clientSecret);
    }

    /**
     * @return int
     */
    public function getAdapterId()
    {
        return 'FB';
    }

    /**
     * @param User $bloger
     *
     * @return int
     */
    public function getFrientdsCount(User $bloger)
    {
        return false;
    }

    /**
     * @param User $bloger
     *
     * @return int
     */
    public function getSubscribersCount(User $bloger)
    {
        return false;
    }

    /**
     * @param string $fbUserName
     *
     * @return string
     */
    public function resolveIdByUsername($fbUserName)
    {
        $url = self::FB_URL . "/{$fbUserName}";

        if ($fbResponse = $this->sendRequest($url, 'GET')) {
            $result = $fbResponse->getResponse();

            return $result->id;
        }

        return false;
    }

    /**
     * @param User $user
     *
     * @return mixed
     */
    public function getAvatarUrl(User $user)
    {
        $user->getFacebookId();
        $url = self::FB_URL . "/{$user->getFacebookId(
            )}/picture/?redirect=false&height=100&type=square&width=100&access_token={$user->getFacebookAccessToken()}";

        if ($fbResponse = $this->sendRequest($url, 'GET')) {
            $result = $fbResponse->getResponse();

            return $result->data->url;
        }

        return false;
    }

    /**
     * @param $url
     * @param string $method
     * @param array $params
     *
     * @throws \Facebook\FacebookRequestException
     * @return FacebookResponse
     */
    public function sendRequest($url, $method = "GET", $params = array())
    {
        retry_request:

        try {
            if ((static::$requestCount % 5) == 0) {
                sleep(1);
            }

            return $this->executeRequest($url, $method, $params);
        } catch (FacebookThrottleException $e) {
            sleep(60);
            goto retry_request;
        } catch (FacebookAuthorizationException $e) {

            //todo записать в лог что странички нету
            return false;
        } catch (FacebookServerException $e) {

            //todo записать в лог что странички нету
            return false;
        } catch (FacebookSDKException $e) {
            sleep(60);
            goto retry_request;
        }
    }


    /**
     * execute - Makes the request to Facebook and returns the result.
     *
     * @param $url
     * @param string $method
     * @param array $params
     *
     * @throws \Facebook\FacebookRequestException
     * @return FacebookResponse
     */
    public function executeRequest($url, $method = "GET", $params = array())
    {
//      $url = $this->getRequestURL();
//      $params = $this->getParameters();

        if ($method === "GET") {
            $url    = FacebookRequest::appendParamsToUrl($url, $params);
            $params = array();
        }

        $connection = $this->fbClient;
        $connection->addRequestHeader('User-Agent', 'fb-php-' . FacebookRequest::VERSION);
        $connection->addRequestHeader('Accept-Encoding', '*'); // Support all available encodings.

        // ETag
        if (isset($this->etag)) {
            $connection->addRequestHeader('If-None-Match', $this->etag);
        }

        // Should throw `FacebookSDKException` exception on HTTP client error.
        // Don't catch to allow it to bubble up.
        $result = $connection->send($url, $method, $params);

        static::$requestCount++;

        $etagHit = 304 == $connection->getResponseHttpStatusCode();

        $headers      = $connection->getResponseHeaders();
        $etagReceived = isset($headers['ETag']) ? $headers['ETag'] : null;

        $decodedResult = json_decode($result);
        if ($decodedResult === null) {
            $out = array();
            parse_str($result, $out);

            return new FacebookResponse($this, $out, $result, $etagHit, $etagReceived);
        }
        if (isset($decodedResult->error)) {
            throw FacebookRequestException::create(
                $result,
                $decodedResult->error,
                $connection->getResponseHttpStatusCode()
            );
        }

        return new FacebookResponse($this, $decodedResult, $result, $etagHit, $etagReceived);
    }


    /**
     * @param string $redirectUri
     *
     * @return string
     */
    public function getAuthUrl($redirectUri)
    {
        $helper   = new FacebookRedirectLoginHelper($redirectUri);
        $loginUrl = $helper->getLoginUrl();

        return $loginUrl;
    }

    /**
     * @param Request $request
     * @param string $redirectUri
     *
     * @return mixed
     */
    public function getToken(Request $request, $redirectUri)
    {
        $helper = new FacebookRedirectLoginHelper($redirectUri);

        try {
            $session = $helper->getSessionFromRedirect();
        } catch (FacebookRequestException $ex) {
            return false;
        } catch (\Exception $ex) {
            return false;
        }
        if ($session) {
            $token = $session->getAccessToken();

            return $token->__toString();
        }

        return false;
    }

    /**
     * @param string $accessToken
     *
     * @return array|void
     */
    public function getBasicProfile($accessToken)
    {
        $session = new FacebookSession($accessToken);
        $profile = [];

        if ($session) {
            try {
                $user_profile = (new FacebookRequest(
                    $session, 'GET', '/me'
                ))->execute()->getGraphObject(GraphUser::className());
                $profile      = [
                    'sm'       => 'fb',
                    'id'       => $user_profile->getId(),
                    'idForUrl' => $user_profile->getId(),
                    'fullName' => $user_profile->getName(),
                ];
            } catch (FacebookRequestException $e) {
                echo "Exception occured, code: " . $e->getCode();
                echo " with message: " . $e->getMessage();
            }
        }

        return $profile;
    }
}
