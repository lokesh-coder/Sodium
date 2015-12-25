<?php

namespace Sodium\Component\Export;

use Sodium\Concrete\Component\Export\ExportConcrete;
use Sodium\Contract\Component\Export\ExportInterface;

class ManyToMany extends ExportConcrete implements ExportInterface
{
    public function export()
    {
        $models=$this->getInputProcessor()->getModels();
        $colors=array();
        foreach ($models as $name=>$model) {
            foreach ($model as $modelname=>$modelobj) {
                $colors[$name][$modelname]=$modelobj->getStandardOutput();
            }
        }
        return $this->exportAdapter->export($colors);
    }
}
