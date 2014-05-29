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
 * Process Sodium Object and fetches values from it. Adds each formatted color to
 * Sodium_Input class
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */

Class SodiumObject Extends InputAbstract
{


    /**
     * Checks whether the input is valid Sodium Object
     *
     * @param string|array|object $input input value
     * @return boolean
     */

    public static function isValid($input)
    {
        if (!is_object($input))
            return FALSE;
        $class = get_class($input);
        $ref = new \ReflectionClass($class);
        return $ref->implementsInterface('\Sodium\SodiumInterface');
    }

    /**
     * Fetches values from Object through {@link getInputColors()}
     *
     * @see Sodium_Abstract
     * @param string|array|object $input input value
     */


    public function process($input)
    {
        $inputs = $input->getInputColors();
        $this->validate($inputs);
    }

}
