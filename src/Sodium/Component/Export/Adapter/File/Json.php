<?php

namespace Sodium\Component\Export\Adapter\File;

use Sodium\Concrete\Component\Export\Adapter\File\ExportAdapterFileConcrete;
use Sodium\Contract\Component\Export\Adapter\File\ExportAdapterFileInterface;

class Json extends ExportAdapterFileConcrete implements ExportAdapterFileInterface
{
    public function export(array $colors)
    {
        $this->createFile($this->name.'.json', $this->path, json_encode($colors));
    }
}
