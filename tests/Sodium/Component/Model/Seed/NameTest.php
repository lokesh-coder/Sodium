<?php

use Sodium\Component\Model\Seed\Name;

class NameTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $name = new Name();
        $this->assertTrue($name::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('DarkSlateGrey'),
            array('LIGHTGOLDENRODYELLOW'),
            array('mediumaquamarine')

        );
    }

    public function testStandardOutput()
    {
        $name = new Name('MediumSlateBlue');
        $this->assertEquals('Mediumslateblue', $name->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $name = new Name('Plum');
        $this->assertEquals('plum', $name->getDefaultOutput());
    }


    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(Name::regex()));
    }

    public function testFromRgb()
    {
        $name= new Name();
        $this->assertEquals('Red', $name->fromRgb(array(255,0,0)));
    }

    public function testToRgbWithUnKnown()
    {
        $name= new Name('colornamenotexists');
        $this->assertEquals(array(0,0,0), $name->toRGB());
    }
    public function testToRgbWithKnown()
    {
        $name= new Name('Blue');
        $this->assertEquals(array(0,0,255), $name->toRGB());
    }

    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Seed\SeedInterface', new Name());
        $this->assertInstanceOf('Sodium\Contract\Component\Model\ConversionAwareInterface', new Name());
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $name = new Name('*!!!))90980');
    }
}
