<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Cmyk  extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $cyan = 0;
    protected $magenta = 0;
    protected $yellow = 0;
    protected $key = 0;

    const MIN = 0;
    const MAX = 255;
    const KEY_MAX = 100;

    public function __construct($cmyk = '')
    {
        if ($cmyk != '') {
            $this->setProperties($this->format($cmyk));
        }
    }

    protected function setProperties($cmyk)
    {
        if (is_array($cmyk) && count($cmyk) == 4) {
            $this->cyan = $this->filterInput($cmyk[0]);
            $this->magenta = $this->filterInput($cmyk[1]);
            $this->yellow = $this->filterInput($cmyk[2]);
            $this->key = $this->filterInput($cmyk[3]);
        }
    }

    static function regex()
    {
        $regex['cmyk'] = '/^cmyk\(([-+]?[0-9]*\.?[0-9]*)%?,([-+]?[0-9]*\.?.*)%?,([-+]?[0-9]*.*)%?,([-+]?[0-9]*.*)%?\)$/i';
        $regex['key'] = '/^key\(([-+]?[0-9]*.*)%?\)$/i';
        return $regex;
    }

    public function getStandardOutput()
    {
        return 'cmyk(' . $this->cyan . ',' . $this->magenta . ',' . $this->yellow . ',' . $this->key . ')';
    }

    public function getDefaultOutput()
    {
        return array(
            'cyan'    => $this->cyan,
            'magenta' => $this->magenta,
            'yellow'  => $this->yellow,
            'key'     => $this->key
        );
    }

    function toRGB()
    {
        $cyan = $this->cyan / 100;
        $magenta = $this->magenta / 100;
        $yellow = $this->yellow / 100;
        $key = $this->key / 100;


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

    function fromRGB(array $rgb)
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

        $this->cyan = round($cyan * self::MAX);
        $this->magenta = round($magenta * self::MAX);
        $this->yellow = round(($yellow * self::MAX));
        $this->key = round($key * self::MAX);

        return array(
            $this->cyan,
            $this->magenta,
            $this->yellow,
            $this->key
        );
    }

    protected function format($string)
    {

        $type = self::isValid($string, true);
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

    protected function filterInput($value)
    {

        if (is_array($value)) {
            $cmyk = array();
            $last = end($value);
            $value = array_pop($value);
            foreach ($value as $key => $val) {
                $cmyk[] = $this->validateInput($val);
            }
            $cmyk[] = $this->validateInput($last, true);
            return $cmyk;
        } else {
            return $this->validateInput($value);
        }
    }

    protected function validateInput($value, $key = false)
    {

        $max = self::MAX;
        if ($key) {
            $max = self::KEY_MAX;
        }
        if (strpos($value, '%') !== false) {
            $value = rtrim($value, '%');
            $value = intval($value);
            $value = ($max / 100) * $value;
            $value = round($value);
            $value = $this->validateInput($value);
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
