<?php

namespace Sodium\Component\Model\Api;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Api\ApiInterface;
use Sodium\Resource\Library\KulerApi\KulerApi;

class Kuler extends ModelConcrete implements ApiInterface
{
    public static $canExportable = false;
    private $apiKey;
    private $paletteId;

    public function __construct($palette_id = '')
    {
        if ($palette_id != '') {
            $this->setProperties($this->format($palette_id));
        }
    }

    protected function setProperties($values)
    {
        $this->apiKey = $values[1];
        $this->paletteId = $values[0];
    }

    public static function regex()
    {
        $regex['kuler'] = '/^kuler\([0-9a-z,]+\)$/i';

        return $regex;
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        return 'kuler(NULL)';
    }

    protected function format($string)
    {
        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
      case 'kuler':
        $string = ltrim($string, 'kuler');
        $string = ltrim($string, '(');
        $string = rtrim($string, ')');
        break;

      default:
        throw new Exception('invalid Syntax');
    }

        return explode(',', $string);
    }

    private function initRequest()
    {
        $request = new KulerApi($this->apiKey);
        $colors = $request->getpalette($this->paletteId);

        return $colors;
    }

    public function getCollection()
    {
        return $this->initRequest();
    }
}
