<?php

namespace Sodium\Model\Seed;

use Sodium\Exception;
use Sodium\Reference;

class Hex Extends AbstractSeed implements SeedInterface
{

    protected $_hex = '000000';

    public function __construct($hex = '')
    {
        if ($hex != '')
            $this->_hex = $this->_format($hex);
    }

    protected function _format($string)
    {

        if (!is_string($string))
            throw new Exception('Cannot accept array input. Please provide valid string.');
        if (!self::isValid($string))
            throw new Exception('invalid format');

        $string = strtolower($string);
        $string = str_replace('#', '', $string);
        $string = str_replace('0x', '', $string);
        if (strlen($string) == 3) {
            $hex_1 = $string[0] . $string[0];
            $hex_2 = $string[1] . $string[1];
            $hex_3 = $string[2] . $string[2];

            return $hex_1 . $hex_2 . $hex_3;
        }

        return $string;
    }

    public function fromRGB(array $rgb)
    {
        $rgb = $this->_format_toint($rgb);
        $hex_1 = array_search($rgb[0], $this->_hexcode(FALSE));
        $hex_2 = array_search($rgb[1], $this->_hexcode(FALSE));
        $hex_3 = array_search($rgb[2], $this->_hexcode(FALSE));
        $this->_hex = $hex_1 . $hex_2 . $hex_3;
        return $this->_hex;
    }

    public function getDefaultOutput()
    {
        return $this->_hex;
    }

    public function toRGB()
    {

        $r = array_search($this->_hex[0] . $this->_hex[1], $this->_hexcode(TRUE));
        $g = array_search($this->_hex[2] . $this->_hex[3], $this->_hexcode(TRUE));
        $b = array_search($this->_hex[4] . $this->_hex[5], $this->_hexcode(TRUE));
        return array(
            $r,
            $g,
            $b
        );
    }


    public function getHex($short=FALSE)
    {
        if ($short)
            return  $this->_to_short($this->_hex);
        return  $this->_hex;
    }

    public function getStandardOutput($short = FALSE)
    {
        if ($short)
            return '#' . $this->_to_short($this->_hex);
        return '#' . $this->_hex;
    }

    public static function regex()
    {
        $regex['hash_full'] = '/^#([0-9a-fA-F]{6})$/i';
        $regex['hash_short'] = '/^#([0-9a-fA-F]{3})$/i';
        $regex['char_full'] = '/^0x([0-9a-fA-F]{6})$/i';
        $regex['char_short'] = '/^0x([0-9a-fA-F]{3})$/i';
        return $regex;
    }

    private function _format_toint($values)
    {
        $new_val = array();
        foreach ($values as $value) {
            $new_val[] = (int)$value;
        }
        return $new_val;
    }


    protected function _hexcode($mode = TRUE)
    {

        $colors = Reference::load('HexCodes')->get();

        if (!$mode)
            return $colors;
        else
            return array_flip($colors);
    }

    private function _to_short($hex)
    {
        if(strlen($hex)==6)
            return $this->_trim_short($hex);
        return $hex;
    }


    private function _trim_short($hex)
    {
        if ($hex[0] == $hex[1] && $hex[3] == $hex[3] && $hex[4] == $hex[5])
            return $hex[0] . $hex[2] . $hex[4];
        else
            return $hex;
    }
}

?>
