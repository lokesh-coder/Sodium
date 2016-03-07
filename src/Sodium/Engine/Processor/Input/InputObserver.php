<?php

namespace Sodium\Engine\Processor\Input;

use Sodium\Contract\Component\Model\ModelInterface;
use Sodium\Contract\Component\Model\ConversionAwareInterface;

class InputObserver
{
    private $registeredModels;
    protected $models = array();

    public function __construct($models, $registeredModels)
    {
        $this->models = $models;
        $this->registeredModels = $registeredModels;
    }

    public static function init($models, $registeredModels)
    {
        return new self($models, $registeredModels);
    }

    public function observeAll(ModelInterface $inputModel)
    {
        foreach ($this->registeredModels as $name => $model) {
            if (get_class($inputModel) != $model) {
                $models[$model] = new $model();
                if ($inputModel instanceof ConversionAwareInterface &&
                    $models[$model] instanceof ConversionAwareInterface) {
                    $models[$model]->fromRGB($inputModel->toRGB());
                }
            } else {
                $models[$model] = $inputModel;
            }
        }

        return $models;
    }

    public function observe()
    {
        $models = array();
        foreach ($this->models as $name => $model) {
            $models[$name] = $this->observeAll($model);
        }

        return $models;
    }
}
