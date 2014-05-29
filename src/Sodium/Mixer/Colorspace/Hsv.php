<?php

namespace Sodium\Mixer\Colorspace;

use Sodium\Model\Colorspace\Hsv as HsvModel;

class Hsv Extends HsvModel
{

    private $_model;

    public function __construct(HsvModel $model)
    {
        $this->_model = $model;
    }

    public function setHue($hue)
    {
        $this->_model->_hue = $this->_validate_input($hue, 'hue');

    }

    public function mixHue($hue)
    {
        return $this->_model->_hue = $this->_model->_hue + $hue;

    }

    public function getHue($hue)
    {
        return $this->_model->_hue;

    }

    public function setSaturation($saturation)
    {
        $this->_model->_saturation = $this->_validate_input($saturation);
    }

    public function getSaturation($saturation)
    {
        return $this->_model->_saturation;
    }

    public function setValue($value)
    {
        $this->_model->_value = $this->_validate_input($value);
    }

    public function getValue()
    {
        return $this->_model->_value;
    }

    public function getHsv()
    {
        return array(
            $this->_model->_hue,
            $this->_model->_saturation,
            $this->_model->_value
        );
    }

}
