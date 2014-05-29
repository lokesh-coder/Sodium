<?php

namespace Sodium\Model;

use Sodium\Config;
use Sodium\Exception;

abstract class AbstractModel Extends \Sodium\Model
{

    public static $is_exportable = TRUE;

    protected function _load_config($config_file_name)
    {

        Config::load($config_file_name);
    }

    protected function getResource($type)
    {

        $model = 'Sodium\Model\\' . ucfirst($type);
        return new $model();
    }


    public function __call($method, $args)
    {

        $value = '';
        if (count($args) != 0)
            $value = $args[0];
        $class = get_called_class();
        $class = str_replace('Model', 'Mixer', $class);
        if (!class_exists($class))
            throw new Exception($method . ' method not exists.' . $class . ' class not exists');
        if (!method_exists($class, $method))
            throw new Exception('method ' . $method . ' not exists in class ' . $class);
        $mixer = new $class($this);
        return $mixer->$method($value);
    }

    public static function isValid($input, $returnkey = FALSE)
    {
        $class = get_called_class();
        foreach ($class::regex() as $key => $regex) {
            if (preg_match($regex, $input)) {
                if ($returnkey)
                    return $key;
                return TRUE;
            }
        }
        return FALSE;
    }

}
