<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Hsv extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $hsv = array();
    protected $hue = 0;
    protected $saturation = 0;
    protected $value = 0;
    private $defaultSaturation = 50;
    private $defaultValue = 50;
    protected $decimalLimit = 2;

    const MIN = 0;
    const MAX = 100;
    const HUE_MAX = 360;

    public function __construct($hsv = '')
    {
        if ($hsv != '') {
            $this->setProperties($this->format($hsv));
        }
    }

    protected function setProperties($hsv)
    {
        $this->hsv = $this->filterInput($hsv);
        if (count($hsv) == 3) {
            $this->hue = $this->validateInput($hsv[0], 'hue');
            $this->saturation = $this->validateInput($hsv[1]);
            $this->value = $this->validateInput($hsv[2]);
        }
    }

    protected function filterInput($value)
    {
        if (is_array($value)) {
            $hsv = array();

            foreach ($value as $key => $val) {
                if ($key == 0) {
                    $type = 'hue';
                } else {
                    $type = '';
                }
                $hsv[] = $this->validateInput($val, $type);
            }

            return $hsv;
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
            case 'hsv':

                $string = ltrim($string, 'hsv(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'hue':
                $string = ltrim($string, 'hue(');
                $string = rtrim($string, ')');
                $value = array($string, $this->defaultSaturation, $this->defaultValue);
                break;

            case 'saturation':

                $string = ltrim($string, 'saturation(');
                $string = rtrim($string, ')');
                $value = array(0, $string, 0);
                break;

            case 'value':

                $string = ltrim($string, 'value(');
                $string = rtrim($string, ')');
                $value = array(0, 0, $string);
                break;

            default:
                throw new \Exception('invalid Syntax');
        }

        return $value;
    }

    public static function regex()
    {
        $regex['hsv'] = '/^hsv\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['hue'] = '/^hue\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['saturation'] = '/^saturation\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['value'] = '/^value\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';

        return $regex;
    }

    public function getStandardOutput()
    {
        return 'hsv('.$this->hue.','.$this->saturation.','.$this->value.')';
    }

    public function getDefaultOutput()
    {
        return array($this->hue, $this->saturation, $this->value);
    }

    public function toRGB()
    {
        $hue = $this->hue / self::HUE_MAX;
        $saturation = $this->saturation / self::MAX;
        $value = $this->value / self::MAX;
        if ($saturation == 0) {
            $red = round($value * 255);
            $green = round($value * 255);
            $blue = round($value * 255);
        } else {
            $var_h = $hue * 6;
            $var_i = floor($var_h);
            $var_1 = $value * (1 - $saturation);
            $var_2 = $value * (1 - $saturation * ($var_h - $var_i));
            $var_3 = $value * (1 - $saturation * (1 - ($var_h - $var_i)));

            if ($var_i == 0) {
                $var_r = $value;
                $var_g = $var_3;
                $var_b = $var_1;
            } elseif ($var_i == 1) {
                $var_r = $var_2;
                $var_g = $value;
                $var_b = $var_1;
            } elseif ($var_i == 2) {
                $var_r = $var_1;
                $var_g = $value;
                $var_b = $var_3;
            } elseif ($var_i == 3) {
                $var_r = $var_1;
                $var_g = $var_2;
                $var_b = $value;
            } else {
                if ($var_i == 4) {
                    $var_r = $var_3;
                    $var_g = $var_1;
                    $var_b = $value;
                } else {
                    $var_r = $value;
                    $var_g = $var_1;
                    $var_b = $var_2;
                }
            }

            $red = round($var_r * 255);
            $green = round($var_g * 255);
            $blue = round($var_b * 255);
        }

        return array($red, $green, $blue);
    }

    public function fromRGB(array $rgb)
    {
        $red = $rgb[0] / 255;
        $green = $rgb[1] / 255;
        $blue = $rgb[2] / 255;

        $min = min($red, $green, $blue);
        $max = max($red, $green, $blue);

        $value = $max;
        $delta = $max - $min;

        if ($delta == 0) {
            $this->hue = self::MIN;
            $this->saturation = self::MIN;
            $this->value = ($value * self::MAX);

            return array($this->hue, $this->saturation, $this->value);
        }

        $saturation = 0;

        if ($max != 0) {
            $saturation = $delta / $max;
        } else {
            $saturation = 0;
            $hue = -1;

            $this->hue = ($hue);
            $this->saturation = ($saturation);
            $this->value = ($value);

            return array($this->hue, $this->saturation, $this->value);
        }
        if ($red == $max) {
            $hue = ($green - $blue) / $delta;
        } else {
            if ($green == $max) {
                $hue = 2 + ($blue - $red) / $delta;
            } else {
                $hue = 4 + ($red - $green) / $delta;
            }
        }
        $hue *= 60;
        if ($hue < 0) {
            $hue += self::HUE_MAX;
        }

        $this->hue = $hue;
        $this->saturation = ($saturation * self::MAX);
        $this->value = ($value * self::MAX);

        return array($this->hue, $this->saturation, $this->value);
    }

    protected function formatOutput($value, $format = '')
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
        if (is_array($value) && $format == '') {
            $newvalues = array();
            foreach ($value as $val) {
                $newvalues[] = $this->formatOutput($val, $format, true);
            }

            return $newvalues;
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
