<?php

namespace Sodium\Engine\Processor;

use Sodium\Contract\Processor\ProcessorInterface;

class ModelProcessor implements ProcessorInterface
{
    protected $registeredModels=array();

    function __construct(array $registeredModels)
    {
        $this->registeredModels = $registeredModels;
    }

    public function getRegisteredModels()
    {
        return $this->registeredModels;
    }
}
