<?php

namespace Sodium\Component\InputFormats;

use Sodium\Concrete\processor\Input\InputFormatConcrete;
use Sodium\Contract\Processor\Input\InputFormatInterface;

class SimpleString extends InputFormatConcrete implements InputFormatInterface
{
    public static function isAcceptedFormat($input)
    {
        if (!is_string($input)) {
            return false;
        }
        if (is_integer(@json_decode($input)) === true) {
            return true;
        }
        if (is_null(@json_decode($input)) === false) {
            return false;
        }

        return true;
    }

    public function getFormattedInput($input)
    {
        return $input;
    }
}
