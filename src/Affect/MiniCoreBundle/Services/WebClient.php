<?php

namespace Affect\MiniCoreBundle\Services;

use Affect\Common\BrowserKit\Client as BrowserKitClient;
use Affect\Common\BrowserKit\ClientException;
use Affect\Common\BrowserKit\ClientInterface as BrowserKitClientInterface;
use Affect\Common\BrowserKit\Request;
use Affect\Common\Rpc\FaultException;
use Psr\Log\LoggerInterface;
use Symfony\Component\BrowserKit\Response;

class WebClient
{
    const DEFAULT_USERAGENT_FORMAT = '%name% (%environment%)';

    private $options;
    private $client;
    private $lastRequest;
    private $lastResponse;
    private $logger = null;

    /**
     * Constructor.
     *
     * @param array $options
     * @param BrowserKitClientInterface $client
     * @param \Psr\Log\LoggerInterface $logger
     */
    public function __construct(array $options = [], BrowserKitClientInterface $client = null, LoggerInterface $logger = null)
    {
        if(null !== $logger){
            $this->logger = $logger;
            $this->logger->notice('WebClientLogger here');
        }

        $this->setOptions($options);
        $this->client = $client ? : new BrowserKitClient([], $this->logger);

        if (isset($this->options['auth'])) {
            $this->client->setAuth($this->options['auth']['username'], $this->options['auth']['password']);
        }

        if (isset($this->options['cookies'])) {
            $this->client->setCookies($this->options['cookies']);
        }

       // $this->client->setOption(CURLOPT_PROXY, 'proxy_url');

        if (isset($this->options['app'])) {
            $format    = isset($this->options['app']['format'])
                ? $this->options['app']['format']
                : self::DEFAULT_USERAGENT_FORMAT;
            $useragent = str_replace(
                ['%name%', '%environment%'],
                [$this->options['app']['name'], $this->options['app']['environment']],
                $format
            );
            $this->client->setOption(CURLOPT_USERAGENT, $useragent);
        }
    }

    /**
     * Sends request.
     *
     * @param $uri
     * @param string $httpMethod
     * @param array $params
     * @param array $headers
     *
     * @throws \Affect\Common\Rpc\FaultException
     * @internal param string $method
     * @return Response
     */
    public function request($uri, $httpMethod = 'GET', array $params = [], array $headers= [])
    {
        $uniqId            = uniqid();
        $this->lastRequest = json_encode(
            [
                'params' => $params,
                'id'     => $uniqId
            ]
        );

        if($this->logger){
            $this->logger->notice($httpMethod.':'. $uri.' '.$this->lastRequest);
        }

        $headers["Content-type"] = "application/x-www-form-urlencoded";

        $request = new Request($uri, $httpMethod, $headers, $params, [], [], [], $this->lastRequest);

        try {
        $response = $this->client->request($request);

        $this->lastResponse = $response->getContent();

        if (200 !== ($code = $response->getStatus()) && 302 !== ($code = $response->getStatus())) {
            throw new FaultException(sprintf('Bad HTTP response code "%s"', $code));
        }

        return $response;

        } catch (ClientException $e) {
            throw new FaultException(sprintf('Unable to perform RPC request <%s:%s>', $e->getCode(), $e->getMessage()), 0, $e);
        }
    }

    /**
     * Returns last request.
     *
     * @return string
     */
    public function getLastRequest()
    {
        return $this->lastRequest;
    }

    /**
     * Returns last response.
     *
     * @return string
     */
    public function getLastResponse()
    {
        return $this->lastResponse;
    }

    /**
     * Sets the options values.
     *
     * @param array $options
     */
    private function setOptions(array $options)
    {
//        if (isset($options['version'])) {
//            $this->options['version'] = $options['version'];
//            unset($options['version']);
//        }

        if (isset($options['auth']['username']) && isset($options['auth']['password'])) {
            $this->options['auth'] = $options['auth'];
            unset($options['auth']);
        }

        if (isset($options['cookies'])) {
            $this->options['cookies'] = $options['cookies'];
            unset($options['cookies']);
        }

        if (isset($options['headers'])) {
            $this->options['headers'] = $options['headers'];
            unset($options['headers']);
        }

        if (isset($options['proxy'])) {
            $this->options['proxy'] = $options['proxy'];
            unset($options['proxy']);
        }

//        if (isset($options['app']['name']) && isset($options['app']['environment'])) {
//            $this->options['app'] = $options['app'];
//            unset($options['app']);
//        }

//        if (isset($options['class_map']) && is_array($options['class_map']) && 0 < count($options['class_map'])) {
//            $this->classMap = $options['class_map'];
//            unset($options['class_map']);
//        }
    }
}
