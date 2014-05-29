<?php

namespace Sodium\Model\Api;

use Sodium\Exception;
use Sodium\Library\WebThumbnail\Capture;
use Sodium\Model\Aggregate\Image;

class Webpage extends AbstractApi implements ApiInterface
{

    public static $is_exportable = FALSE;
    protected $_webpage_url;
    private $_thumbnail_width = 50;
    private $_thumbnail_height = 50;

    const IMG_FORMAT = 'png';

    public function __construct($url = '')
    {
        if ($url != '')
            $this->_setProperties($this->_format($url));
    }

    protected function _setProperties($url)
    {
        $this->_webpage_url = $url;
    }

    public static function regex()
    {
        $regex['web'] = '/^url\(.*\)$/i';
        return $regex;
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        return 'url(NULL)';
    }

    protected function _format($string)
    {
        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'web':
                $string = ltrim($string, 'url');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                break;

            default:
                throw new Exception('invalid Syntax');
        }
        return $string;
    }

    private function _init_image()
    {
        $webpage = new Capture($this->_webpage_url);
        $webpage->setThumbnailSize($this->_thumbnail_width, $this->_thumbnail_height);
        $webpage->save($this->_file_path());
        return new Image('img(' . $this->_file_path() . ')');
    }

    public function getCollection()
    {

        //unlink($this->_file_path());
        return $this->_init_image()->getCollection();
    }

    public function saveImageCollection()
    {
        $collection = $this->getCollection();
        $sodium = new \Sodium\Sodium($collection);
        $sodium->ImageCollage($this->_webpage_url);
    }

    private function _file_path()
    {
        $path = \Sodium\Config::get('Default_Path', 'Image');
        return $base_dir = \Sodium\Autoloader::baseDir() . '/' . $path . 'tempimgfile.' . self::IMG_FORMAT;
    }

}