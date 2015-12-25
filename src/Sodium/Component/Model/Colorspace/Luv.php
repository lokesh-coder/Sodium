<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Component\Reference\Cie;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Luv extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $l = 0;
    protected $u = 0;
    protected $v = 0;
    private $cie = 'Cie1936';
    private $observerDegree = '2';
    private $_illuminant = 'D65';

    public function __construct($luv = '')
    {
        if ($luv != '') {
            $this->setProperties($this->format($luv));
        }
    }

    protected function setProperties($luv)
    {
        if (is_array($luv) && count($luv) == 3) {
            $this->l = $luv[0];
            $this->u = $luv[1];
            $this->v = $luv[2];
        }
    }

    protected function format($string)
    {

        $type = self::isValid($string, true);
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

    private function reference()
    {
        //TODO fix reference
        $ref = Cie::get();
        return $ref[$this->cie][$this->observerDegree][$this->_illuminant];
    }

    static function regex()
    {
        $regex['luv'] = '/^luv\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function getStandardOutput()
    {
        return 'luv(' . $this->l . ',' . $this->u . ',' . $this->v . ')';
    }

    public function getDefaultOutput()
    {
        return array(
            'l' => $this->l,
            'u' => $this->u,
            'v' => $this->v
        );
    }

    function toRGB()
    {
        $y = ($this->l + 16) / 116;
        if (pow($y, 3) > 0.008856) {
            $y = pow($y, 3);
        } else {
            $y = ($y - 16 / 116) / 7.787;
        }

        $ref_x = 95.047;
        $ref_y = 100.000;
        $ref_z = 108.883;

        $refu = (4 * $ref_x) / ($ref_x + (15 * $ref_y) + (3 * $ref_z));
        $refv = (9 * $ref_y) / ($ref_x + (15 * $ref_y) + (3 * $ref_z));

        $u = $this->u / (13 * $this->l) + $refu;
        $v = $this->v / (13 * $this->l) + $refv;

        $y = $y * 100;
        $x = -(9 * $y * $u) / (($u - 4) * $v - $u * $v);
        $z = (9 * $y - (15 * $v * $y) - ($v * $x)) / (3 * $v);

        $xyz_model = new Xyz();
        return $xyz_model->toRGB(array($x, $y, $z));
    }

    function fromRGB(array $rgb)
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
        if ($y > 0.008856) {
            $y = pow($y, (1 / 3));
        } else {
            $y = (7.787 * $y) + (16 / 116);
        }

        $ref = $this->reference();
        $ref_x = $ref['x'];
        $ref_y = $ref['y'];
        $ref_z = $ref['z'];

        $com = $ref_x + (15 * $ref_y) + (3 * $ref_z);
        if ($com == 0) {

            $refu = 0;
            $refv = 0;
        } else {
            $refu = (4 * $ref_x) / $com;
            $refv = (9 * $ref_y) / $com;
        }

        $this->l = (116 * $y) - 16;
        $this->u = 13 * $this->l * ($u - $refu);
        $this->v = 13 * $this->l * ($v - $refv);

        return array(
            $this->l,
            $this->u,
            $this->v
        );
    }
}
