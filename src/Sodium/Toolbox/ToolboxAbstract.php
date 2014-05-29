<?php

namespace Sodium\Toolbox;

use Sodium\Exception;
use Sodium\Sodium;

abstract class ToolboxAbstract
{

    protected $_sodium_object;
    protected $_args;

    public function __construct($args, Sodium $sodium_object)
    {

        $this->_sodium_object = new Sodium('#' . $sodium_object->getHex());
        $this->_args = $args;
        return $this;
    }

    protected static function getModel($resource)
    {
        $model_resource = ucfirst($resource) . '_Mixer';
        if (!class_exists($model_resource))
            throw new Exception("model not exists", 1);
        return new $model_resource();
    }

}