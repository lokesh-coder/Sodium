<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;
use Sodium\Engine\Processor\InputProcessor;
use Sodium\Engine\Processor\Input\InputObserver;

class Painter extends GarageConcrete
{
    private function _get_model($model)
    {
        return $this->currentInputModels['Sodium\\Component\\Model\\' . $model];
    }
     private function _update_models($model)
    {
        $trigger = InputObserver::init(array($this->_get_model($model)), InputProcessor::getRegisteredModels())->observe();
        $this->currentInputModels = $trigger[0];
        return $this;
    }

    
}
