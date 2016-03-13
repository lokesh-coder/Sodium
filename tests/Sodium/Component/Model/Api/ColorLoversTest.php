<?php

use Sodium\Component\Model\Api\ColorLovers;
use Sodium\Resource\Library\PhpColorLoverApi\ColorLover as ColorLoverObj;

class ColorLoversTest extends \PHPUnit_Framework_TestCase
{

    /**
     * @dataProvider validInputProvider
     */
    public function testValidInputs($input)
    {
        $colorLovers = new ColorLovers();
        $this->assertTrue($colorLovers::isAcceptedFormat($input));
    }

    public function validInputProvider()
    {
        return array(
            array('cl(4134381)'),
            array('cl( 4134379 )')

        );
    }

    public function testStandardOutput()
    {
        $colorLovers = new ColorLovers('cl(4134381)');
        $this->assertEquals('cl(null)', $colorLovers->getStandardOutput());
    }

    public function testDefaultOutput()
    {
        $colorLovers = new ColorLovers('cl(4134381)');
        $this->assertEquals(array(), $colorLovers->getDefaultOutput());
    }
    public function testCollection()
    {

        $clObj = $this->getMockBuilder('ColorLoverObj')
                ->setMethods(array('__construct','getPalette'))
                 ->setConstructorArgs(array(4134381))
                 ->getMock();
        $clObj->expects($this->any())
                 ->method('getPalette')
                 ->will($this->returnValue(array('colors'=>array('5f5468','987d5c','9b76b6','685752','694186'))));

        $colorLovers = new ColorLovers('cl(4134381)');
        $colorLovers->setColorLoverObj($clObj);
        $this->assertEquals(array('#5f5468','#987d5c','#9b76b6','#685752','#694186'), $colorLovers->getCollection());
    }


    public function testShouldHaveAtleastOneRegexFormat()
    {
        $this->assertGreaterThanOrEqual(1, count(ColorLovers::regex()));
    }


    public function testInstanceOf()
    {
        $this->assertInstanceOf('Sodium\Contract\Component\Model\Api\ApiInterface', new ColorLovers());
    }

    /**
     * @expectedException \Exception
     */
    public function testInvalidInput()
    {
        $colorLovers = new ColorLovers('crayon (DesertSand)');
    }
}
