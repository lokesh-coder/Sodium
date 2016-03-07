<?php

namespace Sodium\Concrete\Component\Model;

abstract class ModelConcrete
{
    protected static $canExportable = true;
    protected static $canConvert = true;
    protected static $registeredModels = array();

    public function __call($method, $args)
    {
        $value = '';
        if (count($args) != 0) {
            $value = $args[0];
        }
        $class = get_called_class();
        $class = str_replace('Model', 'Mixer', $class);
        if (!class_exists($class)) {
            throw new \Exception('Class '.$class.' not exists');
        }
        if (!method_exists($class, $method)) {
            throw new \Exception('Method '.$method.' not exists in class '.$class);
        }
        $mixer = new $class($this);

        return $mixer->$method($value);
    }

    public static function isAcceptedFormat($input, $returnValue = false)
    {
        $class = get_called_class();
        foreach ($class::regex() as $key => $regex) {
            if (preg_match($regex, $input)) {
                if ($returnValue) {
                    return $key;
                }

                return true;
            }
        }

        return false;
    }

    public static function getRegisteredModels()
    {
        return self::$registeredModels;
    }

    public static function setRegisteredModels($registeredModels)
    {
        self::$registeredModels = $registeredModels;
    }
}
