<?php

namespace Sodium\Model;

interface ConversionAwareInterface extends ModelInterface
{

    public function fromRGB(array $rgb);

    public function toRGB();

}