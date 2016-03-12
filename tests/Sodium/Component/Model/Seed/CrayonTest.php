<?php

use Sodium\Component\Model\Seed\Crayon;

class CrayonTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $crayon = new Crayon();
        $this->assertTrue($crayon::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('crayon(AntiqueBrass)'),
            array('crayon( antiquebrass )'),
            array('crayon(antiquebrass)')

        );
    }

    public function testStandardOutput()
    {
        $crayon = new Crayon('crayon(BrickRed)');
        $this->assertEquals('Brickred', $crayon->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $crayon = new Crayon('crayon(MacaroniAndCheese)');
        $this->assertEquals('macaroniandcheese', $crayon->getDefaultOutput());
    }


    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Crayon::regex()));
    }

    public function testFromRgb()
    {
        $crayon= new Crayon();
        $this->assertEquals('HotMagenta', $crayon->fromRgb(array(255,29,206)));
    }

    public function testToRgbWithUnKnown()
    {
        $crayon= new Crayon('crayon(unknownname)');
        $this->assertEquals(array(0,0,0), $crayon->toRGB());
    }
    public function testToRgbWithKnown()
    {
        $crayon= new Crayon('crayon(ShockingPink)');
        $this->assertEquals(array(251,126,253), $crayon->toRGB());
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Seed\SeedInterface', new Crayon());
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Crayon());
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $crayon = new Crayon('crayon (DesertSand)');
    }
}
