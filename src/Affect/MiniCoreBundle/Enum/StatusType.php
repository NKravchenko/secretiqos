<?php

namespace Affect\MiniCoreBundle\Enum;

use Affect\Common\Enum\Enum;

final class StatusType extends Enum
{
    const VIP          = 1;
    const TREND_SETTER = 2;
    const SOCIALITE    = 3;
    const NO           = 4;

    private static $map = [
        self::VIP          => 'VIP',
        self::TREND_SETTER => 'Trend setter',
        self::SOCIALITE    => 'Socialite',
        self::NO           => 'No (Send email)',
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
