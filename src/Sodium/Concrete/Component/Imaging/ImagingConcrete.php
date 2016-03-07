<?php

namespace Sodium\Concrete\Component\Imaging;

use Sodium\Engine\Processor\InputProcessor;

abstract class ImagingConcrete
{
    protected $inputProcessor;
    protected $imageDriver;

    public function setInputProcessor(InputProcessor $inputProcessor)
    {
        $this->inputProcessor = $inputProcessor;
    }
    public function setImageDriver($imageDriver)
    {
        $this->imageDriver = $imageDriver;
    }
}
