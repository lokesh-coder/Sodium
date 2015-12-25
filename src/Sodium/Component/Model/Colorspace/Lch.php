<?php

namespace Sodium\Component\Model\Colorspace;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Lch extends ModelConcrete implements ColorspaceInterface,ConversionAwareInterface
{
    protected $lightness = 0;
    protected $chroma = 0;
    protected $hue = 0;

    public function __construct($lch = '')
    {
        if ($lch != '') {
            $this->setProperties($this->format($lch));
        }
    }

    protected function setProperties($lch)
    {
        if (is_array($lch) && count($lch) == 3) {
            $this->lightness = $lch[0];
            $this->chroma = $lch[1];
            $this->hue = $lch[2];
        }
    }

    protected function format($string)
    {

        $type = self::isValid($string, true);
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

    static function regex()
    {
        $regex['lch'] = '/^lch\(([-+]?[0-9]*\.?[0-9]*),([-+]?[0-9]*\.?.*),([-+]?[0-9]*.*)\)$/i';
        return $regex;
    }

    public function getStandardOutput()
    {
        return 'lch(' . $this->lightness . ',' . $this->chroma . ',' . $this->hue . ')';

    }

    public function getDefaultOutput()
    {
        return array(
            'lightness' => $this->lightness,
            'chroma'    => $this->chroma,
            'hue'       => $this->hue
        );
    }

    function toRGB()
    {
        $radian = $this->hue * (pi() / 180);
        $a = cos($radian) * $this->chroma;
        $b = sin($radian) * $this->chroma;
        $lab = 'lab(' . $this->lightness . ',' . $a . ',' . $b . ')';
        $lab_model = new Lab($lab);
        return $lab_model->toRGB();
    }

    function fromRGB(array $rgb)
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

        $this->lightness = $l;
        $this->chroma = sqrt(pow($a, 2) + pow($b, 2));
        $this->hue = $hue;

        return array(
            $this->lightness,
            $this->chroma,
            $this->hue
        );
    }
}
