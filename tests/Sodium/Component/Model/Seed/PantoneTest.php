<?php

use Sodium\Component\Model\Seed\Pantone;

class PantoneTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $pantone = new Pantone();
        $this->assertTrue($pantone::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('pantone(416)'),
            array('pantone( 4695 )'),
            array('pantone(5575)')

        );
    }

    public function testStandardOutput()
    {
        $pantone = new Pantone('pantone(5777)');
        $this->assertEquals('5777', $pantone->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $pantone = new Pantone('pantone(MacaroniAndCheese)');
        $this->assertEquals('unavailable', $pantone->getDefaultOutput());
    }


    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Pantone::regex()));
    }

    public function testFromRgb()
    {
        $pantone= new Pantone();
        $this->assertEquals('5763', $pantone->fromRgb(array(119,124,79)));
    }


    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Seed\SeedInterface', new Pantone());
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Pantone());
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $pantone = new Pantone('crayon(DesertSand)');
    }
    /**
     * @expectedException \Exception
     */

    public function testUnKnownInput()
    {
        $pantone= new Pantone('pantone(unknownname)');
        $pantone->toRGB();
    }
}
