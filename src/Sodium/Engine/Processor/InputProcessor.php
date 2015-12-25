<?php

namespace Sodium\Engine\Processor;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Processor\ProcessorInterface;
use Sodium\Engine\Processor\Input\InputFormatter;
use Sodium\Engine\Processor\Input\InputObserver;
use Sodium\Engine\Processor\Input\InputResolver;

class InputProcessor implements ProcessorInterface
{
    protected $rawInputs;
    protected $formattedInputs;
    protected $formats=array();
    protected $inputWithModel;
    protected $inputsWithModel;
    protected $currentInput;
    protected $registeredModels=array();

    public function __construct($input,array $formats)
    {
        $this->rawInputs[] = $input;
        $this->formats = $formats;
        $this->currentInput=is_array($input)?$input[0]:$input;
    }

    public function initiate($input)
    {
        $duplicate=clone $this;
        $duplicate->rawInputs=array();
        $duplicate->rawInputs[] = $input;
        $duplicate->currentInput=is_array($input)?$input[0]:$input;
        return $duplicate;
    }

    public function pushInput($input)
    {
        $this->rawInputs[]=$input;
        return $this->process($this->registeredModels);
    }

    public function useInput($index)
    {
        $this->currentInput=$this->formattedInputs[$index];
        return $this->process($this->registeredModels);
    }

    public function clear()
    {
        $duplicate=clone $this;
        $duplicate->currentInput='';
        $duplicate->rawInputs=array();
        $duplicate->formattedInputs=array();
        $duplicate->inputWithModel=array();
        $duplicate->inputsWithModel=array();
        $duplicate->currentInput='';
        return $duplicate;
    }

    public function process($registeredModels)
    {
        $this->registeredModels=$registeredModels;
        $this->formattedInputs=InputFormatter::init($this->rawInputs,$this->formats)->format();
        ModelConcrete::setRegisteredModels($registeredModels);
        $resolver=InputResolver::init($this->formattedInputs,$registeredModels);
        $this->formattedInputs=$resolver->getInputs();
        $this->inputWithModel=$resolver->getModels();
        $this->inputsWithModel=InputObserver::init($this->inputWithModel,$registeredModels)->observe();
        return $this;
    }

    public function getModel()
    {
        return $this->inputWithModel;
    }

    public function getModels()
    {
        return $this->inputsWithModel;
    }

    public function getCurrentInput()
    {
        return $this->currentInput;
    }
    public function getCurrentInputModel()
    {
        return $this->inputWithModel[$this->currentInput];
    }
    public function getCurrentInputModels()
    {
        return $this->inputsWithModel[$this->currentInput];
    }

}
