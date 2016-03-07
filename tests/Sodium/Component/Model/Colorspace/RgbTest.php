<?php

use Sodium\Component\Model\Colorspace\Rgb;

class RgbTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $rgb = new Rgb();
        $this->assertTrue($rgb::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('rgb(0,0,0)'),
            array('rgb( 0 , 0 , 0 )'),
            array('rgb(123,90,00)'),
            array('rgb(0.1,0.84,0.05)'),
            array('rgb(10%,0%,99.9%)'),
            array('rgb(255,10%,0.6)'),
            array('red(0)'),
            array('red(10)'),
            array('red(10%)'),
            array('red(1)'),
            array('green(0)'),
            array('green(10)'),
            array('green(10%)'),
            array('green(1)'),
            array('blue(0)'),
            array('blue(10)'),
            array('blue(10%)'),
            array('blue(1)'),

        );
    }

    public function testStandardOutput()
    {
        $rgb = new Rgb('rgb(244,90,90)');
        $this->assertEquals('rgb(244,90,90)', $rgb->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $rgb = new Rgb('rgb(244,90,90)');
        $this->assertEquals(array('red'=>244, 'green'=>90, 'blue'=>90), $rgb->getDefaultOutput());
    }

    public function testPercentageInput()
    {
        $rgb = new Rgb('rgb(100%,50%,10.5%)');
        $this->assertEquals('rgb(255,128,27)', $rgb->getStandardOutput());
    }

    public function testFloatInput()
    {
        $rgb = new Rgb('rgb(1,0.5,0.15)');
        $this->assertEquals('rgb(1,128,38)', $rgb->getStandardOutput());
    }

    public function testMixedInput()
    {
        $rgb = new Rgb('rgb(50%,1,0.9)');
        $this->assertEquals('rgb(128,1,230)', $rgb->getStandardOutput());
    }

    public function testMoreMixedInput()
    {
        $rgb = new Rgb('rgb(50%,-10,800)');
        $this->assertEquals('rgb(128,0,255)', $rgb->getStandardOutput());
    }

    public function testRgbInputOutput()
    {
        $rgb = new Rgb();
        $rgb->fromRgb(array('50%', 1, 0.9));
        $this->assertEquals(array(128, 1, 230), $rgb->toRgb());
    }

    public function testRedInput()
    {
        $rgb = new Rgb('red(50%)');
        $this->assertEquals('rgb(128,0,0)', $rgb->getStandardOutput());
    }

    public function testGreenInput()
    {
        $rgb = new Rgb('green(0.5)');
        $this->assertEquals('rgb(0,128,0)', $rgb->getStandardOutput());
    }

    public function testBlueInput()
    {
        $rgb = new Rgb('blue(56)');
        $this->assertEquals('rgb(0,0,56)', $rgb->getStandardOutput());
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $rgb = new Rgb('red(56,89)');
        echo $rgb->getStandardOutput();
    }
}
