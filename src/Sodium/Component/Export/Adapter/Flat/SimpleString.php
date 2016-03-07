<?php

namespace Sodium\Component\Export\Adapter\Flat;

use Sodium\Contract\Component\Export\Adapter\ExportAdapterInterface;

class SimpleString implements ExportAdapterInterface
{
    protected $divider;

    public function __construct($divider = ' | ')
    {
        $this->divider = $divider;
    }
    public function export(array $colors)
    {
        $s = array();
        foreach ($colors as $color) {
            if (is_array($color)) {
                $s[] = $this->export($color);
            } else {
                $s[] = $color;
            }
        }

        return implode($s, $this->divider);
    }
}
