<?php
use Sodium\Sodium;

/**
 * Class SodiumTest
 * @package Sodium
 */
class SodiumTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @dataProvider inputProvider
     * @expectedException Sodium\Exception
     */
    public function testThrowExceptionForUndefinedInput($input)
    {
        $sodium = new Sodium($input);
        $sodium->getRgb();
    }

    public function inputProvider()
    {
        return array(
            array('#ffp'),
            array('rgbs()'),
            array('0'),
            array('-'),
            array('123'),
            array('?><')
        );
    }

    public function testHexValueActualOutput()
    {
        $sodium = new Sodium('red');
        $red = $sodium->getHex();
        $this->assertEquals($red, 'ff0000');
    }

    public function testHexStandardOutput()
    {
        $sodium = new Sodium('green');
        $green = $sodium->getHex(TRUE);
        $this->assertEquals($green, '#008000');
    }

    public function testHexStandardShortOutput()
    {
        $sodium = new Sodium('#ff0077');
        $short_hex = $sodium->getHex(TRUE,TRUE);
        $this->assertEquals($short_hex, '#f07');
    }

    public function testHexDefaultShortOutput()
    {
        $sodium = new Sodium('#ff0077');
        $short_hex = $sodium->getHex(FALSE,TRUE);
        $this->assertEquals($short_hex, 'f07');
    }

    public function testHexDefaultSameShortOutput()
    {
        $sodium = new Sodium('#666');
        $short_hex = $sodium->getHex(FALSE,TRUE);
        $this->assertEquals($short_hex, '666');
    }

    public function testInvalidHexDefaultShortOutput()
    {
        $sodium = new Sodium('#2f8cab');
        $short_hex = $sodium->getHex(TRUE,TRUE);
        $this->assertEquals($short_hex, '#2f8cab');
    }

    public function testNameOutput()
    {
        $sodium = new Sodium('#000');
        $black = $sodium->getName();
        $this->assertEquals($black, 'Black');
    }

    public function testInvalidNameOutput()
    {
        $sodium = new Sodium('#ff9');
        $invalid_name = $sodium->getName();
        $this->assertEquals($invalid_name, 'unavailable');
    }


}

 