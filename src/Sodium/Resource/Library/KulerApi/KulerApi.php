<?php

namespace Sodium\Resource\Library\KulerApi;

class KulerApi
{

    private $_api_key;

    public function __construct($api_key)
    {
        $this->_api_key = $api_key;
    }

    public function getPallate($get = 'recent')
    {
        require_once 'Api.php';

        $kuler = new \Kuler_Api($this->_api_key);
        $themes = $kuler->get($get);
        return $themes[0]->getSwatchesHex(true);
    }

}
