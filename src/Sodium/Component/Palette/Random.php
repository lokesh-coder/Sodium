<?php

namespace Sodium\Component\Palette;

use Sodium\Concrete\Component\Palette\PaletteInterface;
use Sodium\Contract\Component\PaletteConcrete;

class Random extends PaletteConcrete implements PaletteInterface
{
    public function generate()
    {
        return array('#2f8cab','green','blue');
    }
}
