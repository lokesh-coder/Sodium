<?php

namespace Sodium\Component\Garage;

use Sodium\Concrete\Component\Garage\GarageConcrete;

class Capture extends GarageConcrete
{
    private static $_captured_colors = array();

    public function capture()
    {
        self::$_captured_colors[] = $this->getModel('Seed\Hex')->getHex('standard');
        return $this->engine;
    }

    public function retrieve()
    {
        return self::$_captured_colors;
    }
    public function flush()
    {
        self::$_captured_colors = array();
        return $this->engine;
    }
}
