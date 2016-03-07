<?php

namespace Sodium\Concrete\Component\Export\Adapter\File;

abstract class ExportAdapterFileConcrete
{
    protected $name;
    protected $path;

    public function __construct($name = 'test', $path = '')
    {
        $this->name = $name;
        $this->path = $path;
    }
    public function file_exists($file)
    {
        return file_exists($file);
    }

    public function createFile($name, $path, $content)
    {
        $fh = fopen($path.$name, 'w') or die("can't open file");
        if (-1 == fwrite($fh, $content)) {
            die("can't write data");
        }
        fclose($fh) or die("can't close file");

        return true;
    }
}
