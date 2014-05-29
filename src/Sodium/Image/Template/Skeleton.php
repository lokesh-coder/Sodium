<?php

namespace Sodium\Image\Template;

use Sodium\Image;

class Skeleton extends TemplateAbstract
{

    private $_default_width = 100;
    private $_default_height = 100;
    private $_background_color = '#2f8cab';
    private $_font_color = '#aaaaaa';

    public function Skeleton(array $values, $image)
    {

        $x = isset($values['width']) ? $values['width'] : $this->_default_width;
        $y = isset($values['height']) ? $values['height'] : $this->_default_height;

        $size = new \Imagine\Image\Box($x, $y);
        $color = new \Imagine\Image\Color('#eeeeee');
        $new_image = $image->create($size, $color);

        $frame_size = new \Imagine\Image\Box($x - 5, $y - 5);
        $frame_color = new \Imagine\Image\Color($values["color"]);
        $frame_image = $image->create($frame_size, $frame_color);

        $new_image->paste($frame_image, new \Imagine\Image\Point(3, 3));

        return $new_image;
    }

}