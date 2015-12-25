<?php
require_once("phpColourLover.php");

echo "<h4>Most recent color.</h4>\n";
// grab most recently added color: 
$cl = new phpColourLover();
$color = $cl->Colors();
$color->limit(1);
$results = $color->get("new");
$bg = $results[0]['hex'];
echo "<div style=\"width:50px;height:50px;background:#" . $bg . ";\">&nbsp;</div>\n";
echo "<hr />\n";


echo "<h4>Top 5 palettes.</h4>\n";
// grab top 5 palettes:
$palettes = $cl->Palettes();
$palettes->limit(5);
$results = $palettes->get("top");
foreach ($results as $palette) {
    echo "<img src=\"" . $palette['image'] . "\" />\n";
    echo "<br />\n";
}
echo "<hr />\n";


echo "<h4>gsmonk's details.</h4>\n";
// grab a lover account:
$lover = $cl->Lover("gsmonk");
$results = $lover->get();
echo $results['lover'] . " has added " . $results['colors'] . " colors, " . $results['palettes'] . " palettes and " . $results['patterns'] . " patterns.\n";
echo "<hr />\n";


echo "<h4>Last pattern added by COLOURLover.</h4>\n";
// grab last pattern submitted by a lover:
$pattern = $cl->Patterns();
$pattern->lover("COLOURLover");
$pattern->limit(1);
$results = $pattern->get("new");
$img = $results[0]['image'];
echo "<img src=\"" . $img . "\" />\n";
?>
