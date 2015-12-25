<?php

namespace Sodium\Engine\Cog;

use Sodium\Concrete\Cog\CogConcrete;
use Sodium\Concrete\Component\Palette\PaletteInterface;
use Sodium\Contract\Cog\CogInterface;

class PaletteCog extends CogConcrete implements CogInterface
{
    public function palette(PaletteInterface $paletteInterface)
    {
        $paletteInterface->setInputProcessor($this->getInputProcessor());
        return $paletteInterface->generate();
    }
}
