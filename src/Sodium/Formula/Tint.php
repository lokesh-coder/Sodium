<?php

/*
 * This file is part of  Sodium.
 *
 * copyright (c) 2013 Vylson Silwr
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sodium\Formula;

/**
 * returns tint of the input color
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Tint Extends FormulaAbstract
{

    public function Tint($col)
    {

        $col->setRed($col->getRed() + $this->getDegree());
        $col->setGreen($col->getGreen() + $this->getDegree());
        $col->setBlue($col->getBlue() + $this->getDegree());
        return $this->_save_and_return($col);
    }

}
