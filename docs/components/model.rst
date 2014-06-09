.. title:: Model | Sodium - PHP Color Library

*****
Model
*****

| Models are the core components of Sodium. A model is a color object which converts the input color to its own color.
|
| Each model performs two primary functions, creates own color from RGB and converts own color to RGB. For instance, HSV model receives color in RGB format and it converts to HSV. 

.. code-block:: php

	$sodium = new Sodium('rgb(34,88,10)');
	echo $sodium->getHsv();

	//Above code internally performs this,

    $hsv = new \Sodium\Model\Colorspace\Hsv('rgb(34,88,10)');
    echo $hsv->getStandardOutput();

Model Types
===========

There are four types of models. 

:strong:`Colorspace`

Colorspaces includes ``hex`` ``rgb`` ``name`` ``hsl`` ``hsv`` ``hsb`` ``lab`` ``hlab`` ``cmy`` ``cmyk`` ``luv`` ``xyz`` ``xyx`` ``lch`` 

These models are primarily for creating and converting colors.

:strong:`Seed`

Color sources which has definite value.

It includes ``hex`` ``web color name`` ``Pantone`` ``crayon``

:strong:`Aggregate`

Color sources which can contain multiple colors.

It includes  ``image`` ``ico`` ``css``  ``psd`` 

:strong:`Api`

Color sources which gets colors from other sources.

It includes ``website`` ``colorlovers pallate`` ``kulers id``

Models
======

Hex
---

The input hex triplet can be 6 chars or 3 chars, but it should have '#' prefix. But, the output hex can be customized.

.. code-block:: php

    $input['full_hex'] = '#2f8cab';
    $input['short_hex'] = '#0d6';
    $input['rgb'] = 'rgb(20,88,140)';
    $sodium = new Sodium($input);

     // returns hex without '#'
    echo $sodium->useInput(3)->getHex();

    // returns with '#'
    echo $sodium->useInput(3)->getHex(True); 

    // if the hex code can be shortened, it will return 
    // 3 chars or 6 chars with '#'
    echo $sodium->useInput(3)->getHex(True,True); 


Mixers
======

Mixers are extended class for the model. It actually has the codes to manipulate colors. RGB model mixer looks similar to this,

.. code-block:: php

    namespace Sodium\Mixer\Colorspace;

    use Sodium\Model\Colorspace\Rgb as RgbModel;

    class Rgb Extends RgbModel
    {
        private $_model;

        public function __construct(RgbModel $model)
        {
            $this->_model = $model;
        }
        
        public function mixRed($value)
        {
        	$red = $this->_model->_rgb[0];
        	$green = $this->_model->_rgb[1];
        	$blue = $this->_model->_rgb[2];
        	$rgb = array($red + $value, $green, $blue)
            $value = $this->_model->_filter_input($value);
            return $this->_model->_rgb = $this->_model->_filter_input($rgb);
        }

        //... other methods
    }




