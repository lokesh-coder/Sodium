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
 * contains utility methods
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Utile
{

    private static $_instance;

    private function __construct()
    {

    }

    public static function initialize()
    {
        return (isset(self::$_instance)) ? self::$_instance : new Utile();
    }

    public function split_name($name)
    {
        $names = preg_split('/(?=[A-Z])/', $name);
        return implode(' ', $names);
    }

    public function unite_name($name)
    {
        $name = preg_replace('/((\s)?([a-zA-Z]+))/', "$1", $name);
        $names = explode(' ', $name);
        foreach ($names as $n) {
            $new[] = ucfirst($n);
        }
        return implode('', $new);
    }

    public static function dump( $stuff)
    {
        if(is_array($stuff)){
            echo '<pre>';
            print_r($stuff);
            echo '</pre>';
        }
        else{
            echo var_dump($stuff);
        }

    }

}