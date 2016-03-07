<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Xyz extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $x = 0;
    protected $y = 0;
    protected $z = 0;

    public function __construct($xyz = '')
    {
        if ($xyz != '') {
            $this->setProperties($this->format($xyz));
        }
    }

    protected function setProperties($xyz)
    {
        if (is_array($xyz) && count($xyz) == 3) {
            $this->x = $xyz[0];
            $this->y = $xyz[1];
            $this->z = $xyz[2];
        }
    }

    protected function format($string)
    {
        $type = self::isValid($string, true);
        switch ($type) {
            case 'xyz':
                $string = ltrim($string, 'xyz(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }

        return $value;
    }

    public static function regex()
    {
        $regex['xyz'] = '/^xyz\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';

        return $regex;
    }

    public function getStandardOutput()
    {
        return 'xyz('.$this->x.','.$this->y.','.$this->z.')';
    }

    public function getDefaultOutput()
    {
        return array(
            'x' => $this->x,
            'y' => $this->y,
            'z' => $this->z,
        );
    }

    public function toRGB()
    {
        $varx = $this->x / 100;
        $vary = $this->y / 100;
        $varz = $this->z / 100;

        $var_R = $varx * 3.2406 + $vary * -1.5372 + $varz * -0.4986;
        $var_G = $varx * -0.9689 + $vary * 1.8758 + $varz * 0.0415;
        $var_B = $varx * 0.0557 + $vary * -0.2040 + $varz * 1.0570;

        if ($var_R > 0.0031308) {
            $var_R = 1.055 * pow($var_R, (1 / 2.4)) - 0.055;
        } else {
            $var_R = 12.92 * $var_R;
        }
        if ($var_G > 0.0031308) {
            $var_G = 1.055 * pow($var_G, (1 / 2.4)) - 0.055;
        } else {
            $var_G = 12.92 * $var_G;
        }
        if ($var_B > 0.0031308) {
            $var_B = 1.055 * pow($var_B, (1 / 2.4)) - 0.055;
        } else {
            $var_B = 12.92 * $var_B;
        }
        $var_R = max(0, min(255, $var_R * 255));
        $var_G = max(0, min(255, $var_G * 255));
        $var_B = max(0, min(255, $var_B * 255));

        return array(
            $var_R,
            $var_G,
            $var_B,
        );
    }

    public function fromRGB(array $rgb)
    {
        $tmp_r = $rgb[0] / 255;
        $tmp_g = $rgb[1] / 255;
        $tmp_b = $rgb[2] / 255;
        if ($tmp_r > 0.04045) {
            $tmp_r = pow((($tmp_r + 0.055) / 1.055), 2.4);
        } else {
            $tmp_r = $tmp_r / 12.92;
        }
        if ($tmp_g > 0.04045) {
            $tmp_g = pow((($tmp_g + 0.055) / 1.055), 2.4);
        } else {
            $tmp_g = $tmp_g / 12.92;
        }
        if ($tmp_b > 0.04045) {
            $tmp_b = pow((($tmp_b + 0.055) / 1.055), 2.4);
        } else {
            $tmp_b = $tmp_b / 12.92;
        }
        $tmp_r = $tmp_r * 100;
        $tmp_g = $tmp_g * 100;
        $tmp_b = $tmp_b * 100;
        $newx = $tmp_r * 0.4124 + $tmp_g * 0.3576 + $tmp_b * 0.1805;
        $newy = $tmp_r * 0.2126 + $tmp_g * 0.7152 + $tmp_b * 0.0722;
        $newz = $tmp_r * 0.0193 + $tmp_g * 0.1192 + $tmp_b * 0.9505;

        $this->x = $newx;
        $this->y = $newy;
        $this->z = $newz;

        return array(
            $newx,
            $newy,
            $newz,
        );
    }
}
