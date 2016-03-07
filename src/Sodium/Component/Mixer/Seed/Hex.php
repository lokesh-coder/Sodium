<?php

namespace Sodium\Component\Mixer\Seed;

use Sodium\Component\Model\Seed\Hex as HexModel;

class Hex extends HexModel
{
    private $_model;

    public function __construct(HexModel $model)
    {
        $this->_model = $model;
    }

    public function getHex()
    {
        return $this->_model->getHex();
    }
}
