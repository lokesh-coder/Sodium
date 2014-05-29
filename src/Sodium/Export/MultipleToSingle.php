<?php

namespace Sodium\Export;

use Sodium\Model;

class MultipleToSingle extends ExportAbstract
{

    public function export()
    {

        $model = $this->_sodium_obj->_filter_model_name($this->_options['model']);
        $output_method = ($this->_options['standard']) ? 'getStandardOutput' : 'getDefaultOutput';
        $return_val = array();
        $models = $this->_sodium_obj->getModelObjects();
        foreach ($models as $key => $color) {
            $return_val[$key] = $models[$key][$model]->$output_method();
        }

        if (is_null($this->_options['callback']))
            return $this->_check_json($return_val);
        return $this->_check_json(array_map($this->_options['callback'], is_array($return_val) ? $return_val : array($return_val)));
    }

    public function default_options()
    {
        return array(
            'model' => Model::HEX,
            'standard' => FALSE,
            'json' => FALSE,
            'callback' => NULL
        );
    }

    private function _check_json($output)
    {
        if ($this->_options['json'])
            return json_encode($output);
        return $output;
    }

}