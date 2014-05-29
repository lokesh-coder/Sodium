<?php
/**
 * ACO File generator
 *
 * Adobe Color File (ACO) Generator Class
 *
 * @package   Adobe Color File (ACO) Generator Class
 * @file      example1.php
 *
 * This example will create a single aco file with 3 colors (Red, Green and Blue) in it!
 */

require_once("aco.class.php");

$aco = new acofile("example1.aco");
$aco->add("Red", 255, 0, 0);
$aco->add("Green", 0, 255, 0);
$aco->add("Blue", 0, 0, 255);
/*
$aco->add(array("Red" => array(255, 0, 0),
                "Green" => array(0, 255, 0),
                "Blue" => array(0, 0, 255)
                ));
*/
$aco->outputAcofile();
?>
