<?php

/*
 * This file is part of  Sodium.
 *
 * copyright (c) 2013 lokesh
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sodium;

/**
 * receives user input and passes it to each loaded input formats
 * and saves each value in an array and returns.
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Input Extends \ArrayObject
{

    private $_input_strings = array();
    private $_loaded;

    /**
     * Constructor
     *
     * Loads Input formats from Configuration and passes given input to input format objects
     *
     * @param  string|array|object $input OPTIONAL input color
     */
    public function __construct($input = '', $config = 'Default')
    {
        $config = Config::load($config);
        $load = $config['Input_Formats'];
        $load[] = 'SimpleArray';
        // * necessary class, that should not be in options
        $load[] = 'String';
        // * neccesary
        $this->_loaded = array_unique($load);

        foreach ($load as $loader) {
            $loader = 'Sodium\Input\\' . $loader;
            if ($loader::isValid($input)) {
                $class = new $loader($input, $this);
                $class->process($input);
                break;
            }
        }
    }

    /**
     * Returns formatted colors
     *
     * @return array
     */
    public function getColors()
    {
        return $this->_input_strings;
    }

    /**
     * Each loaded format classes adds formatted inputs
     *
     * @param  string $input Formatted input
     */
    public function addInput($input)
    {
        $this->_input_strings[] = $input;
    }

    /**
     * Returns loaded input format objects
     *
     * @return array
     */
    public function getLoaders()
    {
        return $this->_loaded;
    }

}
