<?php

namespace Sodium\Export;

class SingleToMultiple extends ExportAbstract
{

    public function export()
    {

        $output_method = ($this->_options['standard']) ? 'getStandardOutput' : 'getDefaultOutput';
        $return_val = array();
        $models = $this->_sodium_obj->getModelObjects();
        foreach ($models[$this->_sodium_obj->getCurrentInput()] as $name => $value) {
            if ($value::$is_exportable)
                $return_val[$name] = $value->$output_method();
        }
        if ((isset($this->_options['callback'])) && is_callable($this->_options['callback']))
            return $this->_check_json($return_val);
        return $this->_check_json(array_map($this->_options['callback'], $return_val));
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