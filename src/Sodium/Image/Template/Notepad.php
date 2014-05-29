<?php

namespace Sodium\Image\Template;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image;

class Notepad extends TemplateAbstract
{

    private $_default_width = 100;
    private $_default_height = 100;
    private $_background_color = '#ffffff';
    private $_font_color = '#aaaaaa';
    const DUMMY_TEXT="Per guest prepare four oz of BBQ sauce with
    chopped leek for dessert.";

    public function Notepad(array $values, $image)
    {

        $x = isset($values['width']) ? $values['width'] : $this->_default_width;
        $y = isset($values['height']) ? $values['height'] : $this->_default_height;

        $size = new \Imagine\Image\Box($x, $y);
        $color = new \Imagine\Image\Color('#eeeeee');
        $new_image = $image->create($size, $color);

        $frame_size = new \Imagine\Image\Box($x - 5, $y - 5);
        $frame_color = new \Imagine\Image\Color($this->_background_color);
        $frame_image = $image->create($frame_size, $frame_color);

        $new_image->paste($frame_image, new \Imagine\Image\Point(3, 3));

        $source_x = $x - ($x / 10);
        $source_y = $y - ($y / 13);
        $source_size = new \Imagine\Image\Box($source_x, $source_y);
        $source_color = new \Imagine\Image\Color($values['color'], 95);
        $pallate_source = $image->create($source_size, $source_color);

        $new_image->paste($pallate_source, new \Imagine\Image\Point(10, 10));
        $font_path = Config::get('Fonts', 'Path');
        $font_name = Config::get('Default_Font', 'Image');
        $font_file = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $font_path . $font_name;
        $font = Image::setFont($font_file, 12, new \Imagine\Image\Color($values['color']));
        $text = wordwrap(self::DUMMY_TEXT, 25);
        $new_image->draw()->text($text, $font, new \Imagine\Image\Point(20, 20));

        return $new_image;
    }

}