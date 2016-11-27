<?php

namespace Affect\MiniCoreBundle\Sm\Adapter;

use Psr\Log\LoggerInterface;
use Symfony\Component\DependencyInjection\Container;

class AdapterFactory
{
    private $adapters;

    public function __construct($adaptersList = array())
    {
        $this->adapters = $adaptersList;
    }

    /**
     * @param $netId
     *
     * @return SmRequestInterface
     */
    public function getSmAdapter($netId)
    {
        if (isset($this->adapters[$netId])) {
            return $this->adapters[$netId];
        }

        return false;
    }
}