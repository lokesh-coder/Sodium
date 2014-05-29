<?php

namespace Sodium\Plugin;

use Sodium\Sodium;

class Mingle Extends Sodium\Plugin\PluginAbstract
{

    protected $_col;
    protected $_value = 50;

    public function Mingle($args, $color_obj)
    {

        $this->_col = new Sodium($args[0]);
        $this->_col = $this->_col->getRGB();

        $f_rgb = $this->_half($color_obj->getRGB(), 2);
        $s_rgb = $this->_half($this->_col, 2);
        $rgb = $this->_sum($f_rgb, $s_rgb);
        $color_obj->setRed($rgb[0]);
        $color_obj->setGreen($rgb[1]);
        $color_obj->setBlue($rgb[2]);
    }

    protected function _half(array $rgb, $divide = 2)
    {

        $new_rgb = array();
        foreach ($rgb as $component) {
            $new_rgb[] = $this->_divide($component, $divide);
        }

        return $new_rgb;
    }

    protected function _sum(array $arr1, array $arr2)
    {

        $count = 0;
        $sum = array();

        foreach ($arr1 as $arr) {
            $sum[] = round($this->_calc_values($arr + $arr2[$count]));
            $count++;
        }

        return $sum;
    }

    protected function _calc_values($value)
    {

        $from = 0;
        $to = 255;

        if ($value < $from) {
            $value = $to + $value;
        } elseif ($value > $to) {
            $value = $value - $to;
        }

        return $value;
    }

    protected function _divide($component, $divide)
    {
        return $component / $divide;
    }

}