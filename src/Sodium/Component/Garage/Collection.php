<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Collection extends GarageConcrete
{
    public function getCollection()
    {
        if(!$this->currentInputModel instanceof ConversionAwareInterface)
            return $this->currentInputModel->getCollection();
        return '';
    }
}
