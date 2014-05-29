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
 * Process Array Inputs and passes formatted values to Sodium_Input
 *
 * @category  Sodium
 * @package   Sodium_Input
 * @license http://opensource.org/licenses/OSL-3.0 Open Software License (OSL
 * 3.0)
 * @copyright copyright (c) 2013
 */
final class SimpleArray Extends InputAbstract
{

    /**
     * Checks whether the input is valid Array
     *
     * @param string|array|object $input input value
     * @return boolean
     */
    public static function isValid($input)
    {
        return (is_array($input));
    }

    /**
     * Process array and multi-dimentional array
     * @param string|array|object $input input value
     */
    public function process($input)
    {
        if (is_array($input)) {
            foreach ($input as $in)
                $this->process($in);
        } else
            $this->validate($input);
    }

}
