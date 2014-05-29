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
 * Front end image class, loads image library
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Image
{

    const BRICK_SIZE = '200x100';
    const SQUARE_SIZE = '200x200';
    const PORTRAIT_SIZE = '200x300';
    CONST GIANT_SIZE = '500x500';
    const RECT_SIZE = '600x200';
    const PNG = 'png';
    const JPG = 'jpg';
    const JPEG = 'jpg';
    const GIF = 'gif';
    const ICO = 'ico';
    const PSD = 'psd';

    public static function create()
    {

        $adapter = '\Imagine\\' . self::_get_adapter() . '\\Imagine';
        return new $adapter();
    }

    public static function setFont($file, $size, \Imagine\Image\Color $color)
    {
        $font = '\Imagine\\' . self::_get_adapter() . '\\Font';
        return new $font($file, $size, $color);
    }

    private static function _get_adapter()
    {

        $adapter = Config::get('Default_Adapter', 'Image');
        if ($adapter == '')
            throw new Exception('Invalid Adapter.');
        elseif (!extension_loaded($adapter))
            throw new Exception('Extension ' . $adapter . ' not loaded');
        return $adapter;
    }

}
