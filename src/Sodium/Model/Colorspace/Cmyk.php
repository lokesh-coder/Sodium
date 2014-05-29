<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Cmyk Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_cyan = 0;
    protected $_magenta = 0;
    protected $_yellow = 0;
    protected $_key = 0;

    const MIN = 0;
    const MAX = 255;
    const KEY_MAX = 100;

    public function __construct($cmyk = '')
    {

        if ($cmyk != '')
            $this->_setProperties($this->_format($cmyk));
    }

    protected function _setProperties($cmyk)
    {
        if (is_array($cmyk) && count($cmyk) == 4) {
            $this->_cyan = $this->_filter_input($cmyk[0]);
            $this->_magenta = $this->_filter_input($cmyk[1]);
            $this->_yellow = $this->_filter_input($cmyk[2]);
            $this->_key = $this->_filter_input($cmyk[3]);
        }
    }

    public static function regex()
    {

        $regex['cmyk'] = '/^cmyk\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['key'] = '/^key\(([-+]?[0-9]*.*)%?\)$/i';
        return $regex;
    }

    public function toRGB()
    {

        $cyan = $this->_cyan / 100;
        $magenta = $this->_magenta / 100;
        $yellow = $this->_yellow / 100;
        $key = $this->_key / 100;


        $cyan = ($cyan * (1 - $key) + $key);
        $magenta = ($magenta * (1 - $key) + $key);
        $yellow = ($yellow * (1 - $key) + $key);

        $red = round((1 - $cyan) * 255);
        $green = round((1 - $magenta) * 255);
        $blue = round((1 - $yellow) * 255);

        return array(
            $red,
            $green,
            $blue
        );
    }

    public function fromRGB(array $rgb)
    {

        $cyan = 1 - ($rgb[0] / 255);
        $magenta = 1 - ($rgb[1] / 255);
        $yellow = 1 - ($rgb[2] / 255);
        $key = 1;
        if ($cyan < $key) {
            $key = $cyan;
        }
        if ($magenta < $key) {
            $key = $magenta;
        }
        if ($yellow < $key) {
            $key = $yellow;
        }
        if ($key == 1) {
            $cyan = 0;
            $magenta = 0;
            $yellow = 0;
        } else {
            $cyan = ($cyan - $key) / (1 - $key);
            $magenta = ($magenta - $key) / (1 - $key);
            $yellow = ($yellow - $key) / (1 - $key);
        }

        $this->_cyan = round($cyan * self::MAX);
        $this->_magenta = round($magenta * self::MAX);
        $this->_yellow = round(($yellow * self::MAX));
        $this->_key = round($key * self::MAX);

        return array(
            $this->_cyan,
            $this->_magenta,
            $this->_yellow,
            $this->_key
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'cyan' => $this->_cyan,
            'magenta' => $this->_magenta,
            'yellow' => $this->_yellow,
            'key' => $this->_key
        );
    }

    public function getStandardOutput()
    {
        return 'cmyk(' . $this->_cyan . ',' . $this->_magenta . ',' . $this->_yellow . ',' . $this->_key . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'cmyk':
                $string = ltrim($string, 'cmyk(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            case 'key':
                $string = ltrim($string, 'key(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
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
            $cmyk = array();
            $last = end($value);
            $value = array_pop($value);
            foreach ($value as $key => $val)
                $cmyk[] = $this->_validate_input($val);
            $cmyk[] = $this->_validate_input($last, TRUE);
            return $cmyk;
        } else
            return $this->_validate_input($value);
    }

    protected function _validate_input($value, $key = FALSE)
    {

        $max = self::MAX;
        if ($key)
            $max = self::KEY_MAX;
        if (strpos($value, '%') !== FALSE) {
            $value = rtrim($value, '%');
            $value = intval($value);
            $value = ($max / 100) * $value;
            $value = round($value);
            $value = $this->_validate_input($value);
        } elseif ($value < self::MIN) {
            $value = self::MIN;
        } elseif ($value < 1) {
            $value = $value * $max;
            $value = round($value);
        } elseif ($value > $max) {
            $value = $max;
        }
        return intval($value);
    }

}
