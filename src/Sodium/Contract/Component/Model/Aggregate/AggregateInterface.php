<?php

namespace Sodium\Contract\Component\Model\Aggregate;

use Sodium\Contract\Component\Model\ModelInterface;

interface AggregateInterface extends ModelInterface
{
    public function getCollection();
}
