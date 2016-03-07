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
    protected $formats = array();
    protected $inputsWithModel;
    protected $inputsWithModels;
    protected $currentInput;
    protected static $registeredModels = array();

    public function __construct($input, array $formats)
    {
        $this->rawInputs[] = $input;
        $this->formats = $formats;
        $this->currentInput = is_array($input) ? $input[0] : $input;
    }

    public function initiate($input)
    {
        $duplicate = clone $this;
        $duplicate->rawInputs = array();
        $duplicate->rawInputs[] = $input;
        $duplicate->currentInput = is_array($input) ? $input[0] : $input;

        return $duplicate;
    }

    public function pushInput($input)
    {
        $this->rawInputs[] = $input;

        return $this->process(self::$registeredModels);
    }

    public function useInput($index)
    {
        $this->currentInput = $this->formattedInputs[$index];

        return $this->process(self::$registeredModels);
    }

    public function clear()
    {
        $duplicate = clone $this;
        $duplicate->currentInput = '';
        $duplicate->rawInputs = array();
        $duplicate->formattedInputs = array();
        $duplicate->inputsWithModel = array();
        $duplicate->inputsWithModels = array();
        $duplicate->currentInput = '';

        return $duplicate;
    }

    public function process($registeredModels)
    {
        self::$registeredModels = $registeredModels;
        $this->formattedInputs = InputFormatter::init($this->rawInputs, $this->formats)->format();
        ModelConcrete::setRegisteredModels($registeredModels);
        $resolver = InputResolver::init($this->formattedInputs, $registeredModels);
        $this->formattedInputs = $resolver->getInputs();
        $this->inputsWithModel = $resolver->getModels();
        $this->inputsWithModels = InputObserver::init($this->inputsWithModel, $registeredModels)->observe();

        return $this;
    }

    public static function getRegisteredModels()
    {
        return self::$registeredModels;
    }

    public function getModel()
    {
        return $this->inputsWithModel;
    }

    public function getModels()
    {
        return $this->inputsWithModels;
    }

    public function getCurrentInput()
    {
        return $this->currentInput;
    }
    public function getCurrentInputModel($model = '')
    {
        if ($model != '' && $this->inputsWithModels[$this->currentInput][$model]) {
            return $this->inputsWithModels[$this->currentInput][$model];
        }

        return $this->inputsWithModel[$this->currentInput];
    }
    public function setCurrentInputModel($model)
    {
        $this->inputsWithModel[$this->currentInput] = $model;

        return $this;
    }
    public function getCurrentInputModels()
    {
        return $this->inputsWithModels[$this->currentInput];
    }
    public function setCurrentInputModels($models)
    {
        $this->inputsWithModels[$this->currentInput] = $models;

        return $this;
    }
}
