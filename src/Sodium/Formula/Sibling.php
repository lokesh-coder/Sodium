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
 * returns color with respect to degree
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Sibling Extends FormulaAbstract
{

    public function Sibling($col)
    {
        $degree = $this->getDegree();
        $lightness = $col->getLightness();
        $col->setLightness($lightness + $degree);
        return $this->_save_and_return($col);
    }

}
