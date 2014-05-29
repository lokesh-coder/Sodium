<?php

namespace Sodium\Mixer\Seed;

use Sodium\Model\Seed\Crayon as CrayonModel;

class Crayon extends CrayonModel
{
    private $_model;

    public function __construct(CrayonModel $model)
    {
        $this->_model = $model;
    }

}