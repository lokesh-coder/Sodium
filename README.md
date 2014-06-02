Sodium
======

A PHP color library `version 1.0.1`

Introduction
=====================

A smart color library that can create, convert, mix, generate, produce, export, fetch colors. 

sodium supports following color resources ( includes color models, color spaces, API, and custom resources) 

**color models & color spaces**
`hex` `rgb` `cmy` `cmyk` `hsl` `hsb` `hsv` `xyz` `yxy` `lab` `lch` `luv` `hunterlab`

**web**
`name` `image` `css` `json` `website` 

**general**
`psd` `ico` `crayon` `pantone`

**API**
`color lovers` `adobe kuler` 

###Its simple and easy

```php
$sodium = new sodium('#ff0');
echo $sodium -> getName(); // outputs yellow
```
###Its smart

```php
$input[] = 'violet'; // web color name

$input[] = '#2f8cab'; // hex code
$input[] = '#880'; // 3 chars hex

$input[] = 'rgb(23,89,99)'; // rgb
$input[] = 'rgb(0.2,90,19%)'; // supports actual, float, percentage values
$input[] = 'cmy(78,88,124)'; // cmy
$input[] = 'cmyk(89,0,67%,0.3)'; // cmyk
$input[] = 'hsl(349,8%,0.22)'; //hsl
$input[] = 'hsb(267,90,9)'; // hsb
$input[] = 'hsv(3%,9%,100%)'; // hsv

$input[] = 'lab(34,2,0.6)'; // lab
$input[] = 'hlab(330,7%,40)'; // hunterlab

$input[] = 'xyz(50%,89,0.5)'; // xyz
$input[] = 'yxy(230,89,90)'; //yxy
$input[] = 'luv(99,65,8)'; // luv
$input[] = 'lch(2,58,01)'; // lch

$input[] = 'image(/path/to/imagefile/jpg)'; // jpg, png, gif file

$input[] = 'css(/path/to/cssfile.css)'; // css

$input[] = 'ico(/path/to/icofile.ico)'; // ico

$input[] = 'psd(/path/to/psdfile.psd)'; // psd

$input[] = 'website(http://websitename.com/)'; // website

$input[] = 'crayon(childblue)'; // crayon name

$input[] = 'colorlover(pallateID)'; // colorlovers site

$input[] = 'kuler(ID)'; // Adobe kuler Pallates

$input[] = 'pantone(pantonecode)'; // pantone

$input[] = [{'rgb(20,99,45)','#ff9'}];  // json format

$input[] = array(array('gray')); // supports multi dimentional array

$input[] = new sodium('hsl(45,304,9)'); // sodium object

$input[] = new SimpleArray('crayon(greenishred)'); // array object

$input[] = ''; // empty 

$input[] = '-lokesh-67-'; // custom model with custom syntax
```

###Its flexible

```php
$sodium = new sodium('hsl(180,7%,0.4)');
$sodium->mixRed(0.5) // adds 5% of red
        ->mixHue(-40) //decreces hue
        ->addBlue(77%) // adds blue
        ->getRed(sodium::PERCENTAGE); // returns red in percentage value

```

### Its master

```php
$image['width'] = 260;
$image['height'] = 260;
$image['template'] = 'polaroid';
$image['text'] = /sodium/Model::HEX;

$sodium = new sodium('website(http://lokesh.me)');
$sodium->getImage($image); // fetches colors from website and generates image 
```

###Its exportable

```php
$sodium = new sodium(array('red','brown'));

 // returns array of all color space values of red.
$redvalues = $sodium->exportToAll();

 // creates photoshop swatch file of brown color
$sodium->useInput(2)->exportToAco();

 // converts all color inputs to all color models
$allvalues = $sodium->exportAllToAll();

```

### Its damn comfortable

```php
$sodium = new sodium('red');
$sodium->addColor('hsl('55,200,1')'); // adds color to the list - as a array
$sodium(array('green','css(/path/to/cssfile.css)'));  // adds color - as a function

$sodium->useInput(3)->view(); // outputs color as html view

$sodium->store() // stores current color 
        ->mixHue(7%)
        ->store() // stores mixed colro
        ->getRgb(); // returns rgb color value
$stored-colors = $sodium->getStoredColors(); // returns stored colors
```

sodium is more
=============

sodium is not just color convertor, but it is a powerful tool to generate colors. It has five core components, each individually performs unique actions.

###Model

Models are the main core component in the sodium. To define exactly, sodium is completely depent upon models. There were four types of model. 
`color space` `aggregate` `seed` `api`

**color space** - color models and color spaces
**aggregate** - sources which have more than one color, ie, css, image, psd
**seed** - colors that has definite / predefinite values, ie, hex,pantone
**api** - fetching colors from other web sites using their API

###Formula

Formula is a one of the super feature, to generate color pallates.

```php
$sodium = new sodium('#2f8cab');

// uses smash formula to generate 30 colors
$colors = $sodium->SmashFormula(30) 
                ->degree(21)
                ->generate();
```

###plugin

Plugins are basic source to manupulate colors

```php
$sodium = new $sodium('yellow');
echo $sodium->pluginBrightness(20%)->getHex(); 
```

###Toolbox

Toolboxes are math components, does calculations and return new colors

```php
$sodium = new sodium('#44e');

//returns 20 gradient colors
echo $sodium->toolGradient(20);
```

Quick functions
=============

sodium has lot of functions for all your needs. here's a few,

