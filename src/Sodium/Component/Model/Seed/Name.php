<?php

namespace Sodium\Component\Model\Seed;

use Sodium\Component\Reference\WebColorNames;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;
use Sodium\Contract\Component\Model\Seed\SeedInterface;

class Name extends ModelConcrete implements SeedInterface,ConversionAwareInterface
{
    protected $name = 'Black';
    protected $defaultName = 'unavailable';
    protected $red = 0;
    protected $green = 0;
    protected $blue = 0;
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

    protected function colorNames($case = false)
    {
        $colors = WebColorNames::get();
        if ($case) {
            return array_change_key_case($colors, CASE_LOWER);
        }

        return $colors;
    }

    public function getDefaultOutput()
    {
        return $this->name;
    }

    public function getStandardOutput()
    {
        return ucfirst(strtolower($this->name));
    }

    public static function regex()
    {
        $regex['default'] = '/^([a-zA-Z]+)$/i';

        return $regex;
    }

    public function mixName($value)
    {
        $cur_rgb = $this->toRGB();
        $input_rgb = $this->toRGB($value);
        $rgb = $this->getResource('rgb');
        $rgb->fromRGB($cur_rgb)
            ->mixRGB($input_rgb);
        $this->red = $rgb->getRed();
        $this->green = $rgb->getGreen();
        $this->blue = $rgb->getBlue();
        $this->rgbUpdate = true;
    }

    public function toRGB($value = '')
    {
        if ($value != '') {
            if (!is_string($value)) {
                throw new Exception('Invalid Input. Please provide String');
            }
            $value = strtolower($value);
            $hex = array_search($value, array_flip($this->colorNames(true)));
            $hexmodel = new Hex($hex);

            return $hexmodel->toRGB();
        } elseif ($this->rgbUpdate) {
            return array(
                $this->red,
                $this->green,
                $this->blue,
            );
        } elseif ($this->name != $this->defaultName) {
            $hex = array_search($this->name, array_flip($this->colorNames(true)));
            $hexmodel = new Hex($hex);

            return $hexmodel->toRGB();
        }
    }


    private function format($string)
    {
        $type = self::isAcceptedFormat($string);
        switch ($type) {
            case 'default':
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
}
