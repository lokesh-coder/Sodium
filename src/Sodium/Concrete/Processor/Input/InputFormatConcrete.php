<?php

namespace Sodium\Concrete\Processor\Input;

abstract class InputFormatConcrete
{
    protected $formats = array();

    public function setFormats($formats)
    {
        $this->formats = $formats;
    }

    public function getFormats()
    {
        return $this->formats;
    }
}
