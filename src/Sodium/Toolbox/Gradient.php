<?php

namespace Sodium\Toolbox;

class Gradient Extends ToolboxAbstract
{
    protected $_start_color;
    protected $_end_color;
    protected $_default_color = '#f00';
    protected $_default_step = 5;
    protected $_steps;

    public function Gradient()
    {

        $user_color = isset($this->_args[0]) ? $this->_args[0] : $this->_default_color;
        $this->_end_color = $this->_sodium_object->import($user_color)->useInput(2)->getRGB();
        $this->_steps = isset($this->_args[1]) ? $this->_args[1] : $this->_default_step;
        $this->_start_color = $this->_sodium_object->getRGB();

        return $this->_getGradient();
    }

    private function _getGradient() {

        $step['r'] = ($this->_start_color[0] - $this->_end_color[0])/$this->_steps;
        $step['g'] = ($this->_start_color[1] - $this->_end_color[1])/$this->_steps;
        $step['b'] = ($this->_start_color[2] - $this->_end_color[2])/$this->_steps;

        $gradient = array();

        for($i = 0; $i <= $this->_steps; $i++) {

            $rgb[0] = floor($this->_start_color[0] - ($step['r'] * $i));
            $rgb[1] = floor($this->_start_color[1] - ($step['g'] * $i));
            $rgb[2] = floor($this->_start_color[2] - ($step['b'] * $i));


            $hex['r'] = sprintf('%02x', ($rgb[0]));
            $hex['g'] = sprintf('%02x', ($rgb[1]));
            $hex['b'] = sprintf('%02x', ($rgb[2]));

            $gradient[] = '#'.implode(NULL, $hex);

        }

        return $gradient;

    }
    private function _collect($rgb){
        return 'rgb('.$rgb[0].','.$rgb[1].','.$rgb[2].')';
    }

}