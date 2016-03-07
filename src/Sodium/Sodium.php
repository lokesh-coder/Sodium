<?php

namespace Sodium;

use Sodium\Engine\Engine;
use Sodium\Engine\Cog\ExportCog;
use Sodium\Engine\Cog\GarageCog;
use Sodium\Engine\Cog\ImageCog;
use Sodium\Engine\Cog\PaletteCog;
use Sodium\Engine\Processor\InputProcessor;
use Sodium\Engine\Processor\ModelProcessor;

class Sodium extends Engine
{
    public $registeredModels = array(
        'Rgb' => 'Sodium\Component\Model\Colorspace\Rgb',
        'Cmy' => 'Sodium\Component\Model\Colorspace\Cmy',
        'Cmyk' => 'Sodium\Component\Model\Colorspace\Cmyk',
        'Hsl' => 'Sodium\Component\Model\Colorspace\Hsl',
        'Hsv' => 'Sodium\Component\Model\Colorspace\Hsv',
        'HunterLab' => 'Sodium\Component\Model\Colorspace\HunterLab',
        'Lab' => 'Sodium\Component\Model\Colorspace\Lab',
        'Lch' => 'Sodium\Component\Model\Colorspace\Lch',
        'Luv' => 'Sodium\Component\Model\Colorspace\Luv',
        'Xyz' => 'Sodium\Component\Model\Colorspace\Xyz',
        'Yxy' => 'Sodium\Component\Model\Colorspace\Yxy',
        'Hex' => 'Sodium\Component\Model\Seed\Hex',
        'Name' => 'Sodium\Component\Model\Seed\Name',
        'Crayon' => 'Sodium\Component\Model\Seed\Crayon',
        'Pantone' => 'Sodium\Component\Model\Seed\Pantone',
        'Css' => 'Sodium\Component\Model\Aggregate\Css',
        'Image' => 'Sodium\Component\Model\Aggregate\Image',
        'Ico' => 'Sodium\Component\Model\Aggregate\ico',
        'ColorLovers' => 'Sodium\Component\Model\Api\ColorLovers',
        'Kuler' => 'Sodium\Component\Model\Api\Kuler',
    );
    public $registeredFormats = array(
        'String' => 'Sodium\Component\InputFormats\SimpleString',
        'SimpleString' => 'Sodium\Component\InputFormats\SimpleArray',
        'SimpleArray' => 'Sodium\Component\InputFormats\Json',
    );

    public $registeredGarages = array(
        'Converter' => 'Sodium\Component\Garage\Converter',
        'Check' => 'Sodium\Component\Garage\Check',
        'Painter' => 'Sodium\Component\Garage\Painter',
        'Collection' => 'Sodium\Component\Garage\Collection',
    );
    public function __construct($input)
    {
        $this->setProcessors($input);
        $this->setCogs();

        return new Engine($input);
    }

    private function setCogs()
    {
        $garageCog = new GarageCog($this->registeredGarages);
        $exportCog = new ExportCog();
        $paletteCog = new PaletteCog();
        $imageCog = new ImageCog();

        Engine::attachCog($garageCog, true);
        Engine::attachCog($exportCog);
        Engine::attachCog($paletteCog);
        Engine::attachCog($imageCog);
    }

    private function setProcessors($input)
    {
        $inputProcessor = new InputProcessor($input, $this->registeredFormats);
        $modelProcessor = new ModelProcessor($this->registeredModels);
        Engine::attachProcessor('input', $inputProcessor);
        Engine::attachProcessor('model', $modelProcessor);
    }
}
