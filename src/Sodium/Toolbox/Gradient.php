<?php

namespace Sodium\Toolbox;

class Gradient Extends ToolboxAbstract
{

    protected $_default_level = 10;

    public function Gradient()
    {

        $level = isset($this->_args[0]) ? $this->_args[0] : $this->_default_level;
        $hex = $this->_sodium_object->getHex();

        if ($this->isLight($hex)) {
            $lightColor = $hex;
            $darkColor = $this->darken($level);
        } else {
            $lightColor = $this->lighten($level);
            $darkColor = $hex;
        }

        return array($lightColor, $darkColor);
    }

    public function isLight($color)
    {

        $r = hexdec($color[0] . $color[1]);
        $g = hexdec($color[2] . $color[3]);
        $b = hexdec($color[4] . $color[5]);

        return (($r * 299 + $g * 587 + $b * 114) / 1000 > 130);
    }

    public function isDark($color)
    {

        // Calculate straight from rbg
        $r = hexdec($color[0] . $color[1]);
        $g = hexdec($color[2] . $color[3]);
        $b = hexdec($color[4] . $color[5]);

        return (($r * 299 + $g * 587 + $b * 114) / 1000 <= 130);
    }

    public function darken($level)
    {

        $lightness = $this->_darken($this->_sodium_object->getLightness(), $level);
        $this->_sodium_object->setLightness($lightness);
        return $this->_sodium_object->getHex();
    }

    public function lighten($level)
    {

        $lightness = $this->_lighten($this->_sodium_object->getLightness(), $level);
        $this->_sodium_object->setLightness($lightness);

        return $this->_sodium_object->getHex();
    }

    private function _darken($lightness, $level)
    {

        $lightness = $lightness / 100;
        if ($level) {
            $lightness = ($lightness * 100) - $level;
            $lightness = ($lightness < 0) ? 0 : $lightness / 100;
        } else {

            $lightness = $lightness / 2;
        }

        return $lightness * 100;
    }

    private function _lighten($lightness, $level)
    {

        $lightness = $lightness / 100;
        if ($level) {
            $lightness = ($lightness * 100) + $level;
            $lightness = ($lightness > 100) ? 1 : $lightness / 100;
        } else {

            $lightness += (1 - $lightness) / 2;
        }

        return $lightness * 100;
    }

}