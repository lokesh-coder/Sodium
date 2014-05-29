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

use Sodium\Sodium;

/**
 * returns complement color
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Complement Extends FormulaAbstract
{

    protected $_feedback = FALSE;
    private $_col;
    private $_primary_color;
    private $_complimentary_color;
    private $_ralative_hue_degree = 20;

    public function Complement($col)
    {
        $this->_col = $col;
        $copy = $this->_col->copy()->setHue($this->_get_complement_hue());
        $shift1 = $this->_col->copy()->setLightness(60);
        $shift2 = $this->_col->copy()->setLightness(30);
        $shift3 = new Sodium($copy->getHex(TRUE));
        $shift3->setLightness(80);
        $shift4 = new Sodium($copy->getHex(TRUE));
        $shift4->setLightness(60);
        return array(
            $shift2,
            $col,
            $shift1,
            $shift3,
            $shift4,
            $copy
        );
    }

    private function _get_complement_hue()
    {
        $hue = $this->_col->getHue();
        return $this->_hue_shift($hue + 180);
    }

    private function _hue_shift($hue)
    {
        if ($hue > 360)
            return 360 - $hue;
        if ($hue < 0)
            return $hue + 360;
        return $hue;
    }

}
