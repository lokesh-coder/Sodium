<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class Collection extends GarageConcrete
{
    public function getCollection()
    {
    	 $getCurrentInputModel=$this->engine->inputProcessor->getCurrentInputModel();
        if(!$getCurrentInputModel instanceof ConversionAwareInterface)
            return $getCurrentInputModel->getCollection();
        return '';
    }
}
