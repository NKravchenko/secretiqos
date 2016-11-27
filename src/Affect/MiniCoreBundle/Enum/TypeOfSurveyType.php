<?php

namespace Affect\MiniCoreBundle\Enum;

use Affect\Common\Enum\Enum;

final class TypeOfSurveyType extends Enum
{
    const APP         = 1;
    const CALL_CENTER = 2;

    private static $map = [
        self::APP         => 'APP',
        self::CALL_CENTER => 'Call center',
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
