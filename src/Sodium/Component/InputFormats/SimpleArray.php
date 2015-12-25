<?php

namespace Sodium\Component\InputFormats;

use Sodium\Concrete\Processor\Input\InputFormatConcrete;
use Sodium\Contract\Processor\Input\InputFormatInterface;
use Sodium\Engine\Processor\Input\InputFormatter;

class SimpleArray extends InputFormatConcrete implements InputFormatInterface
{

    public static function isAcceptedFormat($input){
        return is_array($input);
    }
    public function getFormattedInput($input){
        $c=array();
        foreach($input as $in){
            $c[]=InputFormatter::init($in,$this->getFormats())->format();
        }
        return $c;
    }
}
