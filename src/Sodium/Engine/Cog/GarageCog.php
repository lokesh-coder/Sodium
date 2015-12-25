<?php

namespace Sodium\Engine\Cog;

use Sodium\Concrete\Cog\CogConcrete;
use Sodium\Contract\Cog\CogInterface;

class GarageCog extends CogConcrete implements CogInterface
{
    protected $registeredGarages=array();
    protected $garageMethods=array();

    public function __construct($registeredGarages)
    {
        $this->registeredGarages = $registeredGarages;
    }

    public function process($method, $args)
    {
        $loadedMethods=$this->getGarages();
        if(in_array($method,array_flip($loadedMethods))){
            $class=$this->getGarageClass($method);
            $c=new $class($this->getCurrentInputModel());
            return $c->$method($args);
        }
        throw new \Exception('Garage Method '.$method.' not found.');
    }

    public function getGarages()
    {
        $methods=array();
        foreach($this->registeredGarages as $index=>$class){
            $class=$this->getGarageMethods($class);
            $methods[$class[0]]=$class[1];
        }
        return $methods;
    }

    private function getGarageMethods($class)
    {
        $reflectionClass=new \ReflectionClass($class);
        $methods=$reflectionClass->getMethods(\ReflectionMethod::IS_PUBLIC);
        return array($methods[0]->name,$methods[0]->class);
    }

    public function getGarageClass($method)
    {
        $garages=$this->getGarages();
        return $garages[$method];
    }
}
