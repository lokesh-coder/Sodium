<?php

namespace Sodium\Image\Template;

use Sodium\Image;

class Fill extends TemplateAbstract
{

    private $_default_width = 100;
    private $_default_height = 100;
    private $_background_color = '#ffffff';
    private $_font_color = '#aaaaaa';

    public function Fill(array $values, $image)
    {

        $x = isset($values['width']) ? $values['width'] : $this->_default_width;
        $y = isset($values['height']) ? $values['height'] : $this->_default_height;

        $size = new \Imagine\Image\Box($x, $y);
        $color = new \Imagine\Image\Color($values['color']);
        $new_image = $image->create($size, $color);

        return $new_image;
    }

}