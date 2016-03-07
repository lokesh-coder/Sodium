<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Hsl as HslModel;

class Hsl extends HslModel
{
    protected $HslModel;

    public function __construct(HslModel $hsl)
    {
        $this->HslModel = $hsl;
    }

    public function getHue($format)
    {
        return $this->HslModel->formatOutput($this->HslModel->hue, $format);
    }

    public function getSaturation($format)
    {
        return $this->HslModel->formatOutput($this->HslModel->saturation, $format);
    }
    public function getLightness($format)
    {
        return $this->HslModel->formatOutput($this->HslModel->lightness, $format);
    }

    public function getHSL($format)
    {
        return $this->HslModel->formatOutput($this->HslModel->hsl, $format);
    }

    public function setHue($hue)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($hue, $this->HslModel->saturation, $this->HslModel->lightness));
        $this->HslModel->hue = $this->HslModel->hsl[0];

        return $this;
    }
    public function setSaturation($saturation)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($this->HslModel->huw, $saturation, $this->HslModel->lightness));
        $this->HslModel->saturation = $this->HslModel->hsl[1];

        return $this;
    }
    public function setLightness($lightness)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($this->HslModel->hue, $this->HslModel->saturation, $lightness));
        $this->HslModel->lightness = $this->HslModel->hsl[2];

        return $this;
    }
    public function mixHue($hue)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($this->HslModel->hue + $hue, $this->HslModel->saturation, $this->HslModel->lightness));
        $this->HslModel->hue = $this->HslModel->hsl[0];

        return $this;
    }
    public function mixSaturation($saturation)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($this->HslModel->hue, $this->HslModel->saturation + $saturation, $this->HslModel->lightness));
        $this->HslModel->saturation = $this->HslModel->hsl[1];

        return $this;
    }
    public function mixLightness($lightness)
    {
        $this->HslModel->hsl = $this->HslModel->filterInput(array($this->HslModel->hue, $this->HslModel->saturation, $this->HslModel->lightness + $lightness));
        $this->HslModel->lightness = $this->HslModel->hsl[2];

        return $this;
    }
}
