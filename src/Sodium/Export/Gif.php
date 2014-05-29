<?php

namespace Sodium\Export;

use GifCreator\GifCreator;
use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image\Box;
use Sodium\Model;
use Sodium\Sodium;

class Gif extends ExportAbstract
{

    public function export()
    {
        $frames = array();
        $colors = new MultipleToSingle($this->_sodium_obj, array('model' => Model::HEX, 'standard' => TRUE));
        $export = $colors->export();
        foreach ($export as $cols) {
            $box = new Box(array(rand()), new Sodium($cols));
            $image = $box->getImage();
            $frames[] = $image;
        }
        $durations = array(40, 80, 40, 20);
        $gc = new GifCreator();
        $gc->create($frames, $durations, 5);
        $gifBinary = $gc->getGif();

        $path = Config::get('Gif', 'Path');
        $file = Autoloader::baseDir() . DIRECTORY_SEPARATOR . $path . $this->_options['filename'] . '.gif';
        file_put_contents($file, $gifBinary);
        foreach ($frames as $frame) {
            unlink($frame);
        }
    }

    public function default_options()
    {
        return array(
            'filename' => 'GifFile_' . time('d-m-Y')
        );
    }

}