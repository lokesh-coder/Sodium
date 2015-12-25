<?php

namespace Sodium\Contract\Component\Model;

interface ConversionAwareInterface
{
    function toRGB();
    function fromRGB(array $rgb);
}
