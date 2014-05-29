<?php

namespace Sodium\Image\Template;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image;

class SimpleTag extends TemplateAbstract
{

    private $_default_width = 154;
    private $_default_height = 54;
    private $_background_color = '#ffffff';
    private $_font_color = '#aaaaaa';

    public function SimpleTag(array $values, $image)
    {

        $x = $this->_default_width;
        $y = $this->_default_height;

        $size = new \Imagine\Image\Box($x, $y);
        $color = new \Imagine\Image\Color('#eeeeee');
        $new_image = $image->create($size, $color);

        $frame_size = new \Imagine\Image\Box($x - 4, $y - 4);
        $frame_color = new \Imagine\Image\Color($this->_background_color);
        $frame_image = $image->create($frame_size, $frame_color);

        $new_image->paste($frame_image, new \Imagine\Image\Point(2, 2));

        $source_x = $x - ($x / 1.45);
        $source_y = $y - 8;
        $source_size = new \Imagine\Image\Box($source_x, $source_y);
        $source_color = new \Imagine\Image\Color($values['color']);
        $pallate_source = $image->create($source_size, $source_color);

        $new_image->paste($pallate_source, new \Imagine\Image\Point(4, 4));
        $font_path = Config::get('Fonts', 'Path');
        $font_name = Config::get('Default_Font', 'Image');
        $font_file = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $font_path . $font_name;
        $font = Image::setFont($font_file, 14, new \Imagine\Image\Color('#444444'));
        $new_image->draw()->text('#' . $values['color'], $font, new \Imagine\Image\Point(70, $y / 2.5));

        return $new_image;
    }

}