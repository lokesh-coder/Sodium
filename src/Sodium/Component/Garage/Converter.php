<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Converter extends GarageConcrete
{
    public function getRed($format)
    {
        return $this->getModel('Colorspace\Rgb')->getRed($format);
    }
    public function getGreen($format)
    {
        return $this->getModel('Colorspace\Rgb')->getGreen($format);
    }
    public function getBlue($format)
    {
        return $this->getModel('Colorspace\Rgb')->getBlue($format);
    }
    public function getRgb($format)
    {
        return $this->getModel('Colorspace\Rgb')->getRgb($format);
    }
    public function setRed($red)
    {
        $this->getModel('Colorspace\Rgb')->setRed($red);

        return $this->updateModels('Colorspace\Rgb');
    }
    public function setGreen($green)
    {
        $this->getModel('Colorspace\Rgb')->setGreen($green);

        return $this->updateModels('Colorspace\Rgb');
    }
    public function setBlue($blue)
    {
        $this->getModel('Colorspace\Rgb')->setBlue($blue);

        return $this->updateModels('Colorspace\Rgb');
    }
    public function mixRed($red)
    {
        $this->getModel('Colorspace\Rgb')->mixRed($red);

        return $this->updateModels('Colorspace\Rgb');
    }
    public function mixGreen($green)
    {
        $this->getModel('Colorspace\Rgb')->mixGreen($green);

        return $this->updateModels('Colorspace\Rgb');
    }
    public function mixBlue($blue)
    {
        $this->getModel('Colorspace\Rgb')->mixBlue($blue);

        return $this->updateModels('Colorspace\Rgb');
    }

    public function getHex($format)
    {
        return $this->getModel('Seed\Hex')->getHex($format);
    }
    public function getCyan($format)
    {
        return $this->getModel('Colorspace\Cmy')->getCyan($format);
    }
    public function getMagenta($format)
    {
        return $this->getModel('Colorspace\Cmy')->getMagenta($format);
    }
    public function getYellow($format)
    {
        return $this->getModel('Colorspace\Cmy')->getYellow($format);
    }
    public function setCyan($cyan)
    {
        $this->getModel('Colorspace\Cmy')->setCyan($cyan);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function setMagenta($magenta)
    {
        $this->getModel('Colorspace\Cmy')->setMagenta($magenta);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function setYellow($yellow)
    {
        $this->getModel('Colorspace\Cmy')->setYellow($yellow);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function mixCyan($cyan)
    {
        $this->getModel('Colorspace\Cmy')->mixCyan($cyan);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function mixMagenta($magenta)
    {
        $this->getModel('Colorspace\Cmy')->mixMagenta($magenta);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function mixYellow($yellow)
    {
        $this->getModel('Colorspace\Cmy')->mixYellow($yellow);

        return $this->updateModels('Colorspace\Cmy');
    }
    public function getCmy($format)
    {
        return $this->getModel('Colorspace\Cmy')->getCmy($format);
    }
    //
    public function getHue($format)
    {
        return $this->getModel('Colorspace\Hsl')->getHue($format);
    }
    public function getSaturation($format)
    {
        return $this->getModel('Colorspace\Hsl')->getSaturation($format);
    }
    public function getLightness($format)
    {
        return $this->getModel('Colorspace\Hsl')->getLightness($format);
    }
    public function setHue($cyan)
    {
        $this->getModel('Colorspace\Hsl')->setHue($cyan);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function setSaturation($magenta)
    {
        $this->getModel('Colorspace\Hsl')->setSaturation($magenta);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function setLightness($yellow)
    {
        $this->getModel('Colorspace\Hsl')->setLightness($yellow);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function mixHue($cyan)
    {
        $this->getModel('Colorspace\Hsl')->mixHue($cyan);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function mixSaturation($magenta)
    {
        $this->getModel('Colorspace\Hsl')->mixSaturation($magenta);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function mixLightness($yellow)
    {
        $this->getModel('Colorspace\Hsl')->mixLightness($yellow);

        return $this->updateModels('Colorspace\Hsl');
    }
    public function getHsl($format)
    {
        return $this->getModel('Colorspace\Hsl')->getHsl($format);
    }
    public function getHsv($format)
    {
        return $this->getModel('Colorspace\Hsv')->getHsv($format);
    }
}
