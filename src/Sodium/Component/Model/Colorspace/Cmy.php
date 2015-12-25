<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Cmy extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{

    protected $cyan = 0;
    protected $magenta = 0;
    protected $yellow = 0;
    protected $decimalLimit = 2;

    const MIN = 0;
    const MAX = 255;

    public function __construct($cmy = '')
    {

        if ($cmy != '') {
            $this->setProperties($this->format($cmy));
        }
    }

    protected function setProperties($cmy)
    {

        if (is_array($cmy) && count($cmy) == 3) {
            $this->cyan = $this->filterInput($cmy[0]);
            $this->magenta = $this->filterInput($cmy[1]);
            $this->yellow = $this->filterInput($cmy[2]);
        }
    }

    public static function regex()
    {

        $regex['cmy'] = '/^cmy\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['cyan'] = '/^cyan\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['magenta'] = '/^magenta\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['yellow'] = '/^yellow\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';

        return $regex;
    }

    public function toRGB()
    {
        $red = (1 - ($this->cyan / 255)) * 255;
        $green = (1 - ($this->magenta / 255)) * 255;
        $blue = (1 - ($this->yellow / 255)) * 255;
        return array(
            $red,
            $green,
            $blue
        );
    }

    public function fromRGB(array $rgb)
    {
        $this->cyan = (255 - $rgb[0]);
        $this->magenta = (255 - $rgb[1]);
        $this->yellow = (255 - $rgb[2]);

        return array(
            $this->cyan,
            $this->magenta,
            $this->yellow
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'cyan'    => $this->cyan,
            'magenta' => $this->magenta,
            'yellow'  => $this->yellow
        );
    }

    public function getStandardOutput()
    {
        return 'cmy(' . $this->cyan . ',' . $this->magenta . ',' . $this->yellow . ')';
    }

    protected function format($string)
    {
        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
            case 'cmy':
                $string = ltrim($string, 'cmy(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'cyan':
                $string = ltrim($string, 'cyan(');
                $string = rtrim($string, ')');
                $value = array(
                    $string,
                    0,
                    0
                );
                break;

            case 'magenta':
                $string = ltrim($string, 'magenta(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    $string,
                    0
                );
                break;

            case 'yellow':
                $string = ltrim($string, 'yellow(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    0,
                    $string
                );
                break;
            default:
                throw new Exception('invalid Syntax');
        }
        return $value;
    }

    protected function filterInput($value)
    {

        if (is_array($value)) {
            $cmy = array();

            foreach ($value as $key => $val) {
                $cmy[] = $this->validateInput($val);
            }

            return $cmy;
        } else {
            return $this->validateInput($value);
        }
    }

    protected function validateInput($value)
    {

        if (strpos($value, '%') !== false) {
            $value = rtrim($value, '%');
            $value = (float)$value;
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
        if (is_array($value)) {
            $new_values = array();
            foreach ($value as $val) {
                $new_values[] = $this->formatOutput($val, $format);
            }
            return $new_values;
        }
        if ($format == 'percentage') {
            return round(numberformat(($value / self::MAX) * 100, $this->_decimal_limit));
        }
        if ($format == 'float') {
            return numberformat($value / self::MAX, $this->_decimal_limit);
        }
        if ($format == 'standard') {
            return $this->getStandardOutput();
        }
        if ($format == 'object') {
            return $this;
        }
        return $value;
    }
}
