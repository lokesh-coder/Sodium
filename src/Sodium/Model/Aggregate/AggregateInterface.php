<?php

namespace Sodium\Model\Aggregate;

interface AggregateInterface extends \Sodium\Model\ModelInterface
{
    public function getCollection();
}
