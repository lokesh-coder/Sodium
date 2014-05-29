<?php

namespace Sodium\Image\Template;

use Sodium\Image;

abstract class TemplateAbstract
{

    public static function create(array $values)
    {
        $image = Image::create($values['width'], $values['height']);
        $class = get_called_class();
        $method = str_replace('Sodium\Image\Template\\', '', $class);
        $class = new $class;
        return $class->$method($values, $image);
    }

    final private function __construct()
    {

    }

}
