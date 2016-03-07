<?php

namespace Sodium\Contract\Component\Model;

interface ConversionAwareInterface
{
    public function toRGB();
    public function fromRGB(array $rgb);
}
