<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Hsl extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $hsl=array();
    protected $hue = 0;
    protected $saturation = 0;
    protected $lightness = 0;
    private $defaultSaturation = 50;
    private $defaultLightness = 50;
    protected $decimalLimit = 2;

    const MIN = 0;
    const MAX = 100;
    const HUE_MAX = 360;

    public function __construct($hsl = '')
    {

        if ($hsl != '') {
            $this->setProperties($this->format($hsl));
        }
    }

    protected function setProperties(array $hsl)
    {
        $this->hsl = $this->filterInput($hsl);
        if (count($hsl) == 3) {
            $this->hue = $this->validateInput($hsl[0], 'hue');
            $this->saturation = $this->validateInput($hsl[1]);
            $this->lightness = $this->validateInput($hsl[2]);
        }
    }

    protected function filterInput($value)
    {

        if (is_array($value)) {
            $hsl = array();

            foreach ($value as $key => $val) {
                if($key==0)
                    $type='hue';
                else
                    $type='';
                $hsl[] = $this->validateInput($val,$type);
            }

            return $hsl;
        } else {
            return $this->validateInput($value);
        }
    }

    protected function validateInput($value, $key = '')
    {

        $max = self::MAX;
        if ($key == 'hue') {
            $max = self::HUE_MAX;
        }

        if (strpos($value, '%') !== false) {
            $value = rtrim($value, '%');
            $value = intval($value);
            $value = ($max / 100) * $value;
            $value = round($value);
            $value = $this->validateInput($value, $key);
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

    protected function format($string)
    {

        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
            case 'hsl':

                $string = ltrim($string, 'hsl(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'hue':
                $string = ltrim($string, 'hue(');
                $string = rtrim($string, ')');
                $value = array($string, $this->defaultSaturation, $this->defaultLightness);
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

    static function regex()
    {
        $regex['hsl'] = '/^hsl\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['hue'] = '/^hue\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['saturation'] = '/^saturation\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['lightness'] = '/^lightness\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';

        return $regex;
    }

    public function getStandardOutput()
    {
        return 'hsl(' . $this->hue . ',' . $this->saturation . ',' . $this->lightness . ')';
    }

    public function getDefaultOutput()
    {
        return array(
            'hue'    => $this->hue,
            'saturation' => $this->saturation,
            'lightness'  => $this->lightness
        );
    }

    function toRGB()
    {
        $this->hue = $this->hue / self::HUE_MAX;
        $this->saturation = $this->saturation / self::MAX;
        $this->lightness = $this->lightness / self::MAX;

        if ($this->saturation == 0) {
            $r = $this->lightness * 255;
            $g = $this->lightness * 255;
            $b = $this->lightness * 255;
        } else {
            if ($this->lightness < 0.5) {
                $var_2 = $this->lightness * (1 + $this->saturation);
            } else {
                $var_2 = ($this->lightness + $this->saturation) - ($this->saturation * $this->lightness);
            }
            $var_1 = (2 * $this->lightness) - $var_2;

            $r = round(255 * $this->hueToRgb($var_1, $var_2, $this->hue + (1 / 3)));
            $g = round(255 * $this->hueToRgb($var_1, $var_2, $this->hue));
            $b = round(255 * $this->hueToRgb($var_1, $var_2, $this->hue - (1 / 3)));
        }
        $this->hue = $this->hue * self::HUE_MAX;
        $this->saturation = $this->saturation * self::MAX;
        $this->lightness = $this->lightness * self::MAX;
        return array($r, $g, $b);
    }

    protected function hueToRgb($v1, $v2, $hue_value)
    {

        if ($hue_value < 0) {
            $hue_value += 1;
        }
        if ($hue_value > 1) {
            $hue_value -= 1;
        }
        if ((6 * $hue_value) < 1) {
            return ($v1 + ($v2 - $v1) * 6 * $hue_value);
        }
        if ((2 * $hue_value) < 1) {
            return ($v2);
        }
        if ((3 * $hue_value) < 2) {
            return ($v1 + ($v2 - $v1) * ((2 / 3) - $hue_value) * 6);
        }
        return ($v1);
    }

    function fromRGB(array $rgb)
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
            if ($lightness < 0.5) {
                $saturation = $diff_value / ($max_value + $min_value);
            } else {
                $saturation = $diff_value / (2 - $max_value - $min_value);
            }
            $red_point = ((($max_value - $red_value) / 6) + ($diff_value / 2)) / $diff_value;
            $green_point = ((($max_value - $green_value) / 6) + ($diff_value / 2)) / $diff_value;
            $blue_point = ((($max_value - $blue_value) / 6) + ($diff_value / 2)) / $diff_value;
            if ($red_value == $max_value) {
                $hue = $blue_point - $green_point;
            } elseif ($green_value == $max_value) {
                $hue = (1 / 3) + $red_point - $blue_point;
            } elseif ($blue_value == $max_value) {
                $hue = (2 / 3) + $green_point - $red_point;
            }
            if ($hue < 0) {
                $hue++;
            }
            if ($hue > 1) {
                $hue--;
            }
        }

        $this->hue = $hue * self::HUE_MAX;
        $this->saturation = $saturation * self::MAX;
        $this->lightness = $lightness * self::MAX;
        return array($this->hue, $this->saturation, $this->lightness);
    }
    protected function formatOutput($value, $format='')
    {

        if (is_array($value) && $format == 'standard') {
            return $this->getStandardOutput();
        }
        if (is_array($value) && $format == 'default') {
            return $this->getDefaultOutput();
        }
        if (is_array($value) && $format == 'object') {
            return $this;
        }
        if (is_array($value)&& $format == '') {  
            $new_values = array();
            foreach ($value as $val) {
                $new_values[] = $this->formatOutput($val, $format,true);
            }
            return $new_values;
        }
        if ($format == 'percentage') {
            return round(number_format(($value / self::MAX) * 100, $this->decimalLimit));
        }
        if ($format == 'float') {
            return floatval(number_format($value / self::MAX, $this->decimalLimit));
        }
        return $value;
    }
}
