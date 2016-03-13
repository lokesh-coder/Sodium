.. toctree::

Installation
============

Sodium can be installed through composer,

command line
------------

.. code-block:: php
   :linenos:

   composer require lokesh/sodium

composer.json
-------------

.. code-block:: javascript
  :linenos:

  "require":{
   "lokesh/sodium":"dev-master"
  }

.. code-block:: php
  :linenos:

  use \Sodium\Sodium;

  $sodium = new Sodium('#2f8cab');
  echo $sodium->getRed();
  echo $sodium->getName();