<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Check extends GarageConcrete
{

    public function isLighter(){
        $hex=$this->_get_model('Seed\Hex')->getHex();
        return (hexdec($hex) > 0xffffff/2) ? 'black':'white';
    }
}
