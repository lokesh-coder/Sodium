<?php

namespace Sodium\Model\Aggregate;

use Sodium\Exception;
use Sodium\Export;
use Sodium\Model;
use Sodium\Reference;
use Sodium\Sodium;

class Css Extends AbstractAggregate implements AggregateInterface
{

    public static $is_exportable = FALSE;
    protected $_raw_colors = array();
    protected $_converted_colors = array();
    public static $Model = 'rgb';

    public function __construct($css = '')
    {
        if ($css != '')
            $this->_setProperties($this->_format($css));
    }

    protected function _setProperties($colors)
    {
        $this->_raw_colors = $colors;
        $this->_converted_colors = $this->_convert_to_hex($colors);
    }

    public static function regex()
    {
        $regex['css'] = '/^css\(.*\)$/i';
        return $regex;
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        return 'css(NULL)';
    }

    protected function _format($string)
    {

        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'css':
                $string = ltrim($string, 'css');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                if (file_exists($string)) {
                    $file_content = file_get_contents($string);
                    $content = $this->_parse($file_content);
                } else
                    $content = $this->_parse($string);
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $content;
    }

    protected function _parse($css_content)
    {
        $css_content = strtolower($css_content);
        $css_regex = array();
        $container = array();
        $css_regex['hex'] = '/#([0-9a-f]{3,6})/i';
        $css_regex['rgb'] = '/rgb\(([0-9]+%?),([0-9]+%?),([0-9]+%?)\)/i';
        $css_regex['rgba'] = '/rgba\(([0-9]+%?),([0-9]+%?),([0-9]+%?),([0-9\.]+%?)\)/i';
        $css_regex['hsl'] = '/hsl\(([0-9]+%?),([0-9]+%?),([0-9]+%?)\)/i';
        $css_regex['hsla'] = '/hsla\(([0-9]+%?),([0-9]+%?),([0-9]+%?),([0-9\.]+%?)\)/i';
        $css_regex['name'] = '/([a-zA-Z]+)/i';

        $p = preg_match_all($css_regex['hex'], $css_content, $hex);
        $p1 = preg_match_all($css_regex['rgb'], $css_content, $rgb);
        $p2 = preg_match_all($css_regex['rgba'], $css_content, $rgba);
        $p3 = preg_match_all($css_regex['hsl'], $css_content, $hsl);
        $p4 = preg_match_all($css_regex['hsla'], $css_content, $hsla);
        $p5 = preg_match_all($css_regex['name'], $css_content, $name);

        $colors = Reference::load('webcolornames')->get();
        $colors = array_change_key_case($colors, CASE_LOWER);
        $container['hex'] = $hex[0];
        $container['rgb'] = $rgb[0];
        $container['rgba'] = $this->_parse_alpha($rgba[0]);
        $container['hsl'] = $hsl[0];
        $container['hsla'] = $this->_parse_alpha($hsla[0], 'hsl');
        $container['name'] = array_intersect(array_flip($colors), $name[0]);
        return $container;
    }

    protected function _convert_to_hex($container)
    {
        $hex_values = array();
        foreach ($container as $model => $values) {
            if ($model == 'hex') {
                foreach ($values as $key => $hex_value)
                    $hex_values[$key] = $hex_value;
            } else {

                if (!count($container[$model]) == 0) {
                    foreach ($container[$model] as $model_name => $model_value) {

                        $sodium = new Sodium($model_value);
                        $hex_values[$model_value] = $sodium->export(Export::STS, array('standard' => true));
                    }
                }
            }
        }
        return $hex_values;
    }

    protected function _parse_alpha($raw_value, $mode = 'rgb')
    {
        $parsed = array();
        foreach ($raw_value as $value) {

            $value = ltrim($value, $mode . 'a(');
            $value = rtrim($value, ')');
            $values = explode(',', $value);
            array_pop($values);
            $parsed[] = $mode . '(' . implode(',', $values) . ')';
        }
        return $parsed;
    }

    public function getCollection($model = Model::HEX)
    {
        if ($model != Model::HEX) {
            $sodium = new Sodium($this->_converted_colors);
            return $sodium->export(Export::MTS, array('model' => $model, 'standard' => true));
        }
        return $this->_converted_colors;
    }

}
