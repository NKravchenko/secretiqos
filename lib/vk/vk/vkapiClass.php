<?php

require_once __DIR__ . '/src/vk.php';

class vk_vkapiClass extends vkapi
{
    function vkapi($app_id, $api_secret, $api_url = 'api.vk.com/api.php')
    {
        parent::vkapi($app_id, $api_secret, $api_url);
    }
}