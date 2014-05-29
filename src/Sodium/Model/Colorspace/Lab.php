<?php

namespace Sodium\Model\Colorspace;

use Sodium\Exception;
use Sodium\Reference;

class Lab Extends AbstractColorspace implements ColorspaceInterface
{
    protected $_l = 0;
    protected $_a = 0;
    protected $_b = 0;
    private $_cie = 'Cie1936';
    private $_observer_degree = 2;
    private $_illuminant = 'D65';

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

        $regex['lab'] = '/^lab\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function toRGB()
    {
        $var_Y = ($this->_l + 16) / 116;
        $var_X = ($this->_a / 500) + $var_Y;
        $var_Z = $var_Y - ($this->_b / 200);

        if (pow($var_Y, 3) > 0.008856)
            $var_Y = pow($var_Y, 3);
        else
            $var_Y = ($var_Y - 16 / 116) / 7.787;
        if (pow($var_X, 3) > 0.008856)
            $var_X = pow($var_X, 3);
        else
            $var_X = ($var_X - 16 / 116) / 7.787;
        if (pow($var_Z, 3) > 0.008856)
            $var_Z = pow($var_Z, 3);
        else
            $var_Z = ($var_Z - 16 / 116) / 7.787;

        $ref = $this->_reference();
        $x = $ref['x'] * $var_X;
        $y = $ref['y'] * $var_Y;
        $z = $ref['z'] * $var_Z;

        $value = 'xyz(' . round($x) . ',' . round($y) . ',' . round($z) . ')';
        $xyz = new Xyz($value);
        $rgb = $xyz->toRGB();
        return array(
            $rgb[0],
            $rgb[1],
            $rgb[2]
        );
    }

    public function fromRGB(array $rgb)
    {

        $xyz_model = new Xyz();
        $xyz = $xyz_model->fromRGB($rgb);
        $new_x = $xyz[0];
        $new_y = $xyz[1];
        $new_z = $xyz[2];

        $ref = $this->_reference();
        $x_varient = $new_x / $ref['x'];
        $y_varient = $new_y / $ref['y'];
        $z_varient = $new_z / $ref['z'];

        if ($x_varient > 0.008856)
            $x_varient = pow($x_varient, (1 / 3));
        else
            $x_varient = (7.787 * $x_varient) + (16 / 116);
        if ($y_varient > 0.008856)
            $y_varient = pow($y_varient, (1 / 3));
        else
            $y_varient = (7.787 * $y_varient) + (16 / 116);
        if ($z_varient > 0.008856)
            $z_varient = pow($z_varient, (1 / 3));
        else
            $z_varient = (7.787 * $z_varient) + (16 / 116);

        $this->_l = (116 * $y_varient) - 16;
        $this->_a = 500 * ($x_varient - $y_varient);
        $this->_b = 200 * ($y_varient - $z_varient);

        return array(
            $this->_l,
            $this->_a,
            $this->_b
        );
    }

    public function getDefaultOutput()
    {
        return array(
            'l' => $this->_l,
            'a' => $this->_a,
            'b' => $this->_b
        );
    }

    public function getStandardOutput()
    {
        return 'lab(' . $this->_l . ',' . $this->_a . ',' . $this->_b . ')';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'lab':
                $string = ltrim($string, 'lab(');
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
