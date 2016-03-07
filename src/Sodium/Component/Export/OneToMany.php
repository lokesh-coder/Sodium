<?php

namespace Sodium\Component\Export;

use Sodium\Concrete\Component\Export\ExportConcrete;
use Sodium\Contract\Component\Export\ExportInterface;

class OneToMany extends ExportConcrete implements ExportInterface
{
    public function export()
    {
        $models = $this->getInputProcessor()->getCurrentInputModels();
        $colors = array();
        foreach ($models as $name => $model) {
            $colors[] = $model->getStandardOutput();
        }

        return $this->exportAdapter->export($colors);
    }
}
