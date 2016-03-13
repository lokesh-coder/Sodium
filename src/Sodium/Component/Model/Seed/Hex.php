<?php

namespace Sodium\Component\Model\Seed;

use Sodium\Component\Reference\HexCode;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;
use Sodium\Contract\Component\Model\Seed\SeedInterface;

class Hex extends ModelConcrete implements SeedInterface,ConversionAwareInterface
{
    protected $hex = '000000';

    public function __construct($hex = '')
    {
        if ($hex != '') {
            $this->hex = $this->format($hex);
        }
    }

    protected function format($string)
    {
        if (!is_string($string)) {
            throw new \Exception('Cannot accept array input. Please provide valid string.');
        }
        if (!self::isAcceptedFormat($string)) {
            throw new \Exception('invalid format');
        }

        $string = strtolower($string);
        $string = str_replace('#', '', $string);
        $string = str_replace('0x', '', $string);
        if (strlen($string) == 3) {
            $hex_1 = $string[0].$string[0];
            $hex_2 = $string[1].$string[1];
            $hex_3 = $string[2].$string[2];

            return $hex_1.$hex_2.$hex_3;
        }
        $this->hex=$string;

        return $this->hex;
    }

    public function fromRGB(array $rgb)
    {
        $rgb = $this->formatToInt($rgb);
        $hex_1 = array_search($rgb[0], $this->hexcode(false));
        $hex_2 = array_search($rgb[1], $this->hexcode(false));
        $hex_3 = array_search($rgb[2], $this->hexcode(false));
        $this->hex = $hex_1.$hex_2.$hex_3;

        return $this->hex;
    }

    public function getDefaultOutput()
    {
        return $this->hex;
    }

    public function toRGB()
    {
        $r = array_search($this->hex[0].$this->hex[1], $this->hexcode(true));
        $g = array_search($this->hex[2].$this->hex[3], $this->hexcode(true));
        $b = array_search($this->hex[4].$this->hex[5], $this->hexcode(true));

        return array(
            $r,
            $g,
            $b,
        );
    }


    public function getStandardOutput($short = false)
    {
        if ($short) {
            return '#'.$this->toShort($this->hex);
        }

        return '#'.$this->hex;
    }

    public static function regex()
    {
        $regex['hash_full'] = '/^#([0-9a-fA-F]{6})$/i';
        $regex['hash_short'] = '/^#([0-9a-fA-F]{3})$/i';
        $regex['char_full'] = '/^0x([0-9a-fA-F]{6})$/i';
        $regex['char_short'] = '/^0x([0-9a-fA-F]{3})$/i';

        return $regex;
    }

    protected function formatToInt($values)
    {
        $new_val = array();
        foreach ($values as $value) {
            $new_val[] = (int) $value;
        }

        return $new_val;
    }

    protected function hexcode($mode = true)
    {
        $colors = HexCode::get();
        if (!$mode) {
            return $colors;
        } else {
            return array_flip($colors);
        }
    }

    protected function toShort($hex)
    {
        if (strlen($hex) == 6) {
            return $this->trimShort($hex);
        }

        return $hex;
    }

    protected function trimShort($hex)
    {
        if ($hex[0] == $hex[1] && $hex[3] == $hex[3] && $hex[4] == $hex[5]) {
            return $hex[0].$hex[2].$hex[4];
        } else {
            return $hex;
        }
    }

    public function formatOutput($format){
        if($format=='standard')
            return $this->getStandardOutput();
        return getHex();
    }
}
