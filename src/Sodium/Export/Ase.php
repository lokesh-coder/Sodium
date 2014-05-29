<?php

namespace Sodium\Export;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Library\ExportASE\ExportASE;

class Ase extends ExportAbstract
{

    public function export()
    {
        $filename = $this->_options['filename'];
        $func = function ($arr) use ($filename) {
            return array($arr, 'rgb-hex', '#' . $arr . ' | ' . $filename);
        };
        $colors = new MultipleToSingle($this->_sodium_obj, array('callback' => $func));
        $palettes = array(
            array(
                "title" => "Sodium Color Library ASE Export",
                "colors" => $colors
            ),
        );
        $path = Config::get('Ase', 'Path');
        $file = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $path . $this->_options['filename'] . '.ase';
        $ase = new ExportASE();
        $ase->save($palettes, $file);
    }

    public function default_options()
    {
        return array(
            'filename' => 'AseFile_' . time('d-m-Y')
        );
    }

}