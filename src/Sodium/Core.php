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

use Sodium\Input;

/**
 * contains core methods
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Core extends SodiumAbstract
{

    public function getInfo()
    {

    }

    /**
     * clears all inputs and loaded models
     *
     * @return Sodium
     */
    public function clear()
    {
        $this->_model_objects = array();
        $this->_input_colors = array();
        return $this;
    }

    /**
     * remove particular input and associated model
     *
     * @param int $num position of the input
     * @return Sodium
     */
    public function remove($num)
    {
        if ($num > count($this->_input_colors))
            throw new Exception('color not exists');

        $color = $this->getInputColor($num);
        unset($this->_model_objects[$color]);
        return $this;
    }

    /**
     * returns copy the object
     *
     * @return Sodium
     */
    public function copy()
    {
        return new Sodium($this->_input_colors);
    }

    /**
     * returns loaded models
     *
     * @return array
     */
    public function getLoadedModels()
    {
        return $this->_registered_color_models;
    }

    public function getLoadedInputFormatters()
    {
        $config = Config::load(Storage::getValue('Config'));
        return $config['Input_Formats'];
    }

    public function unloadModel($model)
    {
        $model_name = $this->_filter_model_name($model);
        foreach ($this->_model_objects as $color => $model) {
            unset($this->_model_objects[$color][$model_name]);
        }
        return $this;
    }

    /**
     * sets/replaces model
     *
     * @param Sodium\Model\Interface $model model to set
     * @return Sodium
     */
    public function setModel(Sodium_Model_Interface $model)
    {

        $getModel = $this->_filter_model_name(get_class($model));
        $input = $this->getCurrentInputObject();
        $input[$getModel] = $model;
        $this->_trigger_change($getModel);
        return $this->_object_saver();
    }

    /**
     * returns model
     *
     * @param sting $model_name
     * @return Sodium
     */
    public function getModel($model_name)
    {

        $model_name = $this->_filter_model_name($model_name);
        $input = $this->getCurrentInputObject();
        if (!isset($input[$model_name]))
            throw new Exception('Model ' . $model_name . ' not set!');
        return $input[$model_name];
    }

    /**
     * returns the input that in usage
     *
     * @return string
     */
    protected function _getInput()
    {

        if ($this->_temp_input != '')
            return $this->_temp_input;
        else
            return $this->_input_colors[0];
    }

    /**
     * returns model object that in usage
     *
     * @return Sodium
     */
    public function getCurrentInputObject()
    {

        return $this->_model_objects[$this->_getInput()];
    }

    /**
     * returns the current input
     *
     * @return string
     */
    public function getCurrentInput()
    {
        return $this->_getCurrentInput();
    }

    /**
     * adds new input to input stack
     *
     * @param mixed $input
     * @return Sodium
     */
    public function import($input)
    {
        $config_name = Storage::getValue('Config');
        $format_input = new Input($input, $config_name);
        $this->_resolve_input_color($format_input->getColors());
        return $this->_object_saver();
    }

    /**
     * selects particular input if multiple inputs are provided. by default first
     * is selected on each request
     *
     * @param integer $key starts from 1
     * @return Sodium
     */
    public function useInput($key)
    {
        $key = $key - 1;
        if (!isset($this->_input_colors[$key]))
            throw new Exception('Input color Not Exists.');
        $this->_temp_input = $this->_input_colors[$key];
        return $this->_object_saver();
    }


    /**
     * return Input model
     *
     * @param integer $key starts from 1
     * @return Sodium
     */
    public function inputModel()
    {
        return $this->_input_colors_detail[$this->_getCurrentInput()];
    }


    /**
     * return Inputs model
     *
     * @param integer $key starts from 1
     * @return Sodium
     */
    public function inputModels()
    {
        return $this->_input_colors_detail;
    }

    /**
     * stores used plugins
     *
     * @param Sodium\Plugin\PluginAbstract $pluginObject
     * @return Sodium
     */
    public function registerPlugin(Sodium\Plugin\PluginAbstract $pluginObject)
    {

        if (!isset($this->_plugin_objects[$pluginObject->getPluginName()]))
            $this->_plugin_objects[$pluginObject->getPluginName()] = $pluginObject;
        return $this;
    }

    /**
     * if name is provided returns that specific color, else returns all
     *
     * @param string $point OPTIONAL name
     * @return Sodium
     */
    public function getStoredColors($point = '')
    {
        if ($point != '' && isset($this->_colors_storage[$point]))
            return $this->_colors_storage[$point];

        return $this->_colors_storage;
    }

    /**
     * stores color and returns object
     *
     * @param string $point OPTIONAL name of the value
     * @param string $model OPTIONAL default model output
     * @param bool $standard OPTIONAL standard output switch
     * @return Sodium
     */
    public function store($point = '', $model = NULL, $standard = FALSE)
    {
        if ($point == '') {
            $color_stack = count($this->_colors_storage);
            $point = $color_stack + 1;
        }
        $color_storage = (is_null($model)) ? $this->_color_storage_model : $model;

        $output_method = ($this->_standard_color_storage) ? 'getStandardOutput' : 'getDefaultOutput';
        $output_method = ($standard) ? 'getStandardOutput' : $output_method;

        $input = $this->_getInput();
        $this->_colors_storage[$point] = $this->_model_objects[$input][$color_storage]->$output_method();
        return $this->_object_saver();
    }

    /**
     * returns array of input colors
     *
     * @return array
     */
    public function getInputColors()
    {
        return $this->_input_colors;
    }

    /**
     * returns particular input based on key
     *
     * @param integer $key
     * @return string
     */
    public function getInputColor($key = 0)
    {
        $key = $key - 1;
        return $this->_input_colors[$key];
    }

    /**
     * returns total input colors
     *
     * @return int
     */
    public function countInputColors()
    {
        return count($this->_input_colors);
    }

    /**
     * sets degree to formula object
     *
     * @param sting $input_color
     * @return Sodium
     */
    public function setDegree($degree = '')
    {

        if ($this->_formula_object != '')
            $this->_formula_object->setDegree($degree);
        return $this->_object_saver();
    }

    /**
     * returns degree
     *
     * @return integer
     */
    public function getDegree()
    {
        return $this->_degree;
    }

    /**
     * returns limit
     *
     * @return integer
     */
    public function getLimit()
    {
        return $this->_limit;
    }

    /**
     * sets limit to formula object and returns formula object
     *
     * @param integer $limit
     * @return Sodium\Formula\FormulaInterface
     */
    public function Generate($limit = '')
    {
        if ($limit != '')
            $this->_limit = intval($limit);

        return $this->_formula_object->Pallate();
    }

    /*
     * exports output to variables formats
     * 
     * @param string $identifier format
     * @param array $options options
     * @return mixed
     */

    public function export($identifier = 'SingleToSingle', $options = array())
    {
        $identifier = '\\Sodium\\Export\\' . $identifier;
        $se = new $identifier($this, $options);
        return $se->export();
    }

    /*
   * gets all colors
   *
   * @param string $identifier format
   * @param array $options options
   * @return mixed
   */

    public function getCollection($model_type = Model::HEX)
    {
        $model = $this->getCurrentInputObject();
        return $model[$this->inputModel()]->getCollection($model_type);
    }

}
