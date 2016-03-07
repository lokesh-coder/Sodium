<?php

namespace Sodium\Component\Model\Api;

use Sodium\Concrete\Component\Model\ModelConcrete;
use Sodium\Contract\Component\Model\Api\ApiInterface;
use Sodium\Resource\Library\PhpColorLoverApi\ColorLover;

class ColorLovers extends ModelConcrete implements ApiInterface
{
    public static $canExportable = false;
    private $paletteId;

    public function __construct($palette_id = '')
    {
        if ($palette_id != '') {
            $this->setProperties($this->format($palette_id));
        }
    }

    protected function setProperties($id)
    {
        $this->paletteId = $id;
    }

    public static function regex()
    {
        $regex['cl'] = '/^cl\([0-9]+\)$/i';

        return $regex;
    }

    public function getDefaultOutput()
    {
        return array();
    }

    public function getStandardOutput()
    {
        return 'cl(NULL)';
    }

    protected function format($string)
    {
        $type = self::isAcceptedFormat($string, true);
        switch ($type) {
      case 'cl':
        $id = ltrim($string, 'cl');
        $id = ltrim($id, '(');
        $id = rtrim($id, ')');
        break;

      default:
        throw new Exception('invalid Syntax');
    }

        return $id;
    }

    private function initRequest()
    {
        $request = new ColorLover($this->paletteId);
        $colors = @$request->getPalette();
        $hex = array();
        foreach ($colors['colors'] as $col) {
            $hex[] = '#'.strtolower($col);
        }

        return $hex;
    }

    public function getCollection()
    {
        return $this->initRequest();
    }
}
