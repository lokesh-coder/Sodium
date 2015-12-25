<?php

namespace Sodium\Component\InputFormats;

use Sodium\Concrete\Processor\Input\InputFormatConcrete;
use Sodium\Contract\Processor\Input\InputFormatInterface;

class Json extends InputFormatConcrete implements InputFormatInterface
{
    public static function isAcceptedFormat($input){
        if (!is_string($input))
            return FALSE;
        if (is_int(@json_decode($input)) === TRUE)
            return FALSE;
        return (is_null(@json_decode($input)) === FALSE);
    }

    public function getFormattedInput($input){
        $input = json_decode($input, true);
        return InputFormatter::init($input,$this->getFormats())->format();
    }
}
