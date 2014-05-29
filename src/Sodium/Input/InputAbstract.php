<?php

/**
 * Sodium Color Library
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0) that is
 * bundled with this package in the file LICENSE. It is also available through
 * the world wide web at this URL: http://opensource.org/licenses/OSL-3.0
 *
 * @package Sodium
 * @author Lokesh <hello@lokesh.me>
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 * @version 1.0.1
 */

namespace Sodium\Input;

/**
 *
 * Base Class for Input format classes
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */
abstract class InputAbstract
{

    private $_object;
    private $_loaders = array();

    /**
     * Constructor
     *
     * sets input {@link Sodium_Input } object
     *
     * @param  string|array|Object $input input color
     * @param  Sodium\Input $object
     */
    public function __construct($input, \Sodium\Input $object)
    {
        $this->_object = $object;
    }

    /**
     *
     * Returns Sodium\Input
     *
     * @return Sodium\Input
     */
    public function getObj()
    {
        return $this->_object;
    }

    /**
     *
     * Abstract method. Child classes should return formatted color by this method
     *
     */
    abstract function process($input);

    /**
     *
     * Checks for valid class and pass the input to that class
     *
     * @param string|array|object
     */
    public function validate($input)
    {
        foreach ($this->_object->getLoaders() as $loader) {
            $loader = 'Sodium\Input\\' . $loader;
            if ($loader::isValid($input)) {
                $load = new $loader($input, $this->_object);
                $load->process($input);
                break;
            }
        }
    }

}
