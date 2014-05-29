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
 * Process string Inputs. This class stays last in stack, so that to avoid other string
 * string format inputs like json Encode, Base Encoded, Hashed
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */

final class String Extends InputAbstract
{

    /**
     * Checks whether the input is valid String
     *
     * @param string|array|object $input input value
     * @return boolean
     */

    public static function isValid($input)
    {
        if (!is_string($input))
            return FALSE;
        if (is_integer(@json_decode($input)) === TRUE)
            return TRUE;
        if (is_null(@json_decode($input)) === FALSE)
            return FALSE;
        return TRUE;
    }

    /**
     * Process strings
     * @param string|array|object $input input value
     */

    public function process($input)
    {

        $this->getObj()->addInput($input);
    }

}
