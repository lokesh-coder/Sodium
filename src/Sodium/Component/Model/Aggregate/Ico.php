<?php

namespace Sodium\Component\Model\Aggregate;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Aggregate\AggregateInterface;

class Ico extends ModelConcrete implements AggregateInterface
{
    public static $canExportable = FALSE;
    protected $filename;
    protected $colors = array();
    private $filePrefixName = 'Temp_Ico_File';

    const IMG_FORMAT = 'png';

    public function __construct($ico = '')
    {
        if ($ico != '')
            $this->filename = $this->format($ico);
    }

    protected function format($string)
    {

        $type = self::isAcceptedFormat($string, TRUE);
        switch ($type) {
            case 'ico':
                $string = ltrim($string, 'ico');
                $string = ltrim($string, '(');
                $string = rtrim($string, ')');
                $value = $string;
                break;

            default:
                $value = '';
        }
        if (!file_exists($value))
            throw new Exception('ico file ' . realpath($value) . ' not exists');
        return $value;
    }

    public static function regex()
    {

        $regex['psd'] = '/^ico\(.*\)$/i';
        return $regex;
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        return 'ico()';
    }

    public function getCollection()
    {
        $image = $this->_init_image();
        return $image->getCollection();
    }

    public function getCollectionCount()
    {
        return count($this->getCollection());
    }

    public function getCollectionObj()
    {
        return new Sodium($this->getCollection());
    }

    private function initImage()
    {
        $image = new IcoThumb($this->filename);
        $image->saveImage($this->filePath());
        return new Image('img(' . $this->filePath() . ')');
    }

    private function filePath()
    {
        $path = Config::get('Default_Path', 'Image');
        return $base_dir = Autoloader::baseDir() . '/' . $path . $this->_image_prefix_name . '.' . self::IMGformat;
    }
}
