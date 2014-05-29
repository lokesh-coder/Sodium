<?php

namespace Sodium\Model\Api;

use Sodium\Library\KulerApi\KulerApi;

class Kuler extends AbstractApi implements ApiInterface
{

    public static $is_exportable = FALSE;
    private $_api_key;
    private $_pallate_id;

    public function __construct($pallate_id = '')
    {
        if ($pallate_id != '')
            $this->_setProperties($this->_format($pallate_id));
    }

    protected function _setProperties($values)
    {
        $this->_api_key = $values[1];
        $this->_pallate_id = $values[0];
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

    protected function _format($string)
    {
        $type = self::isValid($string, TRUE);
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

    private function _init_request()
    {
        $request = new KulerApi($this->_api_key);
        $colors = $request->getPallate($this->_pallate_id);
        return $colors;
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