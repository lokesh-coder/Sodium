<?php

namespace Sodium\Mixer\Colorspace;

use Sodium\Model\Colorspace\Cmyk as CmykModel;

class Cmyk Extends CmykModel
{

    private $_model;

    public function __construct(CmykModel $model)
    {
        $this->_model = $model;
    }

    public function setKey($value)
    {
        $this->_model->_key = $this->_validate_input($value);
    }

    public function getKey()
    {
        return $this->_model->_key;
    }

}
