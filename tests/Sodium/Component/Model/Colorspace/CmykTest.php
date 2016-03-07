<?php

use Sodium\Component\Model\Colorspace\Cmyk;

class CmykTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $cmyk = new Cmyk();
        $this->assertTrue($cmyk::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('cmyk(0,0,0,0)'),
            array('cmyk(0,0,0,0)'),
            array('cmyk( 0 , 0 , 0 , 0 )'),
            array('cmyk(123,90,00,56)'),
            array('cmyk(0.1,0.84,0.05,222)'),
            array('cmyk(10%,0%,99.9%,107%)'),
            array('cmyk(255,10%,0.6,0.5)'),
            array('key(0.5)'),
            array('key(10)'),
            array('key(10%)'),
            array('key(1)')

        );
    }

    public function testStandardOutput()
    {
        $cmyk = new Cmyk('cmyk(244,90,90,40)');
        $this->assertEquals('cmyk(244,90,90,40)', $cmyk->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $cmyk = new Cmyk('cmyk(244,90,90,66)');
        $this->assertEquals(array('cyan'=>244, 'magenta'=>90, 'yellow'=>90,'key'=>66), $cmyk->getDefaultOutput());
    }

    public function testPercentageInput()
    {
        $cmyk = new Cmyk('cmyk(100%,50%,10.5%,100%)');
        $this->assertEquals('cmyk(255,128,26,100)', $cmyk->getStandardOutput());
    }

    public function testFloatInput()
    {
        $cmyk = new Cmyk('cmyk(1,0.5,0.15,0.5)');
        $this->assertEquals('cmyk(1,128,38,50)', $cmyk->getStandardOutput());
    }

    public function testMixedInput()
    {
        $cmyk = new Cmyk('cmyk(50%,1,0.9,200)');
        $this->assertEquals('cmyk(128,1,230,100)', $cmyk->getStandardOutput());
    }

    public function testMoreMixedInput()
    {
        $cmyk = new Cmyk('cmyk(50%,-10,800,-0.5)');
        $this->assertEquals('cmyk(128,0,255,0)', $cmyk->getStandardOutput());
    }

    public function testCmykInputOutput()
    {
        $cmyk = new Cmyk();
        $cmyk->fromRgb(array(22, 23, 33));
        $this->assertEquals(array('cyan'=>33, 'magenta'=>30, 'yellow'=>0,'key'=>87), $cmyk->getDefaultOutput());
    }

    public function testcyanInput()
    {
        $cmyk = new Cmyk('key(50%)');
        $this->assertEquals('cmyk(0,0,0,50)', $cmyk->getStandardOutput());
    }

    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Cmyk::regex()));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Cmyk);
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface', new Cmyk);
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $cmyk = new Cmyk('cmyk(56,89)');
        echo $cmyk->getStandardOutput();
    }
}