```php
$sodium = new sodium('#eef09a');
/** check methods **/
var_dump($sodium->isDark()); // checks the given color is dark

/** color family methods **/
print_r($sodium->getTint()); //returns array of tint colors

/** reference methods **/
$sodium->reference(\sodium\Reference::WebColors); //returns websafe colors

/*** view methods **/
$sodium->render(sodium::HTML); // outputs html color to browser

```

Configuration
===========

sodium is completely configurable. here's a sample config file.

```php

$config = array();

/** basic **/

$config['Version'] = '1.2.0';
$config['Name'] = 'Default';
$config['Environment'] = 'Production';
$config['Profiler'] = 'Off';

/** load models **/

$config['Load_Models']['Seed\Hex'] = 'Seed\Hex';
$config['Load_Models']['Seed\Name'] = 'Seed\Name';
$config['Load_Models']['Seed\Crayon'] = 'Seed\Crayon';
$config['Load_Models']['Seed\Pantone'] = 'Seed\Pantone';
$config['Load_Models']['Seed\Basic'] = 'Seed\Basic';

$config['Load_Models']['Colorspace\Rgb'] = 'Colorspace\Rgb';
$config['Load_Models']['Colorspace\Hsl'] = 'Colorspace\Hsl';
$config['Load_Models']['Colorspace\Hsv'] = 'Colorspace\Hsv';
$config['Load_Models']['Colorspace\Cmy'] = 'Colorspace\Cmy';
$config['Load_Models']['Colorspace\Cmyk'] = 'Colorspace\Cmyk';
$config['Load_Models']['Colorspace\Xyz'] = 'Colorspace\Xyz';
$config['Load_Models']['Colorspace\Yxy'] = 'Colorspace\Yxy';
$config['Load_Models']['Colorspace\Lab'] = 'Colorspace\Lab';
$config['Load_Models']['Colorspace\Luv'] = 'Colorspace\Luv';
$config['Load_Models']['Colorspace\Lch'] = 'Colorspace\Lch';
$config['Load_Models']['Colorspace\Hlab'] = 'Colorspace\HunterLab';

$config['Load_Models']['Aggregate\Image'] = 'Aggregate\Image';
$config['Load_Models']['Aggregate\Css'] = 'Aggregate\Css';
$config['Load_Models']['Aggregate\Psd'] = 'Aggregate\Psd';
$config['Load_Models']['Aggregate\Ico'] = 'Aggregate\Ico';

$config['Load_Models']['Api\Webpage'] = 'Api\Webpage';
$config['Load_Models']['Api\ColorLovers'] = 'Api\ColorLovers';
$config['Load_Models']['Api\Kuler'] = 'Api\Kuler';

/** inputs **/

$config['Input_Formats'][] = 'SimpleArrayObject';
$config['Input_Formats'][] = 'Json';
$config['Input_Formats'][] = 'sodiumObject';


/** custom config for custom model **/

$config['Seed\Basic']['Db_Path'] = 'Model/Seed/Basic/Db/';

/**color storage **/

$config['Color_Storage']['Auto'] = 'Off';
$config['Color_Storage']['Standard'] = 'Off';
$config['Color_Storage']['Default_Model'] = 'Model\Colorspace\Rgb';

/** prefix **/

$config['Prefix']['Plugin'] = 'Plugin';
$config['Prefix']['Formula'] = 'apply';
$config['Prefix']['Image'] = 'Image';
$config['Prefix']['Toolbox'] = 'Tool';

/**path config **/

$config['Path']['Root'] = '';
$config['Path']['Plugin'] = 'Plugin/';
$config['Path']['Formula'] = 'Formula/';
$config['Path']['Toolbox'] = 'Toolbox/';
$config['Path']['Image'] = 'Image/';
$config['Path']['Images'] = 'Snapshots/';
$config['Path']['Fonts'] = 'File/Font/';
$config['Path']['Aco'] = 'File/Aco/';
$config['Path']['Ase'] = 'File/Ase/';
$config['Path']['Gif'] = 'File/Gif/';

/** image **/

$config['Image']['Default_Adapter'] = 'GD';
$config['Image']['Default_Font'] = 'Bradhit.ttf';
$config['Image']['Grid_Path'] = 'File/Image/Grid/';
$config['Image']['Single_Path'] = 'File/Image/Single/';
$config['Image']['Pallate_Path'] = 'File/Image/Pallate/';
$config['Image']['Screensnap_Path'] = 'File/Image/Screensnap/';
$config['Image']['Default_Path'] = 'File/Image/Default/';
$config['Image']['Grid_Size'] = '400x400';
$config['Image']['Pallate_Size'] = '100x500';
$config['Image']['Single_Size'] = '150x170';

/** color pallates (formula component) **/

$config['Formula']['Default_Degree'] = 10;
$config['Formula']['Default_Limit'] = 6;

/** predefined colors, if no input is provided **/

$config['Predefined_Colors'][] = '#456789';

```

you can use different config for diffrent  `sodium` object.

```php
$sodium = new sodium($input,'custom_config_name');
```

Extend everything
==============
sodium is completely loosely coupled library, which comes easy interface to extend every component.

You can create custom input type, custom model, custom mixer, custom image template, custom reference, custom plugin, custom formula, custom toolbox, custom export and totally everything.


Installation
===========

You can easily get sodium using composer.

in your composer.json file, add this code and run.

```php
    "require":{
        "lokesh/sodium": "dev-master"
    }
```

----------
