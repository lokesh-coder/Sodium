<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;

class HunterLab Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_l = 0;
    protected $_a = 0;
    protected $_b = 0;

    public function __construct($lab = '')
    {
        if ($lab != '')
            $this->_setProperties($this->_format($lab));
    }

    protected function _setProperties($lab)
    {
        if (is_array($lab) && count($lab) == 3) {
            $this->_l = $lab[0];
            $this->_a = $lab[1];
            $this->_b = $lab[2];
        }
    }

    public static function regex()
    {

        $regex['hlab'] = '/^hlab\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function toRGB()
    {
        $y = $this->_l / 10;
        $x = $this->_a / 17.5 * $this->_l / 10;
        $z = $this->_b / 7 * $this->_l / 10;

        $YY = pow($y, 2);
        $XX = ($x + $YY) / 1.02;
        $ZZ = -($z - $YY) / 0.847;
        $xyz_init = 'xyz(' . $XX . ',' . $YY . ',' . $ZZ . ')';

        $xyz = new Xyz($xyz_init);
        return $xyz->toRGB();
    }

    public function fromRGB(array $rgb)
    {
        $xyz = new Xyz();
        $getXyz = $xyz->fromRGB($rgb);
        if ($getXyz[1] == 0)
            return array('l' => 0, 'a' => 0, 'b' => 0);
        $this->_l = 10 * sqrt($getXyz[1]);
        $this->_a = 17.5 * (((1.02 * $getXyz[0]) - $getXyz[1]) / sqrt($getXyz[1]));
        $this->_b = 7 * (($getXyz[1] - (0.847 * $getXyz[2])) / sqrt($getXyz[1]));
        return array('l' => $this->_l, 'a' => $this->_a, 'b' => $this->_b);
    }

    public function getDefaultOutput()
    {
        return array(
            'hunter_l' => $this->_l,
            'hunter_a' => $this->_a,
            'hunter_b' => $this->_b
        );
    }

    public function getStandardOutput()
    {
        return 'hlab(' . $this->_l . ',' . $this->_a . ',' . $this->_b . ')';
    }

    protected function _format($string)
    {
        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'hlab':
                $string = ltrim($string, 'hlab(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $value;
    }

}
