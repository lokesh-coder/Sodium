<?php

/*
 * This file is part of  Sodium.
 *
 * copyright (c) 2013 lokesh
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sodium;

/**
 * Stores variables and enables to access them globally
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Storage
{

    private static $_temp_values = array();

    public static function setValue($key, $value)
    {

        self::$_temp_values[$key] = $value;
    }

    public static function getValue($key)
    {
        if (isset(self::$_temp_values[$key]))
            return self::$_temp_values[$key];
        return NULL;
    }

    public static function destroyValue($key)
    {

        if (isset(self::$_temp_values[$key]))
            unset(self::$_temp_values[$key]);
    }

    public static function destroyAll()
    {

        self::$_temp_values = array();
    }

    public static function getAll()
    {

        return self::$_temp_values;
    }

    public static function getAndDestroy($key)
    {
        if (isset(self::$_temp_values[$key])) {

            $value = self::$_temp_values[$key];
            self::destroyValue($key);
            return $value;
        }
        return NULL;
    }

    public static function checkSet($key)
    {

        if (isset(self::$_temp_values[$key]))
            return TRUE;
        return FALSE;
    }

}