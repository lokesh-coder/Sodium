<?php

namespace Sodium\Library\WebThumbnail;

use Sodium\Exception as SodiumException;
use Sodium\Library\LibraryInterface;

require_once 'webthumbnail.php';

class Capture implements LibraryInterface
{

    private $_wepage_url = 'http://google.com';
    private $_thumbnail_width = 20;
    private $_thumbnail_height = 20;

    public function __construct($url)
    {
        $this->_wepage_url = $url;
    }

    public function getUrl()
    {
        return $this->_wepage_url;
    }

    public function setThumbnailSize($width, $height)
    {
        $this->_thumbnail_width = (int)$width;
        $this->_thumbnail_height = (int)$height;
        return $this;
    }

    public function save($path)
    {
        if (!extension_loaded('curl'))
            throw new SodiumException('Requires cURL extension');
        $thumb = new \Webthumbnail($this->_wepage_url);
        $thumb->setWidth($this->_thumbnail_width)
            ->setHeight($this->_thumbnail_height)
            ->captureToFile($path);
    }

}