<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Hsv as HsvModel;

class Hsv extends HsvModel
{
    protected $HsvModel;

    public function __construct(HsvModel $hsv)
    {
        $this->HsvModel = $hsv;
    }

    public function getHsv($format)
    {
        return $this->HsvModel->formatOutput($this->HsvModel->hsv, $format);
    }
}
