<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Hsl Extends AbstractColorspace implements ColorspaceInterface
{
    protected $_hue = 0;
    protected $_saturation = 0;
    protected $_lightness = 0;
    private $_default_saturation = 50;
    private $_default_lightness = 50;

    const MIN = 0;
    const MAX = 100;
    const HUE_MAX = 360;

    public function __construct($hsl = '')
    {

        if ($hsl != '')
            $this->_setProperties($this->_format($hsl));
    }

    protected function _setProperties(array $hsl)
    {
        if (count($hsl) == 3) {
            $this->_hue = $this->_validate_input($hsl[0], 'hue');
            $this->_saturation = $this->_validate_input($hsl[1]);
            $this->_lightness = $this->_validate_input($hsl[2]);
        }
    }

    protected function _validate_input($value, $key = '')
    {

        $max = self::MAX;
        if ($key == 'hue')
            $max = self::HUE_MAX;

        if (strpos($value, '%') !== FALSE) {
            $value = rtrim($value, '%');
            $value = intval($value);
            $value = ($max / 100) * $value;
            $value = round($value);
            $value = $this->_validate_input($value, $key);
        } elseif ($value < 0) {
            $value = 0;
        } elseif ($value < 1) {
            $value = $value * $max;
            $value = round($value);
        } elseif ($value > $max) {
            $value = $max;
        }

        return intval($value);
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'hsl':

                $string = ltrim($string, 'hsl(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'hue':
                $string = ltrim($string, 'hue(');
                $string = rtrim($string, ')');
                $value = array($string, $this->_default_saturation, $this->_default_lightness);
                break;

            case 'saturation':

                $string = ltrim($string, 'saturation(');
                $string = rtrim($string, ')');
                $value = array(0, $string, 0);
                break;

            case 'lightness':

                $string = ltrim($string, 'lightness(');
                $string = rtrim($string, ')');
                $value = array(0, 0, $string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $value;
    }

    public static function regex()
    {

        $regex['hsl'] = '/^hsl\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['hue'] = '/^hue\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['saturation'] = '/^saturation\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['lightness'] = '/^lightness\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';

        return $regex;
    }

    public function getDefaultOutput()
    {
        return array($this->_hue, $this->_saturation, $this->_lightness);
    }

    public function getStandardOutput()
    {
        return 'hsl(' . $this->_hue . ',' . $this->_saturation . ',' . $this->_lightness . ')';
    }

    public function toRGB()
    {


        $this->_hue = $this->_hue / self::HUE_MAX;
        $this->_saturation = $this->_saturation / self::MAX;
        $this->_lightness = $this->_lightness / self::MAX;

        if ($this->_saturation == 0) {
            $r = $this->_lightness * 255;
            $g = $this->_lightness * 255;
            $b = $this->_lightness * 255;
        } else {
            if ($this->_lightness < 0.5)
                $var_2 = $this->_lightness * (1 + $this->_saturation);
            else
                $var_2 = ($this->_lightness + $this->_saturation) - ($this->_saturation * $this->_lightness);
            $var_1 = (2 * $this->_lightness) - $var_2;

            $r = round(255 * $this->hue_to_rgb($var_1, $var_2, $this->_hue + (1 / 3)));
            $g = round(255 * $this->hue_to_rgb($var_1, $var_2, $this->_hue));
            $b = round(255 * $this->hue_to_rgb($var_1, $var_2, $this->_hue - (1 / 3)));
        }
        $this->_hue = $this->_hue * self::HUE_MAX;
        $this->_saturation = $this->_saturation * self::MAX;
        $this->_lightness = $this->_lightness * self::MAX;
        return array($r, $g, $b);
    }

    protected function hue_to_rgb($v1, $v2, $hue_value)
    {

        if ($hue_value < 0)
            $hue_value += 1;
        if ($hue_value > 1)
            $hue_value -= 1;
        if ((6 * $hue_value) < 1)
            return ($v1 + ($v2 - $v1) * 6 * $hue_value);
        if ((2 * $hue_value) < 1)
            return ($v2);
        if ((3 * $hue_value) < 2)
            return ($v1 + ($v2 - $v1) * ((2 / 3) - $hue_value) * 6);
        return ($v1);
    }

    public function fromRGB(array $rgb)
    {

        $red_value = ($rgb[0] / 255);

        $green_value = ($rgb[1] / 255);
        $blue_value = ($rgb[2] / 255);
        $min_value = min($red_value, $green_value, $blue_value);

        $max_value = max($red_value, $green_value, $blue_value);


        $diff_value = $max_value - $min_value;

        $lightness = ($max_value + $min_value) / 2;
        if ($diff_value == 0) {
            $hue = 0;

            $saturation = 0;
        } else {
            if ($lightness < 0.5)
                $saturation = $diff_value / ($max_value + $min_value);
            else
                $saturation = $diff_value / (2 - $max_value - $min_value);
            $red_point = ((($max_value - $red_value) / 6) + ($diff_value / 2)) / $diff_value;
            $green_point = ((($max_value - $green_value) / 6) + ($diff_value / 2)) / $diff_value;
            $blue_point = ((($max_value - $blue_value) / 6) + ($diff_value / 2)) / $diff_value;
            if ($red_value == $max_value)
                $hue = $blue_point - $green_point;
            elseif ($green_value == $max_value)
                $hue = (1 / 3) + $red_point - $blue_point;
            elseif ($blue_value == $max_value)
                $hue = (2 / 3) + $green_point - $red_point;
            if ($hue < 0)
                $hue++;
            if ($hue > 1)
                $hue--;
        }

        $this->_hue = $hue * self::HUE_MAX;
        $this->_saturation = $saturation * self::MAX;
        $this->_lightness = $lightness * self::MAX;
        return array($this->_hue, $this->_saturation, $this->_lightness);
    }

}