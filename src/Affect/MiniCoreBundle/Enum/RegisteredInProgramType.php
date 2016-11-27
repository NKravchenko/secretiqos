<?php

namespace Affect\MiniCoreBundle\Enum;

use Affect\Common\Enum\Enum;

final class RegisteredInProgramType extends Enum
{
    const YES = 1;
    const NO  = 2;

    private static $map = [
        self::YES => 'Yes',
        self::NO  => 'No',
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
