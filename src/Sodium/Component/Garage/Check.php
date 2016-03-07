<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Check extends GarageConcrete
{
    public function isGrayscale($threshold = 16)
    {
        $threshold=$threshold?$threshold:16;
        $rgb = $this->getModel('Colorspace\Rgb')->getRgb('default');
        $rgbMin = min($rgb);
        $rgbMax = max($rgb);
        $diff = $rgbMax - $rgbMin;
        return $diff < $threshold;
    }

    public function isElegent()
    {
        $hsv = $this->getModel('Colorspace\Hsv')->getHsv('default');
        $s = 94;
        $v = 96;
        if (round($hsv[1]) == $s && round($hsv[2]) == $v) {
            return true;
        }
        return false;
    }

    public function isDark()
    {
        $rgb = $this->getModel('Colorspace\Rgb')->getRgb('default');
        return (($rgb['red'] * 299 + $rgb['green'] * 587 + $rgb['blue'] * 114) / 1000 <= 130);
    }

    public function isLight()
    {
        $rgb = $this->getModel('Colorspace\Rgb')->getRgb('default');
        return (($rgb['red'] * 299 + $rgb['green'] * 587 + $rgb['blue'] * 114) / 1000 > 130);
    }
}
