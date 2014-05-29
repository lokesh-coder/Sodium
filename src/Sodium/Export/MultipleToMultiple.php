<?php

namespace Sodium\Export;

class MultipleToMultiple extends ExportAbstract
{

    public function export()
    {

        $output_method = ($this->_options['standard']) ? 'getStandardOutput' : 'getDefaultOutput';
        $return_val = array();
        foreach ($this->_sodium_obj->getModelObjects() as $key => $color) {
            foreach ($color as $name => $value) {
                if ($value::$is_exportable)
                    $return_val[$key][$name] = $value->$output_method();
            }
        }

        if (is_null($this->_options['callback']))
            return $this->_check_json($return_val);
        return $this->_check_json(array_map($this->_options['callback'], is_array($return_val) ? $return_val : array($return_val)));
    }

    public function default_options()
    {
        return array(
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