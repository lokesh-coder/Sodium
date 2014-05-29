<?php

namespace Sodium\Library\ExportASE;

use Sodium\Library\LibraryInterface;

class ExportASE implements LibraryInterface
{

    public function export(array $pallates)
    {
        if (!extension_loaded('mbstring'))
            throw new \Sodium\Exception('Requires mbstring extension');
        require_once 'ASE-Export.php';
        return mkASE($pallates);
    }

    public function save($pallate, $file)
    {
        $fp = fopen($file, 'w');
        fwrite($fp, $this->export($pallate));
        fclose($fp);
    }

}