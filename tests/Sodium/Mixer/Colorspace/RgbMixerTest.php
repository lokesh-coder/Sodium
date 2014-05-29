<?php

use \Sodium\Mixer\Colorspace\Rgb;
use \Sodium\Model\Colorspace\Rgb as RgbModel;

class RgbMixerTest extends \PHPUnit_Framework_TestCase {

    public $rgb_model;
    public $rgb_mixer;

    public function setUp(){
        $rgb='rgb(20,90,99)';
        $this->rgb_model=new RgbModel($rgb);
        $this->rgb_mixer=new Rgb($this->rgb_model);

    }

    public function testValidRgbOutput(){
        $this->assertEquals('rgb(20,90,99)',$this->rgb_mixer->getRgb('standard'));
        $this->assertEquals($this->rgb_model,$this->rgb_mixer->getRgb('object'));
        $this->assertEquals(array(20,90,99),$this->rgb_mixer->getRgb());
    }
}
 