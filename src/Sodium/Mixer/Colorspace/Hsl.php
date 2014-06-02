<?php

namespace Sodium\Mixer\Colorspace;

use Sodium\Model\Colorspace\Hsl as HslModel;

class Hsl Extends HslModel
{

    private $_model;

    public function __construct(HslModel $model)
    {
        $this->_model = $model;
    }

    public function setHue($value)
    {
        $this->_model->_hue = $this->_validate_input($value, 'hue');
    }

    public function getHue()
    {
        return $this->_model->_hue;
    }

    public function setSaturation($value)
    {
        $this->_model->_saturation = $this->_validate_input($value);
    }

    public function getSaturation()
    {
        return $this->_model->_saturation;
    }

    public function setLightness($value)
    {
        $this->_model->_lightness = $this->_validate_input($value);
    }

    public function getLightness()
    {
        return $this->_model->_lightness;
    }


    public function getHsl()
    {
        return array(
            $this->_model->_hue,
            $this->_model->_saturation,
            $this->_model->_lightness
        );
    }

}