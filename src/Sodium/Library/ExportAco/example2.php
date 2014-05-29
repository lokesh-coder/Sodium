<?php
/**
 * ACO File generator
 *
 * Adobe Color File (ACO) Generator Class
 *
 *
 * @package   Adobe Color File (ACO) Generator Class
 * @file      example2.php
 *
 * This example will create an aco file with 256 colors, starting from black to white!
 */

require_once("aco.class.php");

$aco = new acofile("example2.aco");
for ($i = 0; $i <= 255; $i++) {
    $aco->add(array("rgb($i, $i, $i)" => array($i, $i, $i)));
}
$aco->saveAcofile();
?>
