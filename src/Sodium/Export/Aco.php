<?php

namespace Sodium\Export;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Library\ExportAco\ExportAco;
use Sodium\Model;

class Aco extends ExportAbstract
{

    public function export()
    {
        $path = Config::get('Aco', 'Path');
        $file = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $path . $this->_options['filename'] . '.aco';
        $fnc = function ($arr) {
            return array($arr['red'], $arr['green'], $arr['blue']);
        };
        $colors = new MultipleToSingle($this->_sodium_obj, array('model' => Model::RGB, 'callback' => $fnc));
        $export = $colors->export();
        $aco = new ExportAco($file);
        $aco->export($export);
    }

    public function default_options()
    {
        return array(
            'filename' => 'AcoFile_' . time('d-m-Y')
        );
    }

}