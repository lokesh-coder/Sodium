<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Converter extends GarageConcrete
{
    public function getRed()
    {
        return $this->currentInputModel->getRed();
    }
}
