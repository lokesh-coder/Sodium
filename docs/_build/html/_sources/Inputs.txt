******
Inputs
******

Input is input filtering engine for Shadow. It actually process the input and try to find configured input format. If input passes the filter, it will be sent to appropriate input type class. 

Shadow accepts multiple formats of inputs.

* String
* Array
* Multi-Dimentional Array
* Json
* Object
* Null

String inputs
=============

Just string values, nothing more! These format includes, color codes, css/psd/image file paths/crayon names/web safe color names.

.. warning:: By default, String Input class is set as mandatory.


.. toctree::
   :maxdepth: 2