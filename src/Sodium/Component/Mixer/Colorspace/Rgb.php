<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Rgb as RgbModel;

class Rgb extends RgbModel
{

    protected $rgbModel;

    public function __construct(RgbModel $rgb)
    {
        $this->rgbModel = $rgb;
    }

    public function getBlue($format)
    {
        return $this->rgbModel->formatOutput($this->rgbModel->blue,$format);
    }

    public function getGreen($format)
    {
        return $this->rgbModel->formatOutput($this->rgbModel->green,$format);
    }

    public function getRGB($format)
    {
        return $this->rgbModel->formatOutput($this->rgbModel->rgb,$format);
    }

    public function getRed($format)
    {
        return $this->rgbModel->formatOutput($this->rgbModel->red,$format);
    }

    public function setRed($red)
    {
        $this->rgbModel->rgb = array($red, $this->rgbModel->green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function mixRed($red)
    {
        $this->rgbModel->rgb = array($this->rgbModel->$red+$red, $this->rgbModel->green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function setGreen($green)
    {
        $this->rgbModel->rgb = array($this->rgbModel->red, $green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function mixGreen($green)
    {
        $this->rgbModel->rgb = array($this->rgbModel->red, $this->rgbModel->green+$green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function setBlue($blue)
    {
        $this->rgbModel->rgb = array($this->rgbModel->red, $this->rgbModel->green, $blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function mixBlue($blue)
    {
        $this->rgbModel->rgb = array($this->rgbModel->red, $this->rgbModel->green, $this->rgbModel->blue+$blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
}
