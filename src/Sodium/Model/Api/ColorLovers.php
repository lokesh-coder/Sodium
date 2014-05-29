<?php

namespace Sodium\Model\Api;

use Sodium\Library\PhpColorLoverApi\ColorLover;

class ColorLovers extends AbstractApi implements ApiInterface
{

    public static $is_exportable = FALSE;
    private $_pallate_id;

    public function __construct($pallate_id = '')
    {
        if ($pallate_id != '')
            $this->_setProperties($this->_format($pallate_id));
    }

    protected function _setProperties($id)
    {
        $this->_pallate_id = $id;
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

    protected function _format($string)
    {
        $type = self::isValid($string, TRUE);
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

    private function _init_request()
    {
        $request = new ColorLover($this->_pallate_id);
        $colors = $request->getPallate();
        $hex = array();
        foreach ($colors['colors'] as $col)
            $hex[] = '#' . strtolower($col);
        return $hex;
    }

    public function getCollection()
    {
        return $this->_init_request();
    }

    public function getCollectionObj()
    {
        $colors = $this->getCollection();
        $sodium = new \Sodium\Sodium($colors);
        return $sodium;
    }

}