<?php

namespace Sodium\Component\Mixer\Colorspace;

use Sodium\Component\Model\Colorspace\Cmy as CmyModel;

class Cmy extends CmyModel
{
    protected $CmyModel;

    public function __construct(CmyModel $cmy)
    {
        $this->CmyModel = $cmy;
    }

    public function getCyan($format)
    {
        return $this->CmyModel->formatOutput($this->CmyModel->cyan, $format);
    }

    public function getMagenta($format)
    {
        return $this->CmyModel->formatOutput($this->CmyModel->magenta, $format);
    }
    public function getYellow($format)
    {
        return $this->CmyModel->formatOutput($this->CmyModel->yellow, $format);
    }

    public function getCMY($format)
    {
        return $this->CmyModel->formatOutput($this->CmyModel->cmy, $format);
    }

    public function setCyan($cyan)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($cyan, $this->CmyModel->magenta, $this->CmyModel->yellow));
        $this->CmyModel->cyan = $this->CmyModel->cmy[0];

        return $this;
    }
    public function setMagenta($magenta)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($this->CmyModel->cyan, $magenta, $this->CmyModel->yellow));
        $this->CmyModel->magenta = $this->CmyModel->cmy[1];

        return $this;
    }
    public function setYellow($yellow)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($this->CmyModel->cyan, $this->CmyModel->magenta, $yellow));
        $this->CmyModel->yellow = $this->CmyModel->cmy[2];

        return $this;
    }
    public function mixCyan($cyan)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($this->CmyModel->cyan + $cyan, $this->CmyModel->magenta, $this->CmyModel->yellow));
        $this->CmyModel->cyan = $this->CmyModel->cmy[0];

        return $this;
    }
    public function mixMagenta($magenta)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($this->CmyModel->cyan, $this->CmyModel->magenta + $magenta, $this->CmyModel->yellow));
        $this->CmyModel->magenta = $this->CmyModel->cmy[1];

        return $this;
    }
    public function mixYellow($yellow)
    {
        $this->CmyModel->cmy = $this->CmyModel->filterInput(array($this->CmyModel->cyan, $this->CmyModel->magenta, $this->CmyModel->yellow + $yellow));
        $this->CmyModel->yellow = $this->CmyModel->cmy[2];

        return $this;
    }
}
