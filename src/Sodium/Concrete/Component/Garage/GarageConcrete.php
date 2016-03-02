<?php

namespace Sodium\Concrete\Component\Garage;

abstract class GarageConcrete
{
    protected $currentInputModels;

    function __construct($currentInputModels)
    {
        $this->currentInputModels = $currentInputModels;
    }

}
