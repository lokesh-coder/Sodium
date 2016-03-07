<?php

namespace Sodium\Component\Export;

use Sodium\Concrete\Component\Export\ExportConcrete;
use Sodium\Contract\Component\Export\ExportInterface;

class ManyToOne extends ExportConcrete implements ExportInterface
{
    public function export()
    {
        $models = $this->getInputProcessor()->getModels();
        $colors = array();
        foreach ($models as $name => $model) {
            $colors[] = $model[$this->model]->getStandardOutput();
        }

        return $this->exportAdapter->export($colors);
    }
}
