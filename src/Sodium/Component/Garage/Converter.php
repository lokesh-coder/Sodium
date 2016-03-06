<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Converter extends GarageConcrete
{
    public function getRed($format)
    {
        return $this->_get_model('Colorspace\Rgb')->getRed($format);
    }
    public function getGreen($format)
    {
        return $this->_get_model('Colorspace\Rgb')->getGreen($format);
    }
    public function getBlue($format)
    {
        return $this->_get_model('Colorspace\Rgb')->getBlue($format);
    }
    public function getRGB($format)
    {
        return $this->_get_model('Colorspace\Rgb')->getRGB($format);
    }
    public function setRed($red)
    {
        $this->_get_model('Colorspace\Rgb')->setRed($red);
        return $this->_update_models('Colorspace\Rgb');
    }
    public function setGreen($green)
    {
        $this->_get_model('Colorspace\Rgb')->setGreen($green);
        return $this->_update_models('Colorspace\Rgb');
    }
    public function setBlue($blue)
    {
        $this->_get_model('Colorspace\Rgb')->setBlue($blue);
        return $this->_update_models('Colorspace\Rgb');
    }
    public function mixRed($red)
    {
        $this->_get_model('Colorspace\Rgb')->mixRed($red);
        return $this->_update_models('Colorspace\Rgb');
    }
    public function mixGreen($green)
    {
        $this->_get_model('Colorspace\Rgb')->mixGreen($green);
        return $this->_update_models('Colorspace\Rgb');
    }
    public function mixBlue($blue)
    {
        $this->_get_model('Colorspace\Rgb')->mixBlue($blue);
        return $this->_update_models('Colorspace\Rgb');
    }

    public function getHex($format)
    {
        return $this->_get_model('Seed\Hex')->getHex($format);
    }
    public function getCyan($format)
    {
        return $this->_get_model('Colorspace\Cmy')->getCyan($format);
    }
    public function getMagenta($format)
    {
        return $this->_get_model('Colorspace\Cmy')->getMagenta($format);
    }
    public function getYellow($format)
    {
        return $this->_get_model('Colorspace\Cmy')->getYellow($format);
    }
    public function setCyan($cyan)
    {
        $this->_get_model('Colorspace\Cmy')->setCyan($cyan);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function setMagenta($magenta)
    {
        $this->_get_model('Colorspace\Cmy')->setMagenta($magenta);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function setYellow($yellow)
    {
        $this->_get_model('Colorspace\Cmy')->setYellow($yellow);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function mixCyan($cyan)
    {
        $this->_get_model('Colorspace\Cmy')->mixCyan($cyan);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function mixMagenta($magenta)
    {
        $this->_get_model('Colorspace\Cmy')->mixMagenta($magenta);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function mixYellow($yellow)
    {
        $this->_get_model('Colorspace\Cmy')->mixYellow($yellow);
         return $this->_update_models('Colorspace\Cmy');
    }
    public function getCMY($format)
    {
        return $this->_get_model('Colorspace\Cmy')->getCMY($format);
    }
    //
    public function getHue($format)
    {
        return $this->_get_model('Colorspace\Hsl')->getHue($format);
    }
    public function getSaturation($format)
    {
        return $this->_get_model('Colorspace\Hsl')->getSaturation($format);
    }
    public function getLightness($format)
    {
        return $this->_get_model('Colorspace\Hsl')->getLightness($format);
    }
    public function setHue($cyan)
    {
        $this->_get_model('Colorspace\Hsl')->setHue($cyan);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function setSaturation($magenta)
    {
        $this->_get_model('Colorspace\Hsl')->setSaturation($magenta);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function setLightness($yellow)
    {
        $this->_get_model('Colorspace\Hsl')->setLightness($yellow);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function mixHue($cyan)
    {
        $this->_get_model('Colorspace\Hsl')->mixHue($cyan);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function mixSaturation($magenta)
    {
        $this->_get_model('Colorspace\Hsl')->mixSaturation($magenta);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function mixLightness($yellow)
    {
        $this->_get_model('Colorspace\Hsl')->mixLightness($yellow);
         return $this->_update_models('Colorspace\Hsl');
    }
    public function getHSL($format)
    {
        return $this->_get_model('Colorspace\Hsl')->getHSL($format);
    }
}
