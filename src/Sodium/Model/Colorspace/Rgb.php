<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Rgb Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_rgb = array();
    protected $_red = 0;
    protected $_green = 0;
    protected $_blue = 0;
    protected $_decimal_limit = 2;

    const MIN = 0;
    const MAX = 255;

    public function __construct($rgb = '')
    {

        if ($rgb != '')
            $this->_setProperties($this->_format($rgb));
    }

    protected function _setProperties($rgb)
    {
        $this->_rgb = $this->_filter_input($rgb);
        if (is_array($rgb) && count($rgb) == 3) {
            $this->_red = $this->_filter_input($rgb[0]);
            $this->_green = $this->_filter_input($rgb[1]);
            $this->_blue = $this->_filter_input($rgb[2]);
        }
    }

    public static function regex()
    {

        $regex['rgb'] = '/^rgb\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['red'] = '/^red\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['green'] = '/^green\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';
        $regex['blue'] = '/^blue\(([-+]?[0-9]*\.?[0-9]*)%?\)$/i';

        return $regex;
    }

    public function toRGB()
    {
        return $this->_rgb;
    }

    public function fromRGB(array $rgb)
    {
        $this->_setProperties($rgb);
        return array(
            $this->_red,
            $this->_green,
            $this->_blue
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'red' => $this->_red,
            'green' => $this->_green,
            'blue' => $this->_blue
        );
    }

    public function getStandardOutput()
    {
        return 'rgb(' . $this->_red . ',' . $this->_green . ',' . $this->_blue . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
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
                    0
                );
                break;

            case 'green':
                $string = ltrim($string, 'green(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    $string,
                    0
                );
                break;

            case 'blue':
                $string = ltrim($string, 'blue(');
                $string = rtrim($string, ')');
                $value = array(
                    0,
                    0,
                    $string
                );
                break;
            default:
                throw new Exception('Invalid Syntax');
        }
        return $value;
    }

    protected function _filter_input($value)
    {

        if (is_array($value)) {
            $rgb = array();

            foreach ($value as $key => $val)
                $rgb[] = $this->_validate_input($val);

            return $rgb;
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

?>