<?php

namespace Sodium\Engine\Cog;

use Sodium\Concrete\Cog\CogConcrete;
use Sodium\Contract\Cog\CogInterface;

class GarageCog extends CogConcrete implements CogInterface
{
    protected $registeredGarages = array();
    protected $garageMethods = array();

    public function __construct($registeredGarages)
    {
        $this->registeredGarages = $registeredGarages;
    }

    public function process($method, $args)
    {
        $loadedMethods = $this->getGarages();
        if (in_array($method, array_keys($loadedMethods))) {
            $class = $this->getGarageClass($method);
            $c = new $class($this->getCurrentInputModels());
            $c->setEngine($this->getEngine());
            if (count($args) == 1) {
                return $c->$method($args[0]);
            }

            return $c->$method($args[0]);
        }
        throw new \Exception('Garage Method '.$method.' not found.');
    }

    public function getGarages()
    {
        $methods = array();
        foreach ($this->registeredGarages as $index => $class) {
            $class = $this->getGarageMethods($class);
            foreach ($class as $name) {
                $methods[$name->name] = $name->class;
            }
        }

        return $methods;
    }

    private function getGarageMethods($class)
    {
        $reflectionClass = new \ReflectionClass($class);
        $methods = $reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);

        return $methods;
    }

    public function getGarageClass($method)
    {
        $garages = $this->getGarages();

        return $garages[$method];
    }
}
