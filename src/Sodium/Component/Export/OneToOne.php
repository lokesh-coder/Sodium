<?php

namespace Sodium\Component\Export;

use Sodium\Concrete\Component\Export\ExportConcrete;
use Sodium\Contract\Component\Export\ExportInterface;

class OneToOne extends ExportConcrete implements ExportInterface
{
    public function export()
    {
        $models = $this->getInputProcessor()->getCurrentInputModels();
        $rgbModel = $models[$this->model];
        $colors[] = $rgbModel->getStandardOutput();

        return $this->exportAdapter->export($colors);
    }
}
