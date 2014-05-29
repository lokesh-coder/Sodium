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
 * sodium exception
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
final class Exception extends \Exception
{

    public function getError()
    {
        $exception = $this->getMessage();
        $file = $this->getFile();
        $line = $this->getLine();

        return '<b>Sodium Exception</b></br>Message: ' . $exception . '<br/> File: ' . $file . '</br> Line: ' . $line;
    }

}