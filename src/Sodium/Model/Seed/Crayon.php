<?php

namespace Sodium\Model\Seed;

use Sodium\Exception;
use Sodium\Reference;

class Crayon Extends AbstractSeed implements SeedInterface
{

    protected $_name = 'Black';
    protected $_default_name = 'unavailable';
    protected $_rgb_update = FALSE;

    public function __construct($name = '')
    {
        if ($name != '') {
            if (!is_string($name))
                throw new Exception('Invalid Input. Please provide String');
            $this->_name = $this->_format($name);
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

    public function getHex()
    {
        return strtolower(array_search($this->_name, array_flip($this->_colornames(TRUE))));
    }

    public function toRGB()
    {
        $hex = array_search($this->_name, array_flip($this->_colornames(TRUE)));
        $hexmodel = new Hex($hex);
        return $hexmodel->toRGB();
    }

    public static function regex()
    {
        $regex['crayon'] = '/^crayon\([a-zA-Z\s]+\)$/i';

        return $regex;
    }

    private function _format($string)
    {
        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'crayon':
                $string = ltrim($string, 'crayon');
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
        return $this->_name;
    }

    protected function _colornames($case = FALSE)
    {
        $colors = Reference::load('CrayolaCrayonsColors')->get();
        if ($case)
            return array_change_key_case($colors, CASE_LOWER);
        return $colors;
    }

}
