<?php

include_once 'vendor/autoload.php';

use Sodium\Sodium;

$so = new Sodium('red');
$v = $so->ImageBox();

echo '<pre>';print_r($v);echo '</pre>';

?>