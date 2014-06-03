<?php

include_once 'vendor/autoload.php';

use Sodium\Sodium;

$so = new Sodium('cl(3375417)');

\Sodium\Utile::dump($so->getCollection(\Sodium\Model::RGB));

