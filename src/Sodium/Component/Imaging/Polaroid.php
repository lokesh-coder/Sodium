<?php

namespace Sodium\Component\Imaging;

use Imagine\Image\Box;
use Imagine\Image\ImagineInterface;
use Imagine\Image\Palette\RGB;
use Imagine\Image\Point;
use Sodium\Concrete\Component\Imaging\ImagingConcrete;
use Sodium\Contract\Component\Imaging\ImagingInterface;
use Sodium\Resource\Resource;

class Polaroid extends ImagingConcrete implements ImagingInterface
{
    public function process(ImagineInterface $imagine)
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $srcRoot = Resource::getPath();
        $palette = new RGB();
        $cur_input_col = $this->inputProcessor->getCurrentInputModel('Sodium\Component\Model\Seed\Hex')->getStandardOutput();

    // bg layer
    $bg_layer_size = new Box(300, 300);
        $bg_layer_color = $palette->color('#fff', 50);

    // front layer
    $front_layer_size = new Box(280, 200);
        $front_layer_color = $palette->color($cur_input_col, 50);

        $bg_layer = $imagine->create($bg_layer_size, $bg_layer_color);
        $front_layer = $imagine->create($front_layer_size, $front_layer_color);

        $point = new Point(10, 10);

        $bg_layer->paste($front_layer, $point);

        $font_ns = '\Imagine\\'.$this->imageDriver.'\\Font';
        $font_color = $palette->color('#444', 100);
        $font_position = new Point(100, 240);
        $font = new $font_ns($srcRoot.'\Fonts\font.ttf', 12, $font_color);

        $bg_layer->draw()->text($front_layer_color, $font, $font_position);

        return $bg_layer;
    }
}
