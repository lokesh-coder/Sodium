<?php

namespace Sodium\Contract\Component\Imaging;

use Imagine\Image\ImagineInterface;

interface ImagingInterface
{
    public function process(ImagineInterface $imagine);
}
