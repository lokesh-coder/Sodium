<?php

namespace Sodium\Image\Template;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image;

class SimpleTag extends TemplateAbstract
{

    private $_default_width = 54;
    private $_default_height = 104;
    private $_background_color = '#ffffff';
    private $_font_color = '#aaaaaa';

    public function SimpleTag(array $values, $image)
    {

        $x = $this->_default_width;
        $y = $this->_default_height;

        $size = new \Imagine\Image\Box($x, $y);
        $color = new \Imagine\Image\Color('#eeeeee');
        $new_image = $image->create($size, $color);

        $frame_size = new \Imagine\Image\Box($x - 5, $y - 5);
        $frame_color = new \Imagine\Image\Color($this->_background_color);
        $frame_image = $image->create($frame_size, $frame_color);

        $new_image->paste($frame_image, new \Imagine\Image\Point(3, 3));

        $source_x = $x - ($x / 10);
        $source_y = $y - ($y / 5);
        $source_size = new \Imagine\Image\Box($source_x, $source_y);
        $source_color = new \Imagine\Image\Color($values['color']);
        $pallate_source = $image->create($source_size, $source_color);

        $new_image->paste($pallate_source, new \Imagine\Image\Point(10, 10));
        $font_path = Config::get('Fonts', 'Path');
        $font_name = Config::get('Default_Font', 'Image');
        $font_file = Autoloader::$_app_path . $font_path . $font_name;
        $font = Image::setFont($font_file, 12, new \Imagine\Image\Color('#444444'));
        $new_image->draw()->text($values['color'], $font, new \Imagine\Image\Point(80, $y - 30));

        return $new_image;
    }

}