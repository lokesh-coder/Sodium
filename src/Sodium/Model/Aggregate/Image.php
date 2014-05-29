<?php

namespace Sodium\Model\Aggregate;

use Imagine\Image\Box;
use Imagine\Image\Point;
use Sodium\Export;
use Sodium\Image as ImageTool;
use Sodium\model;
use Sodium\Sodium;

class Image Extends AbstractAggregate implements AggregateInterface
{

    public static $is_exportable = FALSE;
    protected $_image;
    protected $_image_properties = array();
    protected $_colors = array();
    private $_thumbnail_width = 20;
    private $_thumbnail_height = 20;
    private $_image_prefix_name = 'Image_Model';

    public function __construct($image = '')
    {
        if ($image != '')
            $this->_image = $this->_format($image);
    }

    protected function _setProperties($image)
    {

    }

    protected function _format($string)
    {
        $type = self::isValid($string, TRUE);
        switch ($type) {
            case 'full':
                $string = ltrim($string, 'img');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                $value = $string;
                break;

            default:
                $value = '';
        }
        // if (!file_exists($value))
        //     throw new Exception('Image file ' . $value . ' not exists');
        return $value;
    }

    public static function regex()
    {

        $regex['full'] = '/^img\(.*\)$/i';
        return $regex;
    }

    public function getImg()
    {

    }

    public function setThumbnail($width, $height)
    {
        $this->_thumbnail_width = (int)$width;
        $this->_thumbnail_height = (int)$height;
        return $this;
    }

    public function getCol($limit = '')
    {
        return $this->_img($this->_image, $limit);
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        $path = $this->getImg();
        return 'img(' . $path . ')';
    }

    public function getCollection($model = Model::HEX)
    {
        $col = $this->_get_colors();
        return $this->_convert($col)->export(Export::MTS, array('standard' => true, 'model' => $model));
    }

    public function getCollectionCount()
    {
        return count($this->_get_colors());
    }

    private function _get_colors()
    {
        $create = ImageTool::create();
        $image = $create->open($this->_image);
        $thumb = $image->thumbnail(new Box($this->_thumbnail_width, $this->_thumbnail_height));
        return $this->_histogram($thumb);
    }

    private function _histogram($resource)
    {
        $size = $resource->getSize();
        $colors = array();

        for ($x = 0, $width = $size->getWidth(); $x < $width; $x++) {
            for ($y = 0, $height = $size->getHeight(); $y < $height; $y++) {
                $col = $resource->getColorAt(new Point($x, $y));
                $rgb = 'rgb(' . $col->getRed() . ',' . $col->getGreen() . ',' . $col->getBlue() . ')';
                if (isset($colors[$rgb]))
                    $colors[$rgb] += 1;
                else
                    $colors[$rgb] = 1;
            }
        }
        arsort($colors, SORT_NUMERIC);
        return $colors;
    }

    private function _convert(array $values)
    {
        return new Sodium(array_keys($values));
    }
}
