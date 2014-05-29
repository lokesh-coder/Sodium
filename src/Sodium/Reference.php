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
 * class to load reference classes
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Reference
{

    private static $_library = array();

    public static function load($library)
    {
        $class = 'Sodium\Reference\\' . $library;
        if (!class_exists($class))
            throw new Exception('Reference Library ' . $class . ' not found');
        if (!isset(self::$_library[$class]))
            self::$_library[$class] = new $class;
        return self::$_library[$class];
    }

}
