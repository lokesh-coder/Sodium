<?php

namespace Sodium\Contract\Component\Model;

interface ModelInterface
{
    public static function isAcceptedFormat($input);
    public static function regex();
    public function getStandardOutput();
    public function getDefaultOutput();
}
