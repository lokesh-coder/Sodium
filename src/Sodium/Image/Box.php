<?php

namespace Sodium\Image;

use Sodium\Autoloader;
use Sodium\Config;
use Sodium\Image;
use Sodium\Image\Template;
use Sodium\Model;

class Box Extends ImageAbstract
{

    private $_box_width = '200';
    private $_box_height = '300';
    private $_text_type = Model::RGB;
    private $_format = Image::PNG;
    private $_name_prefix = 'Box';
    private $_name;

    public function Box()
    {
        $this->_setValues();
        Template::SaveAndShow($this->_getValues(), 'Fill');
    }

    private function _setValues()
    {
        if (isset($this->_args[0]))
            $this->_name = $this->_args[0];

        if (isset($this->_args[1]) && $this->_args[1] != '') {
            $size = explode('x', $this->_args[1]);
            $this->_box_width = $size[0];
            $this->_box_height = $size[1];
        }
        if (isset($this->_args[2]))
            $this->_text_type = $this->_args[2];
    }

    private function _getValues()
    {

        $values['image_save_path'] = Autoloader::baseDir() . DIRECTORY_SEPARATOR . Config::get('Single_Path', 'Image');
        $values['width'] = $this->_box_width;
        $values['height'] = $this->_box_height;
        $values['name'] = $this->_name;
        $values['name_prefix'] = $this->_name_prefix;
        $values['format'] = $this->_format;
        $values['text_type'] = $this->_text_type;
        $values['color'] = $this->_model->getHex();

        return $values;
    }

    public function getImage($template = 'Frame')
    {
        $this->_setValues();
        return Template::SaveAndReturnPath($this->_getValues(), $template);
    }

}
