<?php

error_reporting(E_ALL);
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
$root = dirname(dirname(__FILE__));
require $root . '/webthumbnail.php';

$path = tempnam('/tmp', 'webthumbnail-');

$thumb = new Webthumbnail("http://webthumbnail.org");
$thumb
    ->setWidth(320)
    ->setHeight(240)
    ->captureToFile($path);

@chmod($path, 0644);
echo "Your thumbnail has been saved to " . $path;
