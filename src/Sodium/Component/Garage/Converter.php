<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;
use Sodium\Engine\Processor\InputProcessor;
use Sodium\Engine\Processor\Input\InputObserver;

class Converter extends GarageConcrete
{
    private function _get_model($model)
    {
        return $this->currentInputModels['Sodium\\Component\\Model\\' . $model];
    }

    private function _update_models()
    {
        $trigger = InputObserver::init(array($this->_get_model('Colorspace\Rgb')), InputProcessor::getRegisteredModels())->observe();
        $this->currentInputModels = $trigger[0];
        return $this;
    }

    public function getRed()
    {
        return $this->_get_model('Colorspace\Rgb')->getRed();
    }
    public function getGreen()
    {
        return $this->_get_model('Colorspace\Rgb')->getGreen();
    }
    public function getBlue()
    {
        return $this->_get_model('Colorspace\Rgb')->getBlue();
    }
    public function getRGB()
    {
        return $this->_get_model('Colorspace\Rgb')->getRGB();
    }
    public function setRed($red)
    {
        $this->_get_model('Colorspace\Rgb')->setRed($red);
        return $this->_update_models();
    }
    public function setGreen($green)
    {
        $this->_get_model('Colorspace\Rgb')->setGreen($green);
        return $this->_update_models();
    }

    public function getHex()
    {
        return $this->_get_model('Seed\Hex')->getHex();
    }
}
