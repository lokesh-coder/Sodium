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
 * Process Json Encoded strings and fetches values from it. Adds each formatted color to
 * Sodium_Input class
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */

class Json extends InputAbstract
{

    /**
     * Checks whether the input is valid Json Encoded String
     *
     * @param string|array|object $input input value
     * @return boolean
     */

    public static function isValid($input)
    {


        if (!is_string($input))
            return FALSE;
        if (is_int(@json_decode($input)) === TRUE)
            return FALSE;
        return (is_null(@json_decode($input)) === FALSE);
    }

    /**
     * Decodes Json string and fetches values
     *
     * @param string|array|object $input input value
     */

    public function process($input)
    {
        $o_input = json_decode($input, true);
        $this->validate($o_input);
    }

}
