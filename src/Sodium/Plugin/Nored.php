<?php

namespace Sodium\Plugin;

class Nored Extends PluginAbstract
{

    protected $_obj;
    protected $_name = 'NoRed';
    protected $_default_red = 0;

    public function Nored($args = NULL, $color_obj)
    {

        $color_obj->setRed(0);
    }

}