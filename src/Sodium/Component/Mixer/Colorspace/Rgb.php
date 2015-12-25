<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Rgb as RgbModel;

class Rgb extends RgbModel
{
    protected $rgbModel;
    public function __construct(RgbModel $rgb){
        $this->rgbModel=$rgb;
    }
    public function getRed(){
        return $this->rgbModel->red;
    }
}
