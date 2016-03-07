<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Painter extends GarageConcrete
{
    public function lighten($amount = 10)
    {
        $hsl = $this->getModel('Colorspace\Hsl')->getHSL('default');
        if ($amount) {
            $hsl['lightness'] = ($hsl['lightness'] * 100) + $amount;
            $hsl['lightness'] = ($hsl['lightness'] > 100) ? 1 : $hsl['lightness'] / 100;
        } else {
            $hsl['lightness'] += (1 - $hsl['lightness']) / 2;
        }
        $this->getModel('Colorspace\Hsl')->setLightness($hsl['lightness']);

        return $this->updateModels('Colorspace\Hsl');
    }

    public function darken($amount = 10)
    {
        $hsl = $this->getModel('Colorspace\Hsl')->getHSL('default');
        if ($amount) {
            $hsl['lightness'] = ($hsl['lightness'] * 100) - $amount;
            $hsl['lightness'] = ($hsl['lightness'] < 0) ? 0 : $hsl['lightness'] / 100;
        } else {
            $hsl['lightness'] = $hsl['lightness'] / 2;
        }
        $this->getModel('Colorspace\Hsl')->setLightness($hsl['lightness']);

        return $this->updateModels('Colorspace\Hsl');
    }
}
