<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Component\Reference\Cie;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Lab extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $l = 0;
    protected $a = 0;
    protected $b = 0;
    private $cie = 'Cie1936';
    private $observerDegree = 2;
    private $illuminant = 'D65';

    public function __construct($lab = '')
    {
        if ($lab != '') {
            $this->setProperties($this->format($lab));
        }
    }

    protected function setProperties($lab)
    {
        if (isarray($lab) && count($lab) == 3) {
            $this->l = $lab[0];
            $this->a = $lab[1];
            $this->b = $lab[2];
        }
    }

    protected function format($string)
    {

        $type = self::isValid($string, true);
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

    private function reference()
    {
        // TODO: fix reference
        $ref = Cie::get();
        return $ref[$this->cie][$this->observerDegree][$this->illuminant];
    }

    static function regex()
    {
        $regex['lab'] = '/^lab\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function getStandardOutput()
    {
        return 'lab(' . $this->l . ',' . $this->a . ',' . $this->b . ')';
    }

    public function getDefaultOutput()
    {
        return array(
            'l' => $this->l,
            'a' => $this->a,
            'b' => $this->b
        );
    }

    function toRGB()
    {
        $var_Y = ($this->l + 16) / 116;
        $var_X = ($this->a / 500) + $var_Y;
        $var_Z = $var_Y - ($this->b / 200);

        if (pow($var_Y, 3) > 0.008856) {
            $var_Y = pow($var_Y, 3);
        } else {
            $var_Y = ($var_Y - 16 / 116) / 7.787;
        }
        if (pow($var_X, 3) > 0.008856) {
            $var_X = pow($var_X, 3);
        } else {
            $var_X = ($var_X - 16 / 116) / 7.787;
        }
        if (pow($var_Z, 3) > 0.008856) {
            $var_Z = pow($var_Z, 3);
        } else {
            $var_Z = ($var_Z - 16 / 116) / 7.787;
        }

        $ref = $this->reference();
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

    function fromRGB(array $rgb)
    {
        $xyz_model = new Xyz();
        $xyz = $xyz_model->fromRGB($rgb);
        $new_x = $xyz[0];
        $new_y = $xyz[1];
        $new_z = $xyz[2];

        $ref = $this->reference();
        $x_varient = $new_x / $ref['x'];
        $y_varient = $new_y / $ref['y'];
        $z_varient = $new_z / $ref['z'];

        if ($x_varient > 0.008856) {
            $x_varient = pow($x_varient, (1 / 3));
        } else {
            $x_varient = (7.787 * $x_varient) + (16 / 116);
        }
        if ($y_varient > 0.008856) {
            $y_varient = pow($y_varient, (1 / 3));
        } else {
            $y_varient = (7.787 * $y_varient) + (16 / 116);
        }
        if ($z_varient > 0.008856) {
            $z_varient = pow($z_varient, (1 / 3));
        } else {
            $z_varient = (7.787 * $z_varient) + (16 / 116);
        }

        $this->l = (116 * $y_varient) - 16;
        $this->a = 500 * ($x_varient - $y_varient);
        $this->b = 200 * ($y_varient - $z_varient);

        return array(
            $this->l,
            $this->a,
            $this->b
        );
    }
}
