<?php

namespace Sodium\Concrete\Component\Export;

use Sodium\Contract\Component\Export\Adapter\ExportAdapterInterface;
use Sodium\Engine\Processor\InputProcessor;

abstract class ExportConcrete
{
    protected $exportAdapter;
    protected $inputProcessor;
    protected $model;

    public function __construct(ExportAdapterInterface $exportAdapter, $model='Sodium\Component\Model\Seed\Hex')
    {
        $this->model=$model;
        $this->exportAdapter = $exportAdapter;
    }

    public function getInputProcessor()
    {
        return $this->inputProcessor;
    }

    public function setInputProcessor(InputProcessor $inputProcessor)
    {
        $this->inputProcessor = $inputProcessor;
    }


}
