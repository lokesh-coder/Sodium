<?php

namespace Sodium\Plugin;

class Brightness Extends PluginAbstract
{

    private $_brightness = 10;

    public function Brightness($args, $color_obj)
    {

        if (isset($args[0]))
            $this->_brightness = -$args[0];
        $percentage = $this->_brightness . '%';
        $rgb = array($percentage, $percentage, $percentage);
        $color_obj->mixRGB($rgb);
    }

}