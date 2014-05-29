<?php

namespace Sodium\Model\Seed;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Exception;

class Basic Extends AbstractSeed implements SeedInterface
{

    private $_name = 'not available';
    private static $_file_prefix = '';
    private $_db;

    public function __construct($basic = '')
    {

        parent::_load_config('Default');

        if ($basic != '')
            $this->_set_properties($this->_format($basic));
    }

    private function _format($string)
    {
        $string = str_replace(array(
            '[',
            ']'
        ), '', $string);
        return strtolower($string);
    }

    private function _set_properties($value)
    {
        $this->_name = trim($value);
    }

    public static function regex()
    {
        $regex['full'] = '/^(\[[a-zA-Z]+\])$/i';
        return $regex;
    }

    public function fromRGB(array $rgb)
    {
        $hex = $this->getResource('Seed\Hex')->fromRGB($rgb);
        $db_file = self::$_file_prefix . 'Hex' . $hex[0];
        $db = $this->_get_db($db_file);
        $color = array_search($hex, $db);
        if (!$color)
            return $this->_name;
        return $this->_name = $color;
    }

    private function _get_db($db_file)
    {
        $db_file = $db_file . '.ini';
        $path = Config::get('Db_Path', 'Seed\Basic');
        $path = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $path;
        if (!file_exists($path . $db_file))
            throw new Exception('database file ' . $db_file . ' not exists.');
        $db_array = parse_ini_file($path . $db_file);
        return array_flip($db_array);
    }

    public function toRGB()
    {
        $letter = ucfirst($this->_name[0]);
        $db_file = self::$_file_prefix . 'Letter' . $letter;
        $db = $this->_get_db($db_file);
        $color = array_search($this->_name, $db);
        if ($color === FALSE)
            return array(0, 0, 0);
        $hex_model = new Hex('#' . $color);
        return $hex_model->toRGB();
    }

    public function getDefaultOutput()
    {
        return $this->_name;
    }

    public function getStandardOutput()
    {
        return '[' . $this->_name . ']';
    }

}