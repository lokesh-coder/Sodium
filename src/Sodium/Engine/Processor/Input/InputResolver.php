<?php

namespace Sodium\Engine\Processor\Input;

use Sodium\Engine\Processor\Model\ModelInitiator;

class InputResolver
{
    protected $input;
    protected $inputs = array();
    protected $models;
    protected static $blankInputCount = 0;
    protected $predefinedColors = array('rgb(0,0,0)');
    private $registeredModels;

    public static function init($input, $registeredModels)
    {
        $self = new self($input, $registeredModels);

        return $self->resolve();
    }

    public function __construct($input, $registeredModels)
    {
        $this->input = $input;
        $this->registeredModels = $registeredModels;
    }

    public function setRegisteredModels(array $registeredModels)
    {
        $this->registeredModels = $registeredModels;
    }
    public function setPredefinedColors(array $predefinedColors)
    {
        $this->predefinedColors = $predefinedColors;
    }

    public function resolve()
    {
        $this->resolveInput($this->input);

        return $this;
    }

    protected function resolveInput($input)
    {
        if (empty($input)) {
            ++self::$blankInputCount;
            if (self::$blankInputCount == 1) {
                $this->resolveBlankInput();
            }
        } elseif (is_string($input)) {
            $this->resolveStringInput($input);
        } elseif (is_array($input)) {
            $this->resolveArrayInput($input);
        }

        return $this->models;
    }

    protected function resolveBlankInput($flush = false)
    {
        if ($flush) {
            return $this->fetchColorModel('');
        }
        $colors = count($this->predefinedColors) == 0 ? 'rgb(0,0,0)' : $this->predefinedColors;
        $this->resolveInput($colors);
    }

    protected function resolveStringInput($input)
    {
        $input = trim($input);
        $this->fetchColorModel($input);
    }

    protected function resolveArrayInput(array $input)
    {
        foreach ($input as $color) {
            $this->resolveInput($color);
        }
    }

    protected function fetchColorModel($input)
    {
        $valid = false;
        foreach ($this->registeredModels as $name => $model):
            if ($model::isAcceptedFormat($input)) {
                if (!isset($this->models[$input][$model])) {
                    $this->models[$input] = ModelInitiator::initiate($model, $input);
                    $this->inputs[] = $input;
                }
                $valid = true;
            }
        endforeach;
        if (!$valid) {
            throw new \Exception('Input Model not found: '.$input);
        }
    }

    public function getModels()
    {
        return $this->models;
    }
    public function getInputs()
    {
        return $this->inputs;
    }

    public function getModel($input)
    {
        $models = $this->getModels();

        return $models[$input];
    }
}
