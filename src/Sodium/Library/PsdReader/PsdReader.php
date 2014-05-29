<?php

namespace Sodium\Library\PsdReader;

class PsdReader implements \Sodium\Library\LibraryInterface
{

    private $_filename;

    public function __construct($filename)
    {
        $this->_filename = $filename;
    }

    public function saveImage($path)
    {
        require_once 'classPhpPsdReader.php';
        $img = imagecreatefrompsd($this->_filename);
        imagepng($img, $path);
        imagedestroy($img);
    }

}