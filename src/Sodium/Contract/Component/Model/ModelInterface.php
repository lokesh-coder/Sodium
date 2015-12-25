<?php

namespace Sodium\Contract\Component\Model;

interface ModelInterface
{
    static function isAcceptedFormat($input);
    static function regex();
    public function getStandardOutput();
    public function getDefaultOutput();
}
