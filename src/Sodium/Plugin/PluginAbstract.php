<?php

namespace Sodium\Plugin;

use Sodium\Config;
use Sodium\Sodium;
use Sodium\Storage;

abstract class PluginAbstract
{

    protected $_obj;
    protected $_name;

    final public function __construct($args, $obj)
    {

        $config_file = Storage::getValue('Config');
        Config::load($config_file);

        if (end($args) == 'quick') {
            $this->_obj = new Sodium('#' . $obj->getHex());
        } else
            $this->_obj = $obj;

        $method = get_called_class();
        $method = str_replace('Sodium\Plugin\\', '', $method);
        $this->_name = $method;
        $this->$method($args, $this->_obj);
    }

    public function getObj()
    {
        return $this->_obj;
    }

    public function getPluginName()
    {
        return $this->_name;
    }

}