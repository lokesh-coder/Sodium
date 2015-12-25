<?php

namespace Sodium\Concrete\Component\Garage;

abstract class GarageConcrete
{
    protected $currentInputModel;

    function __construct($currentInputModel)
    {
        $this->currentInputModel = $currentInputModel;
    }

}
