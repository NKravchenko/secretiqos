<?php

namespace Affect\MiniCoreBundle\Enum;

use Affect\Common\Enum\Enum;

final class TypeOfRecruitmentType extends Enum
{
    const PR = 1;
    const SE = 2;

    private static $map = [
        self::PR => 'PR',
        self::SE => 'SE',
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
