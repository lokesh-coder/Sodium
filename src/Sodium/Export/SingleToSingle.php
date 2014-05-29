<?php

namespace Sodium\Export;

use Sodium\Model;

class SingleToSingle extends ExportAbstract
{

    public function export()
    {
        $model = $this->_sodium_obj->_filter_model_name($this->_options['model']);
        $output_method = ($this->_options['standard']) ? 'getStandardOutput' : 'getDefaultOutput';
        $output = $this->_sodium_obj->getElement($model)->$output_method();
        if (is_null($this->_options['callback']))
            return $this->_check_json($output);
        return $this->_check_json(array_map($this->_options['callback'], is_array($output) ? $output : array($output)));
    }

    public function default_options()
    {
        return array(
            'model' => Model::HEX,
            'standard' => FALSE,
            'json' => TRUE,
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