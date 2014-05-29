.. doom documentation master file, created by
   sphinx-quickstart on Mon Apr 07 01:33:18 2014.
   You can adapt this file completely to your liking, but it should at least
   contain the root `toctree` directive.

********
Overview
********

Introduction
=============

A smart color library that can create, convert, mix, generate, produce, export, fetch colors, just in a two lines of code.


.. code:: php
    
    <?php
    
    $shadow = new Shadow('#ff0');
    echo $shadow -> getName(); // outputs yellow


Shadow supports following color resources ( includes color models, color spaces, API, and custom resources)


*Color Models & Color Spaces*
``hex`` ``rgb`` ``cmy`` ``cmyk`` ``hsl`` ``hsb`` ``hsv`` ``xyz`` ``yxy`` ``lab`` ``lch`` ``luv`` ``hunterlab``

*Web*
``name`` ``image`` ``css`` ``json`` ``website``

*General*
``psd`` ``ico`` ``crayon`` ``pantone``

*API*
``color lovers`` ``adobe kuler``


**Basic Color Conversion**

.. code:: php
    
    <?php

    $input[] = 'violet'; // web color name

    $input[] = '#2f8cab'; // hex code

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

    $input[] = new Shadow('hsl(45,304,9)'); // shadow object

    $input[] = new SimpleArray('crayon(greenishred)'); // array object

    $input[] = ''; // empty 

    $input[] = '-lokesh-67-'; // custom model with custom syntax

    $shadow = new Shadow($input);
    echo $shadow->useInput(4)->getHex();


**Color Information**

.. code-block:: php

    <?php

    $shadow = new Shadow('#ffdaec');
    echo $shadow->getRed();
    echo $shadow->getName();
    echo $shadow->exportToAll();
    echo $shadow->exportToGif();
    echo $shadow->exportImage('image name',100x200,MODEL::RGB);
    echo $shadow->exportToAco();
    echo $shadow->exportToAse();


**Color Manipulation**

.. code-block:: php
    
    <?php

    $shadow = new Shadow('violet');
    echo $shadow->lighter(50%)->getRgb();
    echo $shadow->addRed(0.5)->getHsl();
    echo $shadow->getComplement()->getName();
    echo $shadow->mix('#f6deaa')->mix('green')->getHex();

**Generate Color Pallates**

.. code-block:: php
    
    <?php

    $shadow = new Shadow('rgb(34,108,224)');
    $colors = $shadow->applyFormula('Midtone')->degree(0.5)->generate(20,MODEL::HEX);
    print_r($colors);

**Discover Colors**

.. code-block:: php
    
    <?php
    
    $shadow = new Shadow(array('green','pink'));
    echo $shadow->pluginSandal('30%')->getHex();

Features
========

* Supports multiple resources (color spaces/models,web, files)
* Loosely coulpled
* OOP Based Chaining methods
* Get colors from Image/Psd/css/website
* export colors to image/gif animations/Photoshop swatches
* convert bulk colors at one time
* easy to install within any modern frameworks (zf,Laravel,symphony,codeIgniter)
* Completely Customizable
* Easy extensible to create custom plugins/models/tools/image templates/formulas/classes
* small file size