<?php

namespace Sodium\Component\Export\Adapter\Flat;

use Sodium\Contract\Component\Export\Adapter\ExportAdapterInterface;

class SimpleArray implements ExportAdapterInterface
{
    public function export(array $colors)
    {
        return $colors;
    }
}
