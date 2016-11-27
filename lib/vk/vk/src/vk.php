<?php

/**
 * VKAPI class for vk.com social network
 *
 * @package server API methods
 * @link    http://vk.com/developers.php
 * @autor   Oleg Illarionov
 * @version 1.0
 */
class vkapi
{
    var $api_secret;
    var $app_id;
    var $api_url;


    function vkapi($app_id, $api_secret, $api_url = 'api.vk.com/method')
    {
        //https://api.vk.com/method/users.get.xml?user_id=66748&v=5.28&access_token=533bacf01e11f55b536a565b57531ac114461ae8736d6506a3
        $this->app_id     = $app_id;
        $this->api_secret = $api_secret;
        if (!strstr($api_url, 'http://')) {
            $api_url = 'https://' . $api_url;
        } elseif (strstr($api_url, 'http://')) {
            $api_url = 'https://' . $api_url;
        }


        $this->api_url = $api_url;
    }

    function api($method, $params = false)
    {
        if (!$params) {
            $params = array();
        }
        $params['api_id'] = $this->app_id;
        $params['v']      = '5.28';
        $params['timestamp'] = time();
        $params['format']    = 'json';
        $params['random']    = rand(0, 10000);
        ksort($params);
        $sig = '';
        foreach ($params as $k => $v) {
            $sig .= $k . '=' . $v;
        }
        $sig .= $this->api_secret;
        $params['sig'] = md5($sig);
        $query         = $this->api_url . '/' . $method . '?' . $this->params($params);
        $res           = $this->curl_get_contents($query);

        return json_decode($res, true);
    }

    function params($params)
    {
        $pice = array();
        foreach ($params as $k => $v) {
            $pice[] = $k . '=' . urlencode($v);
        }

        return implode('&', $pice);
    }

    //use when troubles with file_get_contents
    function curl_get_contents($url)
    {
        $curl_handle = curl_init();
        curl_setopt($curl_handle, CURLOPT_URL, $url);
        curl_setopt($curl_handle, CURLOPT_CONNECTTIMEOUT, 2);
        curl_setopt($curl_handle, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl_handle, CURLOPT_SSL_VERIFYPEER, false);

        curl_setopt($curl_handle, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($curl_handle, CURLOPT_PROXY, 'sgsgprxs000.unileverservices.com:3128');
        $buffer = curl_exec($curl_handle);
        curl_close($curl_handle);

        return $buffer;
    }
}
