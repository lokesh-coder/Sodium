.. title:: Getting Started | Sodium - PHP Color Library

***************
Getting Started
***************

Add required file,

.. code-block:: php

    require '../vendor/autoload.php';

Initiate sodium,

.. code-block:: php

    use Sodium\Sodium;
    $sodium = new Sodium('Green');
    echo $sodium->getHex(); // returns 0f0

Add Colors
=============

Sodium supports multiple colors input, and multiple formats ( `string`, `array`, `json`, `array object`, `Sodium object`). Read more about `Input types </components/input.html>`__

Add in constructor
---------------------------

.. code-block:: php

    $sodium = new Sodium('#2f8cab');

    $colors = array(
    	'Violet',
    	'rgb(30,99,4)',
    	'#ff9',
    	'cmy(45,99,1)',
    	$sodium,
    	array(
    	  new ArrayObject('blue')
    	  json_encode(array('hsv(45,8,100)'))
    	)
    );
    $sodium_advanced = new Sodium($colors);

Add after initiated
-------------------

.. code-block:: php

    $sodium = new Sodium('red');
    $sodium->import('green');
    $sodium('blue'); // sodium object acts as function
    echo $sodium->getHex(); // by default it selects first color (red)
    echo $sodium->useInput(3)->getHex();

| Colors can be added to the sodium, by `import` method and direct object function. You can import in differnt formats as like importing in constructor.
|
| To select the color `useInput` method can be used. 

.. note:: useInput method takes argument from 1. To select second color useInput(2).




    

