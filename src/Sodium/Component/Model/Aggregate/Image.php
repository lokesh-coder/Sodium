<?php

namespace Sodium\Component\Model\Aggregate;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Aggregate\AggregateInterface;
use Imagine\Gd\Imagine as Gd;
use Imagine\Image\Box;
use Imagine\Image\Point;

class Image extends ModelConcrete implements AggregateInterface
{
    public static $canExportable = false;
    protected $image;
    protected $imageProperties = array();
    protected $colors = array();
    private $thumbnailWidth = 20;
    private $thumbnailHeight = 20;

    public function __construct($image = '')
    {
        if ($image != '') {
            $this->image = $this->format($image);
        }
    }

    protected function format($string)
    {
        $type = self::isAcceptedFormat($string, true);
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
        if (!file_exists($value)) {
            throw new Exception('Image file '.$value.' not exists');
        }

        return $value;
    }

    public static function regex()
    {
        $regex['full'] = '/^img\(.*\)$/i';

        return $regex;
    }

    public function setThumbnail($width, $height)
    {
        $this->thumbnailWidth = (int) $width;
        $this->thumbnailHeight = (int) $height;

        return $this;
    }

    public function getCol($limit = '')
    {
        return $this->img($this->image, $limit);
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        $path = $this->getImg();

        return 'img('.$path.')';
    }

    public function getCollection($model = 'Sodium\Component\Model\Seed\Hex')
    {
        return  $this->getColors();
    }

    public function getCollectionCount()
    {
        return count($this->getColors());
    }

    private function getColors()
    {
        $imagine = new Gd();
        $image = $imagine->open($this->image);
        $thumb = $image->thumbnail(new Box($this->thumbnailWidth, $this->thumbnailHeight));

        return $this->histogram($thumb);
    }

    private function histogram($resource)
    {
        $size = $resource->getSize();
        $colors = array();

        for ($x = 0, $width = $size->getWidth(); $x < $width; ++$x) {
            for ($y = 0, $height = $size->getHeight(); $y < $height; ++$y) {
                $col = $resource->getColorAt(new Point($x, $y));
                $rgb = 'rgb('.$col->getRed().','.$col->getGreen().','.$col->getBlue().')';
                if (isset($colors[$rgb])) {
                    $colors[$rgb] += 1;
                } else {
                    $colors[$rgb] = 1;
                }
            }
        }
        arsort($colors, SORT_NUMERIC);

        return $colors;
    }
}
