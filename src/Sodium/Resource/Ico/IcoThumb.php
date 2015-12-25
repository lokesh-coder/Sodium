<?php

namespace Sodium\Resource\Ico;

class IcoThumb
{

    public function __construct($file)
    {
        $this->_filename = $file;
    }

    public function saveImage($path)
    {
        require_once 'class.ico.php';
        $ico = new \Ico($this->_filename);
        $ico->SetBackground('#ffffff');
        $im = $ico->GetIcon(0);
        imagepng($im, $path);
        imagedestroy($im);
    }

}
