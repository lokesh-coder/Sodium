<?php

use Sodium\Component\Model\Colorspace\Hsl;

class HslTest extends \PHPUnit_Framework_TestCase
{

    public static function preLoaderArrayDataProvider()
    {
        return array(
            array('hsl(10,10,49)',array(137,117,112)),
            array('hsl(221,44,21)',array(30,45,77)),
            array('hsl(100%,100%,100%)',array(255,255,255))
        );
    }

    /**
     * @dataProvider  preLoaderArrayDataProvider
     */

    public function testConvertion($input,$output)
    {
        $hsl = new hsl($input);
        $this->assertEquals($hsl->toRgb(),$output);
    }

}
