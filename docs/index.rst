.. title:: Sodium | PHP Color Library

*******
Sodium
*******

A smart color library for all your color related needs

Sodium can create, convert, generate, extract, manipulate, export colors, with no pain.

:strong:`Its easy`

Not more that 2 lines,

.. code-block:: php

    $Sodium = new Sodium('#2f8cab');
    echo $Sodium->getHsl();

:strong:`Its Simple`

Get it what you want, with no pain.

.. code-block:: php

    $Sodium = new Sodium('#ddd');
    echo $Sodium->getRed(Model::STANDARD);

:strong:`Its smart, actually`

Provide anything, or nothing.

.. code-block:: php

    $Sodium = new Sodium(array('Violet',hsl(20,66,210),image('/path/to/image'),''));
    $Sodium->useInput(3)->exportToAco();

You can provide, ``hex`` ``rgb`` ``name`` ``hsl`` ``hsv`` ``hsb`` ``lab`` ``hlab`` ``cmy`` ``cmyk`` ``luv`` ``xyz`` ``xyx`` ``lch`` ``pantone`` ``image`` ``ico`` ``website`` ``css`` ``crayon name`` ``psd`` ``colorlovers pallate`` ``kulers id`` ``custom resource`` ``empty``

:strong:`Its a color engine`

Generate color pallate,

.. code-block:: php

    $Sodium = new Sodium('Violet');
    $colors = $Sodium->applyFormula('Greenish')->setDegree(2)->generate(20);
    print_r($colors);

:strong:`Its Cool in export`

Export to anything,

.. code-block:: php

    $colors = array();
    $colors[] = 'rgb(30,99,111)';
    $colors[] = 'rgb(17%,0.4,55)';

    $Sodium = new Sodium($colors);
    $Sodium->exportAlltoAll();

:strong:`Its more`

Do anything with the color.

.. code-block:: php

    $Sodium = new Sodium();
    echo $Sodium->addRed(0.6)->store()->pluginGray(3%)->mix('#333aca')->getCmy();
    print_r($Sodium->getStoredColors());

:strong:`Its Extensible`

Plug your custom input type, custom color resource, custom export, custom plugin, custom toolbox, custom color generation formula, and customize everything. It has configuration file too.

.. code-block:: php

    $Sodium = new Sodium('**/custom-input-type/**','custom config name');
    $Sodium->getFavorite();


Features
--------

* Supports multiple resources (color spaces/models,web, files)
* Loosely coulpled
* OOP Based Chaining methods
* Get colors from Image/Psd/css/website
* export colors to image/gif animations/Photoshop swatches
* convert bulk colors at one time
* easy to install within any modern frameworks (zf,Laravel,symphony,codeIgniter)
* Completely Customizable
* Easy extensible to create custom plugins/models/tools/image templates/formulas/classes
* small in file size.

Install
-------

:strong:`Requirements`

| PHP 5.3 
| GD/Image magick extention

:strong:`Composer`

Sodium is build following ``PSR-0`` standard. You can install using composer.

Add this code in your ``composer.json``

.. code-block:: json

    "require": {
            "lokesh/sodium": "1.0.1"
        }

:strong:`Dependencies`

| "imagine/imagine"              For Image manipulation 
| "sabre/xml"                    For import/export in XML
| "skyzyx/adobe-swatch-exchange" For export in PSD ACO
| "sybio/gif-creator"            For export in GIF


User guide
----------

.. toctree::
   :maxdepth: 2

   getting_started

