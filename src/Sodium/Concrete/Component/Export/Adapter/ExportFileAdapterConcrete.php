<?php

namespace Sodium\Concrete\Component\Export\Adapter;

abstract class ExportFileAdapterConcrete
{
    protected $name;
    protected $path;

    public function __construct($name='test',$path='')
    {
        $this->name = $name;
        $this->path = $path;
    }
    public function file_exists($file)
    {
        return file_exists($file);
    }

    public function createFile($name,$path,$content)
    {
        $fh = fopen($path.$name,'w') or die("can't open file");
        if (-1 == fwrite($fh,$content)) { die("can't write data"); }
        fclose($fh) or die("can't close file");
        return true;
    }

    public function makeInputFlat(array $colors,$model='Sodium\Component\Model\Seed\Hex'){
        $colors=array_values($colors);
        $flatten_colors=[];
        foreach($colors as $col){
            $flatten_colors[]=$col[$model];
        }
        return $flatten_colors;
    }
}
