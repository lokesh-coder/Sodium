<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Rgb extends ModelConcrete implements ColorspaceInterface, ConversionAwareInterface
{
    const MIN = 0;
    const MAX = 255;

    protected $rgb = array();
    protected $red = 0;
    protected $green = 0;
    protected $blue = 0;
    protected $decimalLimit = 2;

    public function __construct($rgb = '')
    {
        if ($rgb != '') {
            $this->setProperties($this->formatInput($rgb));
        }
    }

    protected function setProperties($rgb)
    {
        $this->rgb = $this->filterInput($rgb);
        if (is_array($rgb) && count($rgb) == 3) {
            $this->red = $this->filterInput($rgb[0]);
            $this->green = $this->filterInput($rgb[1]);
            $this->blue = $this->filterInput($rgb[2]);
        }
    }

    public static function regex()
    {
        $regex['rgb'] = '/^rgb\(\s?([-+]?[0-9]*\.?[0-9]*)%?\s?,(\s?[-+]?[0-9]*\.?.*)%?\s?,(\s?[-+]?[0-9]*.*)%?\s?\)$/i';
        $regex['red'] = '/^red\(\s?([-+]?[0-9]*\.?[0-9]*)%?\s?\)$/i';
        $regex['green'] = '/^green\(\s?([-+]?[0-9]*\.?[0-9]*)%?\s?\)$/i';
        $regex['blue'] = '/^blue\(\s?([-+]?[0-9]*\.?[0-9]*)%?\s?\)$/i';

        return $regex;
    }

    public function toRGB()
    {
        return $this->rgb;
    }

    public function fromRGB(array $rgb)
    {
        $this->setProperties($rgb);

        return array(
            $this->red,
            $this->green,
            $this->blue,
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'red' => $this->red,
            'green' => $this->green,
            'blue' => $this->blue,
        );
    }

    public function getStandardOutput()
    {
        return 'rgb('.$this->red.','.$this->green.','.$this->blue.')';
    }

    protected function formatInput($string)
    {
        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
            case 'rgb':
                $string = ltrim($string, 'rgb(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'red':
                $string = ltrim($string, 'red(');
                $string = rtrim($string, ')');
                $value = array(
                    $string,
                    0,
                    0,
                );
                break;

            case 'green':
                $string = ltrim($string, 'green(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    $string,
                    0,
                );
                break;

            case 'blue':
                $string = ltrim($string, 'blue(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    0,
                    $string,
                );
                break;
            default:
                throw new \Exception('Invalid Syntax');
        }

        return $value;
    }

    protected function filterInput($value)
    {
        if (is_array($value)) {
            $rgb = array();
            foreach ($value as $key => $val) {
                $rgb[] = $this->validateInput($val);
            }

            return $rgb;
        } else {
            return $this->validateInput($value);
        }
    }

    protected function validateInput($value)
    {
        if (strpos($value, '%') !== false) {
            $value = rtrim($value, '%');
            $value = (float) $value;
            $value = (self::MAX / 100) * $value;
            $value = round($value);
            $value = $this->validateInput($value);
        } elseif ($value < self::MIN) {
            $value = self::MIN;
        } elseif ($value < 1) {
            $value = $value * self::MAX;
            $value = round($value);
        } elseif ($value > self::MAX) {
            $value = self::MAX;
        }

        return intval($value);
    }

    protected function formatOutput($value, $format)
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
        if (is_array($value)) {
            $new_values = array();
            foreach ($value as $val) {
                $new_values[] = $this->formatOutput($val, $format, true);
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
