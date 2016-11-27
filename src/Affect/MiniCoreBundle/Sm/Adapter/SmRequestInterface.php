<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Symfony\Component\HttpFoundation\Request;

interface SmRequestInterface
{
    /**
     * @param string $redirectUri
     *
     * @return string
     */
    public function getAuthUrl($redirectUri);

    /**
     * @param Request $request
     * @param string $redirectUri
     *
     * @return mixed
     */
    public function getToken(Request $request, $redirectUri);

    /**
     * @param string $accessToken
     *
     * @return array
     */
    public function getBasicProfile($accessToken);

}
