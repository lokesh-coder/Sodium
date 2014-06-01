<?php

include_once 'vendor/autoload.php';

use Sodium\Sodium;

$so = new Sodium('hsv(100%,90,90)');

print_r($so->getHue()) ;

