<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Cmy Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_cyan = 0;
    protected $_magenta = 0;
    protected $_yellow = 0;
    protected $_decimal_limit = 2;

    const MIN = 0;
    const MAX = 255;

    public function __construct($cmy = '')
    {

        if ($cmy != '')
            $this->_setProperties($this->_format($cmy));
    }

    protected function _setProperties($cmy)
    {

        if (is_array($cmy) && count($cmy) == 3) {
            $this->_cyan = $this->_filter_input($cmy[0]);
            $this->_magenta = $this->_filter_input($cmy[1]);
            $this->_yellow = $this->_filter_input($cmy[2]);
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
        $red = (1 - ($this->_cyan / 255)) * 255;
        $green = (1 - ($this->_magenta / 255)) * 255;
        $blue = (1 - ($this->_yellow / 255)) * 255;
        return array(
            $red,
            $green,
            $blue
        );
    }

    public function fromRGB(array $rgb)
    {
        $this->_cyan = (255 - $rgb[0]);
        $this->_magenta = (255 - $rgb[1]);
        $this->_yellow = (255 - $rgb[2]);

        return array(
            $this->_cyan,
            $this->_magenta,
            $this->_yellow
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'cyan' => $this->_cyan,
            'magenta' => $this->_magenta,
            'yellow' => $this->_yellow
        );
    }

    public function getStandardOutput()
    {
        return 'cmy(' . $this->_cyan . ',' . $this->_magenta . ',' . $this->_yellow . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
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

    protected function _filter_input($value)
    {

        if (is_array($value)) {
            $cmy = array();

            foreach ($value as $key => $val)
                $cmy[] = $this->_validate_input($val);

            return $cmy;
        } else
            return $this->_validate_input($value);
    }

    protected function _validate_input($value)
    {

        if (strpos($value, '%') !== FALSE) {
            $value = rtrim($value, '%');
            $value = (float)$value;
            $value = (self::MAX / 100) * $value;
            $value = round($value);
            $value = $this->_validate_input($value);
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

    protected function _format_output($value, $format)
    {
        if (is_array($value)) {
            $new_values = array();
            foreach ($value as $val) {
                $new_values[] = $this->_format_output($val, $format);
            }
            return $new_values;
        }
        if ($format == 'percentage')
            return round(number_format(($value / self::MAX) * 100, $this->_decimal_limit));
        if ($format == 'float')
            return number_format($value / self::MAX, $this->_decimal_limit);
        if ($format == 'standard')
            return $this->getStandardOutput();
        if ($format == 'object')
            return $this;
        return $value;
    }
}
