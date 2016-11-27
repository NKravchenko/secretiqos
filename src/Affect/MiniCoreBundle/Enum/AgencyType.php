<?php

namespace Affect\MiniCoreBundle\Enum;

use Affect\Common\Enum\Enum;

final class AgencyType extends Enum
{
    const RSVP = 1;
    const MP   = 2;

    private static $map = [
        self::RSVP => 'RSVP',
        self::MP   => 'M&P',
    ];

    /**
     * Returns all consts (possible values) as an array.
     *
     * @return array
     */
    public static function getConstList()
    {
        return array_keys(self::$map);
    }

    /**
     * Returns all readables as an array.
     *
     * @return array
     */
    public static function getReadablesMap()
    {
        return self::$map;
    }
}
