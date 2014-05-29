<?php

namespace Sodium\Mixer\Colorspace;

use Sodium\Model\Colorspace\Rgb as RgbModel;

class Rgb Extends RgbModel
{

    private $_model;

    public function __construct(RgbModel $model)
    {
        $this->_model = $model;
    }

    public function getRed($format)
    {

        return $this->_model->_format_output($this->_model->_red, $format);
    }

    public function getGreen($format)
    {

        return $this->_model->_format_output($this->_model->_green, $format);
    }

    public function getBlue($format)
    {

        return $this->_model->_format_output($this->_model->_blue, $format);
    }

    public function getRGB($format='')
    {
        if ($format == 'object')
            return $this->_model;
        $rgb = $this->_model->_format_output($this->_model->_rgb, $format);
        if ($format == 'standard')
            return $rgb[0];
        return $rgb;
    }

    public function mixRed($value)
    {
        $value = $this->_model->_filter_input($value);
        return $this->_model->_rgb = $this->_model->_filter_input(array($this->_model->_rgb[0] + $value, $this->_model->_rgb[1], $this->_model->_rgb[2]));
    }

    public function mixRGB(array $rgb)
    {

        $rgb = $this->_model->_filter_input($rgb);
        $this->_model->_red = $this->_model->_filter_input($rgb[0] + $this->_model->_red);
        $this->_model->_green = $this->_model->_filter_input($rgb[1] + $this->_model->_green);
        $this->_model->_blue = $this->_model->_filter_input($rgb[2] + $this->_model->_blue);
        $this->_model->_rgb = $this->_model->_filter_input(array($this->_model->_red, $this->_model->_green, $this->_model->_blue));
    }

    public function setRed($value)
    {
        $this->_model->_red = $this->_model->_filter_input($value);
        $this->_model->_rgb = array($this->_model->_red, $this->_model->_green, $this->_model->_blue);
        return $this;
    }

    public function setGreen($value)
    {
        $this->_model->_green = $this->_model->_filter_input($value, TRUE);
        $this->_model->_rgb = array($this->_model->_red, $this->_model->_green, $this->_model->_blue);
        return $this;
    }

    public function setBlue($value)
    {
        $this->_model->_blue = $this->_model->_filter_input($value, TRUE);
        $this->_model->_rgb = array($this->_model->_red, $this->_model->_green, $this->_model->_blue);
        return $this;
    }

}