<?php

namespace Sodium\Plugin;

class Gray Extends Sodium\Plugin\PluginAbstract
{

    protected $_value = 10;

    public function Gray($args, $color_obj)
    {

        if (isset($args[0]))
            $this->_value = (int)$args[0];
        $color_obj->setValue($this->_value);
    }

}