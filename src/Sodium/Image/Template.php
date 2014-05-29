<?php

namespace Sodium\Image;

use Sodium\Autoloader;
use Sodium\Image;

Class Template
{

    private static $_template_prefix = 'Sodium\Image\Template\\';
    private static $_prefix = 'Image';
    private static $_invalid_symbols = array(
        '/',
        '-',
        '!',
        '@',
        '#',
        '$',
        '%',
        '^',
        '&',
        '*',
        '[',
        ']',
        '~',
        '`',
        '+',
        '|',
        '\/'
    );

    public static function raw(array $values, $template = 'Polaroid')
    {
        return self::_getSource($values, $template);
    }

    public static function SaveFile(array $values, $template = 'Polaroid')
    {
        self::_save($values, $template);
    }

    public static function SaveAndShow(array $values, $template = 'Polaroid')
    {

        $imagepath = self::_save($values, $template);
        echo '<img src="' . $imagepath . '/">';
    }

    public static function SaveAndReturnPath(array $values, $template = 'Polaroid')
    {

        $imagepath = self::_save($values, $template);
        return $imagepath;
    }

    private static function _save($values, $template)
    {
        $prefix = isset($values['name_prefix']) ? $values['name_prefix'] : self::$_prefix;

        $values['name'] = self::_naming($values['name'], $prefix);

        $source = self::_getSource($values, $template);
        $file = Autoloader::$_app_path . $values['image_save_path'] . $values['name'] . '.' . $values['format'];
        $source->save($file);
        return $file;
    }

    private static function _naming($name = '', $prefix = '')
    {

        if ($name !== NULL)
            return str_replace(self::$_invalid_symbols, '', $name . '_' . time());
        if ($prefix != '')
            return $prefix . '_' . time();
        return 'Image_' . time();
    }

    private static function _getSource($values, $input)
    {
        if ($input instanceof \Imagine\Image\ImageInterface)
            return $input;
        elseif (is_string($input)) {
            $input = self::$_template_prefix . $input;
            return $input::create($values);
        }
    }

}
