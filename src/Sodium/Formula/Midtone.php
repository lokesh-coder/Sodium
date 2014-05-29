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
 * returns nearest  hue with respect to given degree
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Midtone Extends FormulaAbstract
{

    public function Midtone($col)
    {

        $hue = $col->getHue();
        $degree = $this->getDegree();

        $hue = $this->_hue_balancer($hue + $degree);
        $col->setHue($hue);
        return $this->_save_and_return($col);
    }

    private function _hue_balancer($hue)
    {
        if ($hue > 360) {
            $hue = $hue - 360;
            $hue = $this->_hue_balancer($hue);
            return $hue;
        }
        return $hue;
    }

}
