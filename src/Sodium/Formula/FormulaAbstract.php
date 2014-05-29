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

use Sodium\Exception;
use Sodium\Formula;
use Sodium\Model;
use Sodium\Sodium;
use Sodium\SodiumInterface;

/**
 * feedbacks input color to appropriate formula class
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
abstract class FormulaAbstract Extends Formula Implements FormulaInterface
{

    protected $_degree = 10;
    protected $_initial_color_object;
    protected $_temp_color;
    protected $_stack_colors = array();
    protected $_feedback = TRUE;

    public function __construct(SodiumInterface $color)
    {

        $this->_initial_color_object = $color;
    }

    protected function feedback()
    {
        return $this->_feedback;
    }

    public function setDegree($degree)
    {

        $this->_degree = $degree;
    }

    public function getDegree()
    {

        return $this->_degree;
    }

    public function first()
    {

        return $this->_stack_colors[0];
    }

    public function last()
    {

        $total = count($this->_stack_colors);
        $last = $total - 1;
        return $this->_stack_colors[$last];
    }

    public function seek($key)
    {

        return $this->_stack_colors[$key];
    }

    public function count()
    {

        return count($this->_stack_colors);
    }

    public function getColors($model = Model::HEX)
    {

        $unique = ($model == Model::HEX) ? FALSE : FALSE;
        $col = array();
        foreach ($this->_stack_colors as $color) {

            $col[] = $color->getModel($model)->getDefaultOutput();
        }
        if (!$unique)
            return $col;
        return array_unique($col);
    }

    public function Pallate()
    {

        if (!$this->_feedback) {
            return $this->_self_production();
        }
        $limit = $this->_initial_color_object->getLimit();
        $lim = 0;
        $this->_temp_color = clone $this->_initial_color_object;
        $method = get_called_class();
        $method = str_replace('Sodium\Formula\\', '', $method);

        do {

            $col = new Sodium('#' . $this->_temp_color->getHex());
            $this->_stack_colors[] = $this->$method($col);
            $lim++;
        } while ($limit >= $lim);

        return $this;
    }

    private function _self_production()
    {
        $method = get_called_class();
        $method = str_replace('Sodium\Formula\\', '', $method);
        $col = new Sodium('#' . $this->_initial_color_object->getHex());
        $color_objects = $this->$method($col);
        if (!is_array($color_objects))
            throw new Exception('invalid type. Expecting array');
        $this->_stack_colors = $color_objects;
        return $this;
    }

    protected function _save_and_return(SodiumInterface $sodium)
    {

        return $this->_temp_color = $sodium;
    }

}
