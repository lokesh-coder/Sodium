<?php
/*
	Colors from the Palettes:
		* Thought Provoking		http://www.colourlovers.com/palette/694737/Thought_Provoking
		* Vintage Modern		http://www.colourlovers.com/palette/110225/Vintage_Modern
		* cheer up emo kid		http://www.colourlovers.com/palette/1930/cheer_up_emo_kid
		* Terra?				http://www.colourlovers.com/palette/292482/Terra
		* Morgan				http://www.colourlovers.com/palette/1168756/Morgan
		* Colorful ;)			http://www.colourlovers.com/palette/592002/Colorful_)
		* i demand a pancake	http://www.colourlovers.com/palette/443995/i_demand_a_pancake
		* Ocean Five			http://www.colourlovers.com/palette/1473/Ocean_Five

	Licensed under Creative Commons: http://creativecommons.org/licenses/by-nc-sa/3.0/
*/
require "ASE-Export.php";

$palettes = array(
    # RGB Hex example
    array(
        "title" => "Thought Provoking",
        "colors" => array(
            array("ecd078", "rgb-hex", "thought by some"),
            array("d95b43", "rgb-hex", "thoughtful brick"),
            array("c02942", "rgb-hex", "Thoughtless"),
            array("542437", "rgb-hex", "thought you were"),
            array("53777a", "rgb-hex", "Thoughtless"),
        ),
    ),

    # RGB Int example
    array(
        "title" => "Vintage Modern",
        "colors" => array(
            array(array(140, 35, 24), "rgb-int", "Eames"),
            array(array(94, 140, 106), "rgb-int", "Knoll"),
            array(array(136, 166, 94), "rgb-int", "Hans Wegner"),
            array(array(191, 179, 90), "rgb-int", "Cantaloupe Skin"),
            array(array(242, 196, 90), "rgb-int", "Verner Panton"),
        ),
    ),

    # RGB Float example
    array(
        "title" => "cheer up emo kid",
        "colors" => array(
            array(array(0.33333, 0.38431, 0.43922), "rgb-float", "Mighty Slate"),
            array(array(0.30588, 0.80392, 0.76863), "rgb-float", "Pacifica"),
            array(array(0.78039, 0.95686, 0.39216), "rgb-float", "apple chic"),
            array(array(1.0, 0.41961, 0.41961), "rgb-float", "Cheery Pink"),
            array(array(0.76863, 0.30196, 0.3451), "rgb-float", "grandma's pillow"),
        ),
    ),

    # LAB example
    array(
        "title" => "Terra?",
        "colors" => array(
            array(array(89, 2, 10), "lab", "Terra Terra"),
            array(array(74, 4, 30), "lab", "Terra"),
            array(array(38, -26, -7), "lab", "Acqua"),
            array(array(20, -10, -17), "lab", "Acqua Profonda"),
            array(array(7, 3, -22), "lab", "Abisso"),
        ),
    ),

    # Gray Int example
    array(
        "title" => "Morgan",
        "colors" => array(
            array(0, "gray-int", "Black"),
            array(31, "gray-int", "Not Too Black..."),
            array(196, "gray-int", "overcast"),
            array(255, "gray-int", "white"),
        ),
    ),

    # Gray Float example
    array(
        "title" => "Colorful ;)",
        "colors" => array(
            array(1.0, "gray-float", "white"),
            array(0.0, "gray-float", "Black"),
            array(0.6, "gray-float", "Fog"),
        ),
    ),

    # CMYK Int example
    array(
        "title" => "i demand a pancake",
        "colors" => array(
            array(array(59, 60, 56, 34), "cmyk-int", "FEIND"),
            array(array(71, 41, 42, 10), "cmyk-int", "Rock my world"),
            array(array(70, 11, 38, 0), "cmyk-int", "med. green blue"),
            array(array(38, 0, 42, 0), "cmyk-int", "fetch me some"),
            array(array(11, 0, 30, 0), "cmyk-int", "Pancakes"),
        ),
    ),

    # CMYK Float example
    array(
        "title" => "Ocean Five",
        "colors" => array(
            array(array(0.79, 0.17, 0.29, 0.0), "cmyk-float", "Invisible UFO"),
            array(array(0.45, 0.64, 0.7, 0.37), "cmyk-float", "432~caribic brown"),
            array(array(0.14, 0.94, 0.78, 0.03), "cmyk-float", "433~caribic red"),
            array(array(0.03, 0.74, 0.81, 0.0), "cmyk-float", "434~caribic sun"),
            array(array(0.08, 0.18, 0.81, 0.0), "cmyk-float", "435~caribic daylight"),
        ),
    ),

    # All types example
    array(
        "title" => "All types example",
        "colors" => array(
            array("ecd078", "rgb-hex", "thought by some"),
            array(array(140, 35, 24), "rgb-int", "Eames"),
            array(array(0.33333, 0.38431, 0.43922), "rgb-float", "Mighty Slate"),
            array(array(89, 2, 10), "lab", "Terra Terra"),
            array(0, "gray-int", "Black"),
            array(1.0, "gray-float", "white"),
            array(array(59, 60, 56, 34), "cmyk-int", "FEIND"),
            array(array(0.79, 0.17, 0.29, 0.0), "cmyk-float", "Invisible UFO"),
        ),
    ),
);

$ase = mkASE($palettes);