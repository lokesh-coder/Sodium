<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;
use Sodium\Reference;

class Luv Extends AbstractColorspace implements ColorspaceInterface
{

    protected $_l = 0;
    protected $_u = 0;
    protected $_v = 0;
    private $_cie = 'Cie1936';
    private $_observer_degree = '2';
    private $_illuminant = 'D65';

    public function __construct($luv = '')
    {
        if ($luv != '')
            $this->_setProperties($this->_format($luv));
    }

    protected function _setProperties($luv)
    {
        if (is_array($luv) && count($luv) == 3) {
            $this->_l = $luv[0];
            $this->_u = $luv[1];
            $this->_v = $luv[2];
        }
    }

    public static function regex()
    {

        $regex['luv'] = '/^luv\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function toRGB()
    {
        $y = ($this->_l + 16) / 116;
        if (pow($y, 3) > 0.008856)
            $y = pow($y, 3);
        else
            $y = ($y - 16 / 116) / 7.787;

        $ref_x = 95.047;
        $ref_y = 100.000;
        $ref_z = 108.883;

        $ref_U = (4 * $ref_x) / ($ref_x + (15 * $ref_y) + (3 * $ref_z));
        $ref_V = (9 * $ref_y) / ($ref_x + (15 * $ref_y) + (3 * $ref_z));

        $u = $this->_u / (13 * $this->_l) + $ref_U;
        $v = $this->_v / (13 * $this->_l) + $ref_V;

        $y = $y * 100;
        $x = -(9 * $y * $u) / (($u - 4) * $v - $u * $v);
        $z = (9 * $y - (15 * $v * $y) - ($v * $x)) / (3 * $v);

        $xyz_model = new Xyz();
        return $xyz_model->toRGB(array($x, $y, $z));
    }

    public function fromRGB(array $rgb)
    {

        $xyz_model = new Xyz();
        $xyz = $xyz_model->fromRGB($rgb);
        $x = $xyz[0];
        $y = $xyz[1];
        $z = $xyz[2];

        $pro = $x + (15 * $y) + (3 * $z);
        if ($pro == 0) {
            $u = 0;
            $v = 0;
        } else {
            $u = (4 * $x) / $pro;
            $v = (9 * $y) / $pro;
        }

        $y = $y / 100;
        if ($y > 0.008856)
            $y = pow($y, (1 / 3));
        else
            $y = (7.787 * $y) + (16 / 116);

        $ref = $this->_reference();
        $ref_x = $ref['x'];
        $ref_y = $ref['y'];
        $ref_z = $ref['z'];

        $com = $ref_x + (15 * $ref_y) + (3 * $ref_z);
        if ($com == 0) {

            $ref_U = 0;
            $ref_V = 0;
        } else {
            $ref_U = (4 * $ref_x) / $com;
            $ref_V = (9 * $ref_y) / $com;
        }

        $this->_l = (116 * $y) - 16;
        $this->_u = 13 * $this->_l * ($u - $ref_U);
        $this->_v = 13 * $this->_l * ($v - $ref_V);

        return array(
            $this->_l,
            $this->_u,
            $this->_v
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'l' => $this->_l,
            'u' => $this->_u,
            'v' => $this->_v
        );
    }

    public function getStandardOutput()
    {
        return 'luv(' . $this->_l . ',' . $this->_u . ',' . $this->_v . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'luv':
                $string = ltrim($string, 'luv(');
                $string = rtrim($string, ')');
                $value = explode(',', $string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $value;
    }

    private function _reference()
    {
        $ref = Reference::load('Cie')->get();
        return $ref[$this->_cie][$this->_observer_degree][$this->_illuminant];
    }

}
