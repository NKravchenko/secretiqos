<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Abraham\TwitterOAuth\TwitterOAuth;
use Psr\Log\LoggerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Session\Session;

class TwitterAdapter implements SmRequestInterface, AdapterInterface
{

    private $client;
    private $session;
    private $clientSecret;
    private $logger;
    private $profileRequestCache = [];

    /**
     * @param \Abraham\TwitterOAuth\TwitterOAuth $client
     * @param \Symfony\Component\HttpFoundation\Session\Session $session
     * @param string $clientId
     * @param string $clientSecret
     * @param LoggerInterface $logger
     */
    public function __construct(TwitterOAuth $client, Session $session, $clientId, $clientSecret, LoggerInterface $logger = null)
    {
        $this->client       = $client;
        $this->session      = $session;
        $this->clientId     = $clientId;
        $this->clientSecret = $clientSecret;
        $this->logger       = $logger;
    }

    /**
     * @return string
     */
    public function getAdapterId()
    {
        return 'TW';
    }

    /**
     * @param string $redirectUri
     *
     * @return string
     */
    public function getAuthUrl($redirectUri)
    {
        $requestToken = $this->client->oauth('oauth/request_token', array('oauth_callback' => $redirectUri));

        $this->session->set('twitter_oauth_token', $requestToken['oauth_token']);
        $this->session->set('twitter_oauth_token_secret', $requestToken['oauth_token_secret']);
        $this->client->setOauthToken($requestToken['oauth_token'], $requestToken['oauth_token_secret']);

        $url = $this->client->url('oauth/authorize', ['oauth_token' => $requestToken['oauth_token']]);

        return $url;
    }

    public function getToken(Request $request, $redirectUri)
    {

        if ($request->get('error')) {
            return false;
        }

        if ($this->session->has('twitter_oauth_token_secret')) {
            $this->client->setOauthToken($this->session->get('twitter_oauth_token'), $this->session->get('twitter_oauth_token_secret'));
        }

        $oauthToken    = $request->get('oauth_token');
        $oauthVerifier = $request->get('oauth_verifier');

        if ($oauthToken && $oauthToken !== $this->session->get('twitter_oauth_token')) {
            // Abort! Something is wrong.
            return false;
        }

        $data = $this->client->oauth("oauth/access_token", array("oauth_verifier" => $oauthVerifier));

        $this->profileRequestCache['sm']       = 'tw';
        $this->profileRequestCache['id']       = $data['user_id'];
        $this->profileRequestCache['idForUrl'] = $data['screen_name'];
        $this->profileRequestCache['fullName'] = '';

        $this->session->set('twitter_oauth_token', $data['oauth_token']);
        $this->session->set('twitter_oauth_token_secret', $data['oauth_token_secret']);

        $this->client->setOauthToken($data['oauth_token'], $data['oauth_token_secret']);

        $user = $this->client->get("account/verify_credentials");

        $this->profileRequestCache['fullName'] = $user->name;

        //TwitterOAuthException

        return $data['oauth_token'];
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
