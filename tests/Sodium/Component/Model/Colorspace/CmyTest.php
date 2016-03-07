<?php

use Sodium\Component\Model\Colorspace\Cmy;

class CmyTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $cmy = new Cmy();
        $this->assertTrue($cmy::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('cmy(0,0,0)'),
            array('CMY(0,0,0)'),
            array('cmy( 0 , 0 , 0 )'),
            array('cmy(123,90,00)'),
            array('cmy(0.1,0.84,0.05)'),
            array('cmy(10%,0%,99.9%)'),
            array('cmy(255,10%,0.6)'),
            array('cyan(0)'),
            array('cyan(10)'),
            array('cyan(10%)'),
            array('cyan(1)'),
            array('magenta(0)'),
            array('magenta(10)'),
            array('magenta(10%)'),
            array('magenta(1)'),
            array('yellow(0)'),
            array('yellow(10)'),
            array('yellow(10%)'),
            array('yellow(1)'),

        );
    }

    public function testStandardOutput()
    {
        $cmy = new Cmy('cmy(244,90,90)');
        $this->assertEquals('cmy(244,90,90)', $cmy->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $cmy = new Cmy('cmy(244,90,90)');
        $this->assertEquals(array('cyan'=>244, 'magenta'=>90, 'yellow'=>90), $cmy->getDefaultOutput());
    }

    public function testPercentageInput()
    {
        $cmy = new Cmy('cmy(100%,50%,10.5%)');
        $this->assertEquals('cmy(255,128,27)', $cmy->getStandardOutput());
    }

    public function testFloatInput()
    {
        $cmy = new Cmy('cmy(1,0.5,0.15)');
        $this->assertEquals('cmy(1,128,38)', $cmy->getStandardOutput());
    }

    public function testMixedInput()
    {
        $cmy = new Cmy('cmy(50%,1,0.9)');
        $this->assertEquals('cmy(128,1,230)', $cmy->getStandardOutput());
    }

    public function testMoreMixedInput()
    {
        $cmy = new Cmy('cmy(50%,-10,800)');
        $this->assertEquals('cmy(128,0,255)', $cmy->getStandardOutput());
    }

    public function testCmyInputOutput()
    {
        $cmy = new Cmy();
        $cmy->fromRgb(array(0, 0, 0));
        $this->assertEquals(array('cyan'=>255, 'magenta'=>255, 'yellow'=>255), $cmy->getDefaultOutput());
    }

    public function testcyanInput()
    {
        $cmy = new Cmy('cyan(50%)');
        $this->assertEquals('cmy(128,0,0)', $cmy->getStandardOutput());
    }

    public function testmagentaInput()
    {
        $cmy = new Cmy('magenta(0.5)');
        $this->assertEquals('cmy(0,128,0)', $cmy->getStandardOutput());
    }

    public function testyellowInput()
    {
        $cmy = new Cmy('yellow(56)');
        $this->assertEquals('cmy(0,0,56)', $cmy->getStandardOutput());
    }

    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Cmy::regex()));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Cmy);
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Colorspace\ColorspaceInterface', new Cmy);
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $cmy = new Cmy('cyan(56,89)');
        echo $cmy->getStandardOutput();
    }
}
