<?php

include_once 'vendor/autoload.php';

use Sodium\Sodium;

$so = new Sodium('#E32636');

\Sodium\Utile::dump($so->export(\Sodium\Export::STM));

