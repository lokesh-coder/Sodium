<?php

namespace Sodium\Component\Export\Adapter\File;

use Sodium\Concrete\Component\Export\Adapter\ExportFileAdapterConcrete;
use Sodium\Contract\Component\Export\Adapter\File\ExportAdapterFileInterface;

class Html extends ExportFileAdapterConcrete implements ExportAdapterFileInterface
{
    public function export(array $colors)
    {
        $colors = $this->makeInputFlat($colors);
        $segment = array();
        foreach ($colors as $color) {
            $segment[] = '<span style="display:inline-block;width:100px;height:100px;background: '.$color.';border-radius:200px;margin:10px;" title="'.$color.'"></span>';
        }
        $segment = implode('', $segment);
        $file = $this->createHtmlLayout($segment);
        $this->createFile($this->name.'.html', $this->path, $file);
    }

    protected function createHtmlLayout($segment)
    {
        return $segment;
    }
}
