<?php

namespace Sodium\Contract\Processor\Input;

interface InputFormatInterface
{
    public static function isAcceptedFormat($input);
    public function getFormattedInput($input);
}
