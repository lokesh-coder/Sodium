<?php

namespace Sodium\Component\Export\Adapter\File;

use Imagine\Gd\Imagine;
use Imagine\Image\Box;
use Imagine\Image\Palette\RGB;
use Sodium\Concrete\Component\Export\Adapter\File\ExportAdapterFileConcrete;
use Sodium\Contract\Component\Export\Adapter\File\ExportAdapterFileInterface;

class Image extends ExportAdapterFileConcrete implements ExportAdapterFileInterface
{
    public function export(array $colors)
    {
        $imagine = new Imagine();
        $palette = new RGB();
        $size  = new Box(200, 200);
        $color = $palette->color($colors[0]);
        $image = $imagine->create($size, $color);
        return $image->save($_SERVER['DOCUMENT_ROOT'].'/Sody/image.jpg');
    }
}
