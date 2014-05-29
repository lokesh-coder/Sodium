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

use Sodium\Model\ConversionAwareInterface;

/**
 * base class contains core methods for format input, initialize models, forward request.
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
abstract class SodiumAbstract Implements SodiumInterface
{

    /**
     * stores first color
     *
     * @var string
     */
    protected $_color;

    /**
     * temperorily stores current input, in case of working with
     * multiple inputs
     *
     * @var string
     */
    protected $_temp_input;

    /**
     * stores formatted input colors
     *
     * @var array
     */
    protected $_input_colors = array();

    /**
     * stores formatted input colors in detail
     *
     * @var array
     */
    protected $_input_colors_detail = array();

    /**
     * stores colors that should be used incase of
     * empty/null input
     *
     * @var array
     */
    protected $_predefined_colors = array();

    /**
     * counts number of empty inputs
     *
     * @var int
     */
    protected static $_recursive_blank_input_check = 0;

    /**
     * stores model objects
     *
     * @var array
     */
    protected $_model_objects = array();

    /**
     * configuration object
     *
     * @var object
     */
    protected $_config_object;

    /**
     * default configurtion file name
     *
     * @var string
     */
    protected $_config_name = 'Default';

    /**
     * stores used plugin objects
     *
     * @var array
     */
    protected $_plugin_objects = array();

    /**
     * automatic color storage switch
     *
     * @var bool
     */
    protected $_auto_color_store = FALSE;

    /**
     * stores colors in standard form
     *
     * @var bool
     */
    protected $_standard_color_storage = FALSE;

    /**
     * stores colors
     *
     * @var array
     */
    protected $_colors_storage = array();

    /**
     * default color storage model
     *
     * @var string
     */
    protected $_color_storage_model = 'Sodium_Model_Hex';

    /**
     * default registered color models
     *
     * @var array
     */
    protected $_registered_color_models = array(
        'rgb' => 'Rgb',
        'hex' => 'Hex',
        'name' => 'Name'
    );

    /**
     * stores formula object
     *
     * @var object
     */
    protected $_formula_object;

    /**
     * defult degree for formula
     *
     * @var integer
     */
    protected $_degree = 10;

    /**
     * default limit for formula
     *
     * @var integer
     */
    protected $_limit = 10;

    /**
     * default color library extension
     *
     * @var string
     */
    protected $_image_ext = 'GD';

    /**
     * stores path from config for storing images
     *
     * @var array
     */
    protected $_image_path = array();

    /**
     * stores image sizes from config
     *
     * @var array
     */
    protected $_image_size = array();

    /**
     * default plugin prefix name
     *
     * @var string
     */
    protected $_plugin_method_prefix = 'Plugin';

    /**
     * default toolbox suffix name
     *
     * @var string
     */
    protected $_toolbox_method_suffix = 'Tool';

    /**
     * dafault formula prefix name
     *
     * @var string
     */
    protected $_formula_method_prefix = 'apply';

    /**
     * default image method prefix name
     *
     * @var string
     */
    protected $_image_method_prefix = 'Image';

    /**
     * contructor
     *
     * loads input colors, and configuration
     *
     * @param mixed $input_color given input
     * @param string $config configuration name
     *
     */
    public function __construct($input_color = '', $config = '')
    {

        if ($config != '')
            $this->_load_config($config);
        elseif (Storage::checkSet('Config'))
            $this->_load_config(Storage::getValue('Config'));
        else
            $this->_load_config($this->_config_name);

        return $this->import($input_color);
    }

    /**
     * checks for blank / empty / multidimensional array of inputs and process
     * string inputs
     *
     * @param string|array $input_color formatted colors
     * @return void
     *
     */
    protected function _resolve_input_color($input_color)
    {


        if ($input_color == '') {

            self::$_recursive_blank_input_check++;

            if (self::$_recursive_blank_input_check == 1)
                $this->_resolve_blank_input();
        } elseif (is_string($input_color)) {
            $this->_resolve_string_input($input_color);
            $this->_input_colors[] = $input_color;
        } elseif (is_array($input_color)) {

            $this->_resolve_array_input($input_color);
        }

        return;
    }

    /**
     * filter string input and pass to {@link _fetch_color_model()}
     * to check for valid input
     *
     * @param sting $input_color
     */
    protected function _resolve_string_input($input_color)
    {

        $input_color = trim($input_color);
        $this->_fetch_color_model($input_color);
    }

    /**
     * validates blank/empty input
     *
     */
    protected function _resolve_blank_input()
    {

        $colors = count($this->_predefined_colors) == 0 ? 'Black' : $this->_predefined_colors;
        $this->_resolve_input_color($colors);
    }

    /**
     * filter array inputs
     *
     * @param array $colors
     */
    protected function _resolve_array_input(array $colors)
    {

        foreach ($colors as $color) {
            $this->_resolve_input_color($color);
        }
    }

    /**
     * passes input string to all loaded models to check it is valid input syntax. If any
     * model returns true it converts the input color to standard RGB.  Finally the RGB
     * values are passed to other models and saved in array
     *
     * @param sting $input_color
     * @throws Exception on invalid syntax
     * @return void
     */
    protected function _fetch_color_model($input_color)
    {

        foreach ($this->_registered_color_models as $key => $color_model) {

            $color_model = $this->_filter_model_name($color_model);

            if ($color_model::isValid($input_color)) {
                if (!isset($this->_model_objects[$input_color][$color_model])) {
                    $this->_model_objects[$input_color][$color_model] = new $color_model($input_color);
                    $this->_input_colors_detail[$input_color] = $color_model;
                }

                $model = $color_model;
                $valid_model = $this->_model_objects[$input_color][$color_model];
                if ($valid_model instanceof ConversionAwareInterface)
                    $rgb = $valid_model->toRGB();
                else
                    $rgb = array(0, 0, 0);
                break;
            }
        }

        if (!isset($rgb))
            throw new Exception('sorry, input string pattern ' . $input_color . ' not found ! ');

        $exclude_model = $this->_registered_color_models;
        $exclude = str_replace('Sodium\Model\\', '', $model);
        //print_r($exclude_model['Seed\hex']);
        unset($exclude_model[$exclude]);
        foreach ($exclude_model as $key => $_model) {

            $_model = $this->_filter_model_name($_model);

            $this->_model_objects[$input_color][$_model] = $current_model = new $_model();

            if ($current_model instanceof ConversionAwareInterface)
                $this->_model_objects[$input_color][$_model]->fromRGB($rgb);
        }
    }

    /**
     * each time when value is set/added/altered/changed the other models are alerted
     * with new value to upadate corresponding values
     *
     * @param string $changed_model
     */
    protected function _trigger_change($changed_model)
    {

        foreach ($this->_registered_color_models as $model) {
            $model = $this->_filter_model_name($model);
            $input = $this->_getInput();
            if ($this->_model_objects[$input][$model]->is_convertable)
                $this->_model_objects[$input][$model]->fromRGB($this->_model_objects[$input][$changed_model]->toRGB());
        }
    }

    /**
     * at each time any value changed in any model, the updation occurs in all models.
     * before updating the current stage is recorded
     *
     * @param SodiumInterface $obj changed model
     * @return SodiumAbstract
     */
    protected function _object_saver(Sodium_Interface $obj = NULL)
    {

        if ($this->_auto_color_store) {
            $output_method = ($this->_standard_color_storage) ? 'getStandardOutput' : 'getDefaultOutput';
            $input = $this->_getInput();
            $this->_colors_storage[] = $this->_model_objects[$input][$this->_color_storage_model]->$output_method();
        }
        if (!is_null($obj))
            return $obj;
        return $this;
    }

    /**
     * overloads plugin, formula, toolbox and image classes
     *
     * @throws Exception on invalid method
     */
    public function __call($method, $args)
    {

        if (stristr($method, 'Plugin')) {
            $method = str_replace('Plugin', '', $method);
            $plugin = 'Sodium\Plugin\\' . $method;
            $instance = new $plugin($args, $this);
            return $this->registerPlugin($instance)->_object_saver($instance->getObj());
        } elseif (stristr($method, 'Tool')) {
            $method = str_replace('Tool', '', $method);
            $method = ucfirst($method);
            $tool = 'Sodium\Toolbox\\' . $method;
            $instance = new $tool($args, $this);
            return $instance->$method();
        } elseif (stristr($method, 'apply')) {
            $method = str_replace('apply', '', $method);
            $method = ucfirst($method);
            $formula = 'Sodium\Formula\\' . $method;
            $this->_formula_object = new $formula($this);
            return $this->_object_saver();
        } elseif (stristr($method, 'Image')) {
            $method = str_replace('Image', '', $method);
            $method = ucfirst($method);
            $image = 'Sodium\Image\\' . $method;
            if (!class_exists($image))
                throw new Exception('Class ' . $image . ' not exists');
            $instance = new $image($args, $this);
            if (!method_exists($instance, $method))
                throw new Exception('Method ' . $method . ' not exists in  class ' . $image);

            $instance->$method();
            return $this->_object_saver();
        } else
            throw new Exception($method . ' method not exists');
    }

    abstract function getInfo();

    /**
     * returns model
     *
     * @param sting $model
     * @return Sodium\Model\AbstractModel
     */
    protected function _getElement($model)
    {
        $model = $this->_filter_model_name($model);
        $input = $this->_getInput();
        $this->_temp_input = '';
        if (isset($this->_model_objects[$input][$model]))
            return $this->_model_objects[$input][$model];
        throw new Exception('Model ' . $model . ' not set');
    }

    public function getElement($model)
    {
        return $this->_getElement($model);
    }

    public function getModelObjects()
    {
        return $this->_model_objects;
    }

    /**
     * returns the current input
     *
     * @return string
     */
    public function _getCurrentInput()
    {

        if ($this->_temp_input != '')
            return $this->_temp_input;
        else
            return $this->_input_colors[0];
    }

    /**
     * sets model
     *
     * @param sting $model
     * @return Sodium\Model\AbstractModel
     */
    protected function _setElement($model)
    {
        $model = $this->_filter_model_name($model);
        Storage::setValue('model', $model);
        $input = $this->_getInput();
        return $this->_model_objects[$input][$model];
    }

    /**
     * alerts all models and passes chanded value and saves object
     *
     * @return Sodium
     */
    protected function _saveObject()
    {

        $model = Storage::getAndDestroy('model');
        $model = $this->_filter_model_name($model);
        $this->_trigger_change($model);
        return $this->_object_saver();
    }

    /**
     * filters model name
     *
     * @param sting $model
     * @return string
     */
    public function _filter_model_name($model)
    {

        $prefix = 'Sodium\Model\\';
        $model = str_replace($prefix, '', $model);
        $model = str_replace('/', '\\', $model);
        $ns = explode('\\', $model);
        $snippet = array();
        foreach ($ns as $space) {
            $snippet[] = ucfirst($space);
        }
        $model = implode('\\', $snippet);
        $model = ucfirst($model);
        return $prefix . $model;
    }

    /**
     * filters and loads configuration
     *
     * @param sting $config_name
     */
    protected function _load_config($config_name)
    {

        $config = Config::load($config_name);
        $this->_registered_color_models = $config['Load_Models'];

        $this->_plugin_method_prefix = $config['Prefix']['Plugin'];
        $this->_image_method_prefix = $config['Prefix']['Image'];
        $this->_formula_method_prefix = $config['Prefix']['Formula'];
        $this->_toolbox_method_suffix = $config['Prefix']['Toolbox'];

        $this->_image_ext = $config['Image']['Default_Adapter'];
        $this->_image_path['grid'] = $config['Image']['Grid_Path'];
        $this->_image_path['single'] = $config['Image']['Single_Path'];
        $this->_image_path['pallate'] = $config['Image']['Pallate_Path'];

        $this->_image_size['grid'] = $config['Image']['Grid_Size'];
        $this->_image_size['pallate'] = $config['Image']['Pallate_Size'];
        $this->_image_size['single'] = $config['Image']['Single_Size'];


        $this->_auto_color_store = ($config['Color_Storage']['Auto'] == 'Off') ? FALSE : TRUE;
        $this->_color_storage_model = $config['Color_Storage']['Default_Model'];
        $this->_standard_color_storage = ($config['Color_Storage']['Standard'] == 'Off') ? FALSE : TRUE;

        $this->_predefined_colors = $config['Predefined_Colors'];

        $this->_degree = $config['Formula']['Default_Degree'];
        $this->_limit = $config['Formula']['Default_Limit'];

        Storage::setValue('Config', $config_name);
    }

}
