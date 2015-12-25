<?php

namespace Sodium\Resource\Library\PhpColorLoverApi;

class ColorLover
{

    private $paletteId;

    public function __construct($palette_id)
    {
        $this->paletteId = $palette_id;
    }

    public function getPalette()
    {
        require_once "phpColourLover.php";
        $cl = new \phpColourLover();
        $palette = $cl->Palette($this->paletteId);
        $results = $palette->get();
        return $results;
    }

}
