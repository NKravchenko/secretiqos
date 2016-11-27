<?php

require_once __DIR__ . '/src/odnoklassniki_sdk.php';

class odnoklassniki_odnoklassnikiClass extends OdnoklassnikiSDK
{
    function __construct($appId, $appPublicKey, $appSecretKey)
    {
        self::$app_id         = $appId;
        self::$app_public_key = $appPublicKey;
        self::$app_secret_key = $appSecretKey;
    }

    function setToken($token)
    {
        self::$access_token = $token;
    }
}