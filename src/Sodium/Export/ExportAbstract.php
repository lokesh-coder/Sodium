<?php

namespace Sodium\Export;

use Sodium\Sodium;

abstract class ExportAbstract extends \Sodium\Export implements ExportInterface
{

    protected $_is_exportable = TRUE;
    protected $_sodium_obj;
    protected $_options = array();

    public function __construct(Sodium $sodium_obj, $options = array())
    {
        $this->_sodium_obj = $sodium_obj;
        $this->_options = array_merge(static::default_options(), $options);
    }

}