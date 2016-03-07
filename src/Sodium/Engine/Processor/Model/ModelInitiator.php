<?php

namespace Sodium\Engine\Processor\Model;

class ModelInitiator
{
    protected $model;
    protected $input;

    public function __construct($model, $input)
    {
        $this->model = $model;
        $this->input = $input;
    }

    public function create()
    {
        return new $this->model($this->input);
    }

    public static function initiate($model, $input)
    {
        $modelObj = new self($model, $input);

        return $modelObj->create($input);
    }
}
