<?php

namespace Sodium\Library\ExportAco;

class ExportAco implements \Sodium\Library\LibraryInterface
{

    private $_file;

    public function __construct($file)
    {
        $this->_file = $file;
    }

    public function export(array $colors)
    {
        require_once 'aco.class.php';
        $aco = new \acofile($this->_file);
        $aco->add($colors);
        $aco->saveAcofile();
    }

}