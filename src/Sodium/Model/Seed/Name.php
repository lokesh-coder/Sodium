<?php

namespace Sodium\Model\Seed;

use Sodium\Exception;
use Sodium\Reference;

class Name Extends AbstractSeed implements SeedInterface
{
    protected $_name = 'Black';
    protected $_default_name = 'unavailable';
    protected $_red = 0;
    protected $_green = 0;
    protected $_blue = 0;
    protected $_rgb_update = FALSE;

    public function __construct($name = '')
    {
        if ($name != '') {
            if (!is_string($name))
                throw new Exception('Invalid Input. Please provide String');
            $this->_name = strtolower($name);
        }
    }

    public function fromRGB(array $rgb)
    {
        $hexmodel = new Hex();
        $hex = $hexmodel->fromRGB($rgb);
        $hex = '#' . $hex;
        if (!in_array($hex, $this->_colornames()))
            $this->_name = $this->_default_name;
        else
            $this->_name = array_search($hex, $this->_colornames());
    }

    public function getDefaultOutput()
    {
        return $this->_name;
    }

    public function getStandardOutput()
    {
        return ucfirst(strtolower($this->_name));
    }

    public function toRGB($value = '')
    {
        if ($value != '') {
            if (!is_string($value))
                throw new Exception('Invalid Input. Please provide String');
            $value = strtolower($value);
            $hex = array_search($value, array_flip($this->_colornames(TRUE)));
            $hexmodel = new Hex($hex);
            return $hexmodel->toRGB();
        } elseif ($this->_rgb_update) {

            return array(
                $this->_red,
                $this->_green,
                $this->_blue
            );
        } elseif ($this->_name != $this->_default_name) {

            $hex = array_search($this->_name, array_flip($this->_colornames(TRUE)));
            $hexmodel = new Hex($hex);
            return $hexmodel->toRGB();
        }
    }

    public static function regex()
    {

        $regex[] = '/^([a-zA-Z]+)$/i';

        return $regex;
    }

    public function mixName($value)
    {
        $cur_rgb = $this->toRGB();
        $input_rgb = $this->toRGB($value);
        $rgb = $this->getResource('rgb');
        $rgb->fromRGB($cur_rgb)->mixRGB($input_rgb);
        $this->_red = $rgb->getRed();
        $this->_green = $rgb->getGreen();
        $this->_blue = $rgb->getBlue();
        $this->_rgb_update = TRUE;
    }

    public function getName()
    {
        return $this->_name;
    }

    protected function _colornames($case = FALSE)
    {
        $colors = Reference::load('WebColorNames')->get();
        if ($case)
            return array_change_key_case($colors, CASE_LOWER);
        return $colors;
    }

}

?>