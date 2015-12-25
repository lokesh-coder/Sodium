<?php

namespace Sodium\Concrete\Cog;

use Sodium\Engine\Engine;
use Sodium\Engine\Processor\InputProcessor;

abstract class CogConcrete
{
    protected $currentInput;
    protected $inputs;
    protected $engine;

    protected function getInput()
    {
        return $this->engine->inputProcessor->getModel();
    }

    protected function getInputs()
    {
        return $this->engine->inputProcessor->getModels();
    }

    protected function getInputProcessor(){
        return $this->engine->inputProcessor;
    }
    protected function getCurrentInput(){
        return $this->engine->inputProcessor->getCurrentInput();
    }
    protected function getCurrentInputModel(){
        return $this->engine->inputProcessor->getCurrentInputModel();
    }

    public function setEngine(Engine $engine)
    {
        $this->engine = $engine;
        return $this;
    }
}
