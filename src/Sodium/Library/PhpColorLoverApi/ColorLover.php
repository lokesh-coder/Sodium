<?php

namespace Sodium\Library\PhpColorLoverApi;

class ColorLover implements \Sodium\Library\LibraryInterface
{

    private $_pallate_id;

    public function __construct($pallate_id)
    {
        $this->_pallate_id = $pallate_id;
    }

    public function getPallate()
    {
        require_once "phpColourLover.php";
        $cl = new \phpColourLover();
        $palette = $cl->Palette($this->_pallate_id);
        $results = $palette->get();
        return $results;
    }

}