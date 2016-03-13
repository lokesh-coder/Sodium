<?php

use Sodium\Component\Model\Seed\Hex;

class HexTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $hex = new Hex();
        $this->assertTrue($hex::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('#2f8cab'),
            array('#fff'),
            array('#AAE'),
            array('#2F8caB')

        );
    }

    public function testStandardOutput()
    {
        $hex = new Hex('#12f7cc');
        $this->assertEquals('#12f7cc', $hex->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $hex = new Hex('#12f7cc');
        $this->assertEquals('12f7cc', $hex->getDefaultOutput());
    }

    public function testFromRgb()
    {
        $hex= new Hex();
        $this->assertEquals('fb7efd', $hex->fromRgb(array(251,126,253)));
    }

    public function testToRgb()
    {
        $hex= new Hex('#fb7efd');
        $this->assertEquals(array(251,126,253), $hex->toRGB());
    }

    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Hex::regex()));
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Seed\SeedInterface', new Hex());
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Hex());
    }

    public function exceptionInputProvider()
    {
        return array(
            array('#abcxyz'),
            array('#!@#$'),
            array('#000***'),
            array('##000')

        );
    }

    /**
     * @dataProvider exceptionInputProvider
     * @expectedException \Exception
     */
    public function testInvalidInput($input)
    {
        $hex = new Hex($input);
    }
}
