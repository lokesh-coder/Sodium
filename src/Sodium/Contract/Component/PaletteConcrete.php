<?php
//todo move to palette directory
namespace Sodium\Contract\Component;

use Sodium\Engine\Processor\InputProcessor;

abstract class PaletteConcrete
{
    protected $inputProcessor;

    public function setInputProcessor(InputProcessor $inputProcessor)
    {
        $this->inputProcessor = $inputProcessor;
    }
}
