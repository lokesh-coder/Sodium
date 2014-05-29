<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Xyz Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_x = 0;
    protected $_y = 0;
    protected $_z = 0;

    public function __construct($xyz = '')
    {
        if ($xyz != '')
            $this->_setProperties($this->_format($xyz));
    }

    protected function _setProperties($xyz)
    {
        if (is_array($xyz) && count($xyz) == 3) {
            $this->_x = $xyz[0];
            $this->_y = $xyz[1];
            $this->_z = $xyz[2];
        }
    }

    public static function regex()
    {

        $regex['xyz'] = '/^xyz\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        return $regex;
    }

    public function toRGB()
    {

        $var_X = $this->_x / 100;
        $var_Y = $this->_y / 100;
        $var_Z = $this->_z / 100;

        $var_R = $var_X * 3.2406 + $var_Y * -1.5372 + $var_Z * -0.4986;
        $var_G = $var_X * -0.9689 + $var_Y * 1.8758 + $var_Z * 0.0415;
        $var_B = $var_X * 0.0557 + $var_Y * -0.2040 + $var_Z * 1.0570;

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
            $var_B
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
        $new_x = $tmp_r * 0.4124 + $tmp_g * 0.3576 + $tmp_b * 0.1805;
        $new_y = $tmp_r * 0.2126 + $tmp_g * 0.7152 + $tmp_b * 0.0722;
        $new_z = $tmp_r * 0.0193 + $tmp_g * 0.1192 + $tmp_b * 0.9505;

        $this->_x = $new_x;
        $this->_y = $new_y;
        $this->_z = $new_z;

        return array(
            $new_x,
            $new_y,
            $new_z
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'x' => $this->_x,
            'y' => $this->_y,
            'z' => $this->_z
        );
    }

    public function getStandardOutput()
    {
        return 'xyz(' . $this->_x . ',' . $this->_y . ',' . $this->_z . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
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

}
