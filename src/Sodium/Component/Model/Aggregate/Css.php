<?php

namespace Sodium\Component\Model\Aggregate;

use Sodium\Component\Reference\WebColorNames;
use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Aggregate\AggregateInterface;
use Sodium\Engine\Processor\Input\InputObserver;
use Sodium\Engine\Processor\Input\InputResolver;

class Css extends ModelConcrete implements AggregateInterface
{
    public static $canExportable = false;
    protected $rawColors = array();
    protected $convertedColors = array();
    public static $model = 'rgb';

    public function __construct($css = '')
    {
        if ($css != '') {
            $this->setProperties($this->format($css));
        }
    }

    protected function setProperties($colors)
    {
        $this->rawColors = $colors;
        $this->convertedColors = $this->convertToHex($colors);
    }

    public static function regex()
    {
        $regex['css'] = '/^css\(.*\)$/i';
        $regex['scss'] = '/^scss\(.*\)$/i';
        $regex['sass'] = '/^sass\(.*\)$/i';

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

    protected function format($string)
    {
        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
            case 'css':
            case 'scss':
            case 'sass':
                $string = ltrim($string, 'sass');
                $string = ltrim($string, 'scss');
                $string = ltrim($string, 'css');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                if (file_exists($string)) {
                    $file_content = file_get_contents($string);
                    $content = $this->parse($file_content);
                } else {
                    $content = $this->parse($string);
                }
                break;

            default:
                throw new \Exception('invalid Syntax');
        }

        return $content;
    }

    protected function parse($css_content)
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

        $colors = WebColorNames::get();
        $colors = array_change_key_case($colors, CASE_LOWER);
        $container['hex'] = $hex[0];
        $container['rgb'] = $rgb[0];
        $container['rgba'] = $this->parseAlpha($rgba[0]);
        $container['hsl'] = $hsl[0];
        $container['hsla'] = $this->parseAlpha($hsla[0], 'hsl');
        $container['name'] = array_intersect(array_flip($colors), $name[0]);

        return $container;
    }

    protected function convertToHex($container)
    {
        $hex_values = array();
        foreach ($container as $model => $values) {
            if ($model == 'hex') {
                foreach ($values as $key => $hex_value) {
                    $hex_values[$hex_value] = $hex_value;
                }
            } else {
                if (!count($container[$model]) == 0) {
                    foreach ($container[$model] as $model_name => $model_value) {
                        $models = InputResolver::init($model_value, self::$registeredModels)->getModels();
                        $inputObserver = InputObserver::init($models, self::$registeredModels)->observe();
                        $hex_values[$model_value] = $inputObserver[$model_value]['Sodium\Component\Model\Seed\Hex']->getStandardOutput();
                    }
                }
            }
        }

        return $hex_values;
    }

    protected function parseAlpha($raw_value, $mode = 'rgb')
    {
        $parsed = array();
        foreach ($raw_value as $value) {
            $value = ltrim($value, $mode.'a(');
            $value = rtrim($value, ')');
            $values = explode(',', $value);
            array_pop($values);
            $parsed[] = $mode.'('.implode(',', $values).')';
        }

        return $parsed;
    }

    public function getCollection()
    {
        return $this->convertedColors;
    }
}
