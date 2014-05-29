<?php

namespace Sodium\Image;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image;
use Sodium\Image\Template;

class Collage Extends ImageAbstract
{

    private $_box_width = 50;
    private $_box_height = 50;
    private $_columns = 4;
    private $_space = 5;
    private $_format = Image::PNG;
    private $_name_prefix = 'Collage';
    private $_name;

    public function Collage()
    {
        if (isset($this->_args[0]))
            $this->_name = $this->_args[0];

        if (isset($this->_args[1]))
            $this->_text_type = $this->_args[2];
        $colors = $this->_model->export('MultipleToSingle');
        // print_r($colors);exit;
        $total_colors = count($colors);
        $rows = ceil($total_colors / $this->_columns);
        $x = $this->_box_width * $this->_columns + ($this->_space * ($this->_columns - 1));
        $y = $this->_box_height * $rows + ($this->_space * $rows);
        $w = $this->_space;
        $h = $this->_space;
        $frame = Template::raw(array('width' => $x, 'height' => $y), 'Skeleton');
        foreach ($colors as $col) {
            $val = array();
            $val['width'] = $this->_box_width;
            $val['height'] = $this->_box_height - ($this->_space);
            $val['color'] = $col;
            $raw = Template::raw($val, 'Fill');
            $frame->paste($raw, new \Imagine\Image\Point($w, $h));
            $w += $this->_box_width + ($this->_space / 2);
            if ($w >= $x) {
                $w = $this->_space;
                $h += $this->_box_height;
            }
            if ($h >= $y)
                break;
        }

        Template::SaveAndShow($this->_getValues(), $frame);
    }

    private function _getValues()
    {

        $values['image_save_path'] = Autoloader::baseDir() . '/' . Config::get('Single_Path', 'Image');
        $values['name'] = $this->_name;
        $values['name_prefix'] = $this->_name_prefix;
        $values['format'] = $this->_format;

        return $values;
    }

}
