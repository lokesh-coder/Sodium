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
 * Process ArrayObject Objects and fetches values from it. Adds each formatted color to
 * Sodium_Input class
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */
Class SimpleArrayObject Extends InputAbstract
{

    /**
     * Checks whether the input is valid ArrayObject
     *
     * @param string|array|object $input input value
     * @return boolean
     */
    public static function isValid($input)
    {
        return ($input instanceof ArrayObject);
    }

    /**
     * Process ArrayObject and fetches values
     *
     * @param string|array|object $input input value
     */
    public function process($input)
    {
        if (self::isValid($input)) {
            foreach ($input as $in)
                $this->process($in);
        } else
            $this->validate($input);
    }

}
