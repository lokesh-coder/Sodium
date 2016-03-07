<?php

namespace Sodium\Concrete\Component\Garage;

use Sodium\Engine\Engine;
use Sodium\Engine\Processor\InputProcessor;
use Sodium\Engine\Processor\Input\InputObserver;

abstract class GarageConcrete
{
    protected $currentInputModels;
    protected $engine;

    protected function getModel($model)
    {
        $getCurrentInputModels = $this->engine->inputProcessor->getCurrentInputModels();

        return $getCurrentInputModels['Sodium\\Component\\Model\\'.$model];
    }

    protected function updateModels($model)
    {
        $trigger = InputObserver::init(array($this->getModel($model)), InputProcessor::getRegisteredModels())->observe();

        $currentInput = $this->engine->inputProcessor->getCurrentInputModel();
        $currentInputModel = $trigger[0][get_class($currentInput)];
        $this->engine->inputProcessor->setCurrentInputModel($currentInputModel);
        $this->engine->inputProcessor->setCurrentInputModels($trigger[0]);

        return $this->engine;
    }

    public function __construct($currentInputModels)
    {
        $this->currentInputModels = $currentInputModels;
    }
    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
    }
    public function getEngine()
    {
        return $this->engine;
    }
}
