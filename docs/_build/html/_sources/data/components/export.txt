.. toctree::

Export
======

This component helps to export/download the colors to different formats.

Basic usage
***********

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;
  use \Sodium\Component\Export\ManyToOne;
  use \Sodium\Component\Export\Adapter\Flat\Json;

  $input = array('red','#2f8cab','rgb(129,33,21)');
  $sodium = new Sodium($input);

  $export_type = new Json();
  $export_all = new ManyToOne($export_type);

  $json = $sodium->export($export_all);


Export types
************

There are four types of export. **OneToOne** , **OneToMany** , **ManyToOne** , **ManyToMany**

Export one color
^^^^^^^^^^^^^^^^

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;
  use \Sodium\Component\Export\OneToOne;
  use \Sodium\Component\Export\OneToMany;
  use \Sodium\Component\Export\Adapter\File\Image;

  $input = array('blue','green');
  $sodium = new Sodium($input);

  $image_format = new Image('image_name_001.jpg','/path/to/save');
  // export second color ( green )
  $sodium->useInput(2)->export(new OneToOne($image_format))->save();
  // export to all color spaces, ie hex, rgb, hsl, hsv, cmy, ..
  $sodium->useInput(2)->export(new OneToMany());
  
Export all colors
^^^^^^^^^^^^^^^^^

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;
  use \Sodium\Component\Export\ManyToOne;
  use \Sodium\Component\Export\ManytoMany;
  use \Sodium\Component\Export\Adapter\File\Image;

  $input = array('blue','green');
  $sodium = new Sodium($input);

  $image_format = new Image('image_name_001.jpg','/path/to/save');
  // export all colors to images
  $sodium->export(new ManyToOne($image_format))->save();
  // export all colors all formats
  $sodium->export(new ManyToMany());

Export formats
**************

There are two types of export formats. **File** and **Flat**


File format
^^^^^^^^^^^

These formats are best to export multiple colors to *Image* , *Gif* , *Html* , *Json* files

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;
  use \Sodium\Component\Export\ManyToOne;
  use \Sodium\Component\Export\Adapter\File\Image;
  use \Sodium\Component\Export\Adapter\File\Gif;
  use \Sodium\Component\Export\Adapter\File\Html;
  use \Sodium\Component\Export\Adapter\File\Json;

  $input = array('blue','green');
  $sodium = new Sodium($input);

  $image_format = new Image('image_name_001.jpg','/path/to/save');
  $json_format = new Json('json_file.json');
  $gif_format = new Gif('gif_file.gif');
  $html_format = new Html('html_file.html');

  $sodium->export(new ManyToOne($image_format))->save(); // to save
  $sodium->export(new ManyToOne($image_format))->show(); // to show
  $sodium->export(new ManyToOne($gif_format));
  $sodium->export(new ManyToOne($html_format));
  $sodium->export(new ManyToOne($json_format));

Flat format
^^^^^^^^^^^

These formats are just exporting the colors to strings

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;
  use \Sodium\Component\Export\OneToOne;
  use \Sodium\Component\Export\OneToMany;
  use \Sodium\Component\Export\ManyToOne;
  use \Sodium\Component\Export\ManyToMany;
  use \Sodium\Component\Export\Adapter\Flat\SimpleString;
  use \Sodium\Component\Export\Adapter\Flat\SimpleArray;
  use \Sodium\Component\Export\Adapter\Flat\json;

  $input = array('blue','green');
  $sodium = new Sodium($input);

  $string_format = new SimpleString();
  $array_format = new SimpleArray('json_file.json');
  $json_format = new Json();

  $sodium->export(new ManyToMany($json_format));
  $sodium->export(new ManyToMany($array_format));
  $sodium->export(new ManyToOne($json_format));
  $sodium->export(new OneToOne($string_format));
  $sodium->export(new OneToMany($json_format));