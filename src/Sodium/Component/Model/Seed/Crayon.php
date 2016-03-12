<?php

namespace Sodium\Component\Model\Seed;

use Sodium\Component\Reference\CrayolaCrayonsColors;
use Sodium\Component\Model\Seed\Hex;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;
use Sodium\Contract\Component\Model\Seed\SeedInterface;

class Crayon extends ModelConcrete implements SeedInterface,ConversionAwareInterface
{
    protected $name = 'Black';
    protected $defaultName = 'unavailable';
    protected $rgbUpdate = false;

    public function __construct($name = '')
    {
        if ($name != '') {
            if (!is_string($name)) {
                throw new \Exception('Invalid Input. Please provide String');
            }
            $this->name = $this->format($name);
        }
    }

    public function fromRGB(array $rgb)
    {
        $hexmodel = new Hex();
        $hex = $hexmodel->fromRGB($rgb);
        $hex = '#'.$hex;
        if (!in_array($hex, $this->colorNames())) {
            $this->name = $this->defaultName;
        } else {
            $this->name = array_search($hex, $this->colorNames());
        }

        return $this->name;
    }

    public function getDefaultOutput()
    {
        return $this->name;
    }

    public function getStandardOutput()
    {
        return ucfirst(strtolower($this->name));
    }

    public function getHex()
    {
        $hex=array_search($this->name, array_flip($this->colorNames(true)));
        if(!$hex)
            return '#000';
        return strtolower($hex);
    }

    public function toRGB()
    {
        $hex = $this->getHex();
        $hexmodel = new Hex($hex);

        return $hexmodel->toRGB();
    }

    public static function regex()
    {
        $regex['crayon'] = '/^crayon\([a-zA-Z\s]+\)$/i';

        return $regex;
    }

    private function format($string)
    {
        $type = self::isAcceptedFormat($string);
        switch ($type) {
            case 'crayon':
                $string = ltrim($string, 'crayon');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                $string = str_replace(' ', '', $string);
                $content = strtolower($string);
                break;

            default:
                throw new \Exception('invalid Syntax');
        }

        return $content;
    }

    public function getName()
    {
        return $this->name;
    }

    protected function colorNames($case = false)
    {
        $colors = CrayolaCrayonsColors::get();
        if ($case) {
            return array_change_key_case($colors, CASE_LOWER);
        }

        return $colors;
    }
}
