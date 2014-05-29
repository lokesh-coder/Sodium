<?php

namespace Sodium\Model\Seed;

use Sodium\Exception;
use Sodium\Reference;

class Pantone Extends AbstractSeed implements SeedInterface
{

    protected $_pantone_name;
    protected $_default_name = 'unavailable';
    protected $_rgb_update = FALSE;

    public function __construct($pantone = '')
    {
        if ($pantone != '')
            $this->_pantone_name = $this->_format($pantone);
    }

    public function fromRGB(array $rgb)
    {
        $hexmodel = new Hex();
        $hex = $hexmodel->fromRGB($rgb);
        $hex = '#' . $hex;
        if (!in_array($hex, $this->_colornames()))
            $this->_pantone_name = $this->_default_name;
        else
            $this->_pantone_name = array_search($hex, $this->_colornames());
    }

    public function getDefaultOutput()
    {
        return $this->_pantone_name;
    }

    public function getStandardOutput()
    {
        return ucfirst(strtolower($this->_pantone_name));
    }

    public function getHex()
    {
        return strtolower(array_search($this->_name, array_flip($this->_colornames(TRUE))));
    }

    public function toRGB()
    {
        $hex = array_search($this->_pantone_name, array_flip($this->_colornames(TRUE)));
        $hexmodel = new Hex($hex);
        return $hexmodel->toRGB();
    }

    public static function regex()
    {
        $regex['pantone'] = '/^pantone\([a-zA-Z0-9]+\)$/i';

        return $regex;
    }

    private function _format($string)
    {
        $type = self::isValid($string, TRUE);
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
        return $this->_pantone_name;
    }

    protected function _colornames($case = FALSE)
    {
        $colors = Reference::load('Pantone')->get();
        if ($case)
            return array_change_key_case($colors, CASE_LOWER);
        return $colors;
    }

}
