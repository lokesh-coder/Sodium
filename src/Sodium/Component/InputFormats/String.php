<?php

namespace Sodium\Component\InputFormats;

use Sodium\Concrete\processor\Input\InputFormatConcrete;
use Sodium\Contract\Processor\Input\InputFormatInterface;

class String extends InputFormatConcrete implements InputFormatInterface
{

    public static function isAcceptedFormat($input)
    {
        if (!is_string($input))
            return FALSE;
        if (is_integer(@json_decode($input)) === TRUE)
            return TRUE;
        if (is_null(@json_decode($input)) === FALSE)
            return FALSE;
        return TRUE;
    }

    public function getFormattedInput($input)
    {
        return $input;
    }
}
