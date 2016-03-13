.. toctree::

Installation
============

Sodium can be installed through composer,

command line
------------

.. code-block:: php
   :linenos:

   $ composer require lokesh/sodium

composer.json
-------------

.. code-block:: javascript
  :linenos:

  "require":{
   "lokesh/sodium":"dev-master"
  }

.. code-block:: php
  :linenos:
  :emphasize-lines: 3,4

  use \Sodium\Sodium;

  $sodium = new \Sodium\Sodium('#2f8cab');
  echo $sodium->getHex();
  echo $sodium->getName();