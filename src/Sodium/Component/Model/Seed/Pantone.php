<?php

namespace Sodium\Component\Model\Seed;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;
use Sodium\Contract\Component\Model\Seed\SeedInterface;

class Pantone extends ModelConcrete implements SeedInterface,ConversionAwareInterface
{
    protected $pantoneName;
    protected $defaultName = 'unavailable';
    protected $rgbUpdate = false;

    public function __construct($pantone = '')
    {
        if ($pantone != '') {
            $this->pantoneName = $this->format($pantone);
        }
    }

    public function fromRGB(array $rgb)
    {
        $hexmodel = new Hex();
        $hex = $hexmodel->fromRGB($rgb);
        $hex = '#'.$hex;
        if (!in_array($hex, $this->colornames())) {
            $this->pantoneName = $this->defaultName;
        } else {
            $this->pantoneName = array_search($hex, $this->colornames());
        }
    }

    public function getDefaultOutput()
    {
        return $this->pantoneName;
    }

    public function getStandardOutput()
    {
        return ucfirst(strtolower($this->pantoneName));
    }

    public function getHex()
    {
        return strtolower(array_search($this->_name, array_flip($this->colornames(true))));
    }

    public function toRGB()
    {
        $hex = array_search($this->pantoneName, array_flip($this->colornames(true)));
        $hexmodel = new Hex($hex);

        return $hexmodel->toRGB();
    }

    public static function regex()
    {
        $regex['pantone'] = '/^pantone\([a-zA-Z0-9]+\)$/i';

        return $regex;
    }

    private function format($string)
    {
        $type = self::isValid($string, true);
        switch ($type) {
            case 'pantone':
                $string = ltrim($string, 'pantone');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                $string = str_replace(' ', '', $string);
                $content = strtolower($string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }

        return $content;
    }

    public function getName()
    {
        return $this->pantoneName;
    }

    protected function colornames($case = false)
    {
        $colors = \Sodium\Component\Reference\Pantone::get();
        if ($case) {
            return array_change_key_case($colors, CASE_LOWER);
        }

        return $colors;
    }
}
