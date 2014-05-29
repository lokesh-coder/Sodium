<?php

namespace Sodium\Image;

use Sodium\Config;
use Sodium\SodiumInterface;
use Sodium\Storage;

abstract class ImageAbstract Implements ImageInterface
{

    protected $_model;
    protected $_args = array();

    public function __construct(array $args, SodiumInterface $model)
    {
        $this->_model = $model;
        $this->_args = $args;

        $config_file = Storage::getValue('Config');
        Config::load($config_file);
    }

}