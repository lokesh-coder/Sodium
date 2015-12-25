<?php

namespace Sodium\Component\Export\Adapter\Flat;

use Sodium\Contract\Component\Export\Adapter\ExportAdapterInterface;

class Json implements ExportAdapterInterface
{
    public function export(array $colors)
    {
        return json_encode($colors);
    }
}
