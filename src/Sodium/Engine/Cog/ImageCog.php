<?php

namespace Sodium\Engine\Cog;

use Sodium\Concrete\Cog\CogConcrete;
use Sodium\Concrete\Component\Imaging\ImagingConcrete;
use Sodium\Contract\Cog\CogInterface;
use Imagine\Gd\Imagine as Gd;
use Imagine\Imagick\Imagine as Imagick;

class ImageCog extends CogConcrete implements CogInterface
{
    protected $imageDriver='Gd';
    protected $supportedDrivers=array('Gd','Imagick');
    protected $imagine;

    public function __construct($driver='Gd'){
      if(!in_array($driver,$this->supportedDrivers))
        throw new \Exception('Driver not supported');
      $this->imageDriver=$driver;
      if($this->imageDriver=='Imagick')
        $this->imagine=new Imagick();
      else
        $this->imagine=new Gd();
    }

    public function image(ImagingConcrete $imagingConcrete)
    {
        $imagingConcrete->setInputProcessor($this->getInputProcessor());
        $imagingConcrete->setImageDriver($this->imageDriver);
        return $imagingConcrete->process($this->imagine);
    }
}
