<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class Lch Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_lightness = 0;
    protected $_chroma = 0;
    protected $_hue = 0;

    public function __construct($lch = '')
    {
        if ($lch != '')
            $this->_setProperties($this->_format($lch));
    }

    protected function _setProperties($lch)
    {
        if (is_array($lch) && count($lch) == 3) {
            $this->_lightness = $lch[0];
            $this->_chroma = $lch[1];
            $this->_hue = $lch[2];
        }
    }

    public static function regex()
    {

        $regex['lch'] = '/^lch\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function toRGB()
    {

        $radian = $this->_hue * (pi() / 180);
        $a = cos($radian) * $this->_chroma;
        $b = sin($radian) * $this->_chroma;
        $lab = 'lab(' . $this->_lightness . ',' . $a . ',' . $b . ')';
        $lab_model = new Lab($lab);
        return $lab_model->toRGB();
    }

    public function fromRGB(array $rgb)
    {

        $lab_model = new Lab();
        $lab = $lab_model->fromRGB($rgb);
        $l = $lab[0];
        $a = $lab[1];
        $b = $lab[2];

        $hue = atan2($b, $a);

        if ($hue > 0) {
            $hue = ($hue / pi()) * 180;
        } else {
            $hue = 360 - (abs($hue) / pi()) * 180;
        }

        $this->_lightness = $l;
        $this->_chroma = sqrt(pow($a, 2) + pow($b, 2));
        $this->_hue = $hue;

        return array(
            $this->_lightness,
            $this->_chroma,
            $this->_hue
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'lightness' => $this->_lightness,
            'chroma' => $this->_chroma,
            'hue' => $this->_hue
        );
    }

    public function getStandardOutput()
    {
        return 'lch(' . $this->_lightness . ',' . $this->_chroma . ',' . $this->_hue . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'lch':
                $string = ltrim($string, 'lch(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $value;
    }

}
