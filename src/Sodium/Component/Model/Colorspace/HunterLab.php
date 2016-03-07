<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class HunterLab extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $l = 0;
    protected $a = 0;
    protected $b = 0;

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

    public static function regex()
    {
        $regex['hlab'] = '/^hlab\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';

        return $regex;
    }

    public function getStandardOutput()
    {
        return 'hlab('.$this->l.','.$this->a.','.$this->b.')';
    }

    public function getDefaultOutput()
    {
        return array(
            'hunterl' => $this->l,
            'huntera' => $this->a,
            'hunterb' => $this->b,
        );
    }

    public function toRGB()
    {
        $y = $this->l / 10;
        $x = $this->a / 17.5 * $this->l / 10;
        $z = $this->b / 7 * $this->l / 10;

        $YY = pow($y, 2);
        $XX = ($x + $YY) / 1.02;
        $ZZ = -($z - $YY) / 0.847;
        $xyz_init = 'xyz('.$XX.','.$YY.','.$ZZ.')';

        $xyz = new Xyz($xyz_init);

        return $xyz->toRGB();
    }

    public function fromRGB(array $rgb)
    {

        // TODO refactor xyz class
        $xyz = new Xyz();
        $getXyz = $xyz->fromRGB($rgb);
        if ($getXyz[1] == 0) {
            return array('l' => 0, 'a' => 0, 'b' => 0);
        }
        $this->l = 10 * sqrt($getXyz[1]);
        $this->a = 17.5 * (((1.02 * $getXyz[0]) - $getXyz[1]) / sqrt($getXyz[1]));
        $this->b = 7 * (($getXyz[1] - (0.847 * $getXyz[2])) / sqrt($getXyz[1]));

        return array('l' => $this->l, 'a' => $this->a, 'b' => $this->b);
    }
}
