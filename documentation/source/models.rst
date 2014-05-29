******
Models
******

what is model
=============
Model is the core component of shadow. It contains the basic formula to manipulate the colors.

In brief
========

Model is small independent component ( able to use is without core shadow ), which converts the input color to basic RGB format. So, each model specifically build for working with particular color resource. 

To be simple, basic ``name`` model looks like this,

.. code-block:: php

    <?php

    $name_model = new Shadow\Model\Seed\Name('Red');
    echo $name_model->toRgb();

This ``name`` model thinks that the input is a color name and searches the hes from the list. If it finds the name, it gets the Hex code for that, and converts to RGB( for this ``Hex`` model will be used, as it is responsible for working with HEX color resource). Basically every model handles two primary jobs.

* converts input color to Rgb
* converts Rgb to appropriate color ( in the case of ``name`` model, it coverts rgb to name )
  
.. note:: Some Models could not able to convert Rgb to its own home color, like, ``image`` model could not convert rgb to image. 



Types of Models
===============

Models are grouped in to 4 categories.

**Aggregate**
Input resource has multiple colors.
``Css`` ``Ico`` ``Image`` ``Psd``

**Api**
Input resource gets muliple colors from outside.
``Website`` ``Kuler`` ``ColorLovers`` 

**Colorspace**
Input resource is a color space.
``Rgb`` ``Cmy`` ``Cmyk`` ``Hsl`` ``Hsv`` ``Hsb`` ``Lab`` ``Lch`` ``Luv`` ``Xyz`` ``Yxy`` ``HunterLab``

**Seed**
Input resource is a single color.
``Hex`` ``Crayon`` ``Name`` ``Pantone`` ``Basic``