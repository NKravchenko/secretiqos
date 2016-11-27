<?php

namespace Affect\MiniCoreBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class MiniCoreBundle extends Bundle
{
    /**
     * {@inheritDoc}
     */
    public function getParent()
    {
        return 'FOSUserBundle';
    }
}
