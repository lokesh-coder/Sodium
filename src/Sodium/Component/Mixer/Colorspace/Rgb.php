<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Rgb as RgbModel;

class Rgb extends RgbModel
{
    /**
     * @var mixed
     */
    protected $rgbModel;

    /**
     * @param RgbModel $rgb
     */
    public function __construct(RgbModel $rgb)
    {
        $this->rgbModel = $rgb;
    }

    /**
     * @return mixed
     */
    public function getBlue()
    {
        return $this->rgbModel->blue;
    }

    /**
     * @return mixed
     */
    public function getGreen()
    {
        return $this->rgbModel->green;
    }

    /**
     * @return mixed
     */
    public function getRGB()
    {
        return $this->rgbModel->getStandardOutput();
    }

    /**
     * @return mixed
     */
    public function getRed()
    {
        return $this->rgbModel->red;
    }

    public function setRed($red)
    {
        $this->rgbModel->rgb = array($red, $this->rgbModel->green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
    public function setGreen($green)
    {
        $this->rgbModel->rgb = array($this->rgbModel->red, $green, $this->rgbModel->blue);
        $this->rgbModel->fromRGB($this->rgbModel->rgb);
        return $this;
    }
}
