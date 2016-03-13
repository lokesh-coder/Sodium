.. toctree::

Reference
=========

Reference components are standalone components. These are basically a data collection. 

Web color names
***************

.. code-block:: php
  :linenos:

  $color_names = \Sodium\Component\WebColorNames::get();


Web safe colors
***************

.. code-block:: php
  :linenos:

  $web_safe_colors = \Sodium\Component\WebSafeColors::get();


Crayola crayons colors
**********************

.. code-block:: php
  :linenos:

  $crayon_colors = \Sodium\Component\CrayolaCrayonsColors::get();

Hex codes
*********

.. code-block:: php
  :linenos:

  $hex_codes = \Sodium\Component\HexCode::get();

Cie values
**********

.. code-block:: php
  :linenos:

  $cie_values = \Sodium\Component\Cie::get();

Pantone colors
**************

.. code-block:: php
  :linenos:

  $pantone_colors = \Sodium\Component\Pantone::get();
  $pantone_c_colors = \Sodium\Component\PantoneC::get();
  $pantone_pc_colors = \Sodium\Component\PantonePC::get();

Trending colors
***************

.. code-block:: php
  :linenos:

  $flat_colors = \Sodium\Component\FlatColors::get();
  $material_colors = \Sodium\Component\MaterialColors::get();