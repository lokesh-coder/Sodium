<?php

namespace Sodium\Engine\Cog;

use Sodium\Concrete\Cog\CogConcrete;
use Sodium\Concrete\Component\Export\ExportConcrete;
use Sodium\Contract\Cog\CogInterface;

class ExportCog extends CogConcrete implements CogInterface
{
    public function export(ExportConcrete $exportConcrete)
    {
        $exportConcrete->setInputProcessor($this->getInputProcessor());

        return $exportConcrete->export();
    }
}
