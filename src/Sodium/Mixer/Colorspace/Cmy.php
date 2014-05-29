<?php

namespace Sodium\Mixer\Colorspace;

use Sodium\Model\Colorspace\Cmy as CmyModel;

class Cmy Extends CmyModel
{

    private $_model;

    public function __construct(CmyModel $model)
    {
        $this->_model = $model;
    }

    public function setCyan($value)
    {
        $this->_model->_cyan = $this->_validate_input($value);
    }

    public function getCyan($format)
    {
        return $this->_model->_format_output($this->_model->_cyan, $format);
    }

    public function setMagenta($value)
    {
        $this->_model->_magenta = $this->_validate_input($value);
    }

    public function getMagenta($format)
    {
        return $this->_model->_format_output($this->_model->_magenta, $format);
    }

    public function setYellow($value)
    {
        $this->_model->_yellow = $this->_validate_input($value);
    }

    public function getYellow($format)
    {
        return $this->_model->_format_output($this->_model->_yellow, $format);
    }

}
