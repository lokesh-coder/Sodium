<?php

/*
 * This file is part of  Sodium.
 *
 * copyright (c) 2013 lokesh
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Sodium;

    /**
     * Class Sodium
     * @package Sodium
     * @author Lokesh <hello@lokesh.me>
     * @version 1.0.1
     *
     * enables to access methods of loaded models and
     * other basic color calculations
     *
     */

class Sodium Extends Core
{

    /**
     * current version
     */
    const VERSION = 'v1.0.1';

    /**
     * returns standard output, eg, #000000, rgb(255,255,255)
     */
    const STANDARD = 'standard';

    /**
     * returns standard output, eg, 000000, array(255,255,255)
     */

    const ACTUAL = 'actual';
    /**
     * output returns in percentage
     */
    const PERCENTAGE = 'percentage';

    /**
     * output returns in float value
     */
    const FLOAT = 'float';
    /**
     *
     */
    const OBJECT = 'object';

    /**
     * returns hex in 3 chars
     */
    const SHORT = 'short';

    /**
     *
     * set red value, it may be in actual value/percentage/float
     *
     * @param $value
     * @return Sodium
     */
    public function setRed($value)
    {

        $this->_setElement('Colorspace\Rgb')->setRed($value);
        return $this->_saveObject();
    }

    /**
     * set green value, it may be in actual value/percentage/float
     *
     * @param $value
     * @return Sodium
     */
    public function setGreen($value)
    {

        $this->_setElement('Colorspace\Rgb')->setGreen($value);
        return $this->_saveObject();
    }

    /**
     * set red blue, it may be in actual value/percentage/float
     *
     * @param $value
     * @return Sodium
     */
    public function setBlue($value)
    {

        $this->_setElement('Colorspace\Rgb')->setBlue($value);
        return $this->_saveObject();
    }
    /**
     * returns red value in rgb
     *
     * @param string $output output format
     * @return mixed
     */
    public function getRed($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Rgb')->getRed($output);
    }

    /**
     *  returns green value in rgb
     *
     * @param string $output output format
     * @return mixed
     */
    public function getGreen($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Rgb')->getGreen($output);
    }

    /**
     *  returns blue value in rgb
     *
     * @param string $output output format
     * @return mixed
     */
    public function getBlue($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Rgb')->getBlue($output);
    }

    /**
     *  returns rgb value
     *
     * @param string $output output format
     * @return mixed
     */
    public function getRGB($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Rgb')->getRGB($output);
    }

    /**
     * adds red value to the color
     *
     * @param string|float $value red value
     * @return Sodium
     */
    public function mixRed($value)
    {
        $this->_setElement('Colorspace\Rgb')->mixRed($value);
        return $this->_saveObject();
    }

    /**
     * mixes red, green and blue value to the color
     *
     * @param array $value rgb in array
     * @return Sodium
     */
    public function mixRGB(array $value)
    {

        $this->_setElement('Colorspace\Rgb')->mixRGB($value);
        return $this->_saveObject();
    }

    /**
     * sets hue to the color.
     *
     * @param int $hue from 0 to +360
     * @return Sodium
     */
    public function setHue(int $hue)
    {

        $this->_setElement('Colorspace\Hsv')->setHue($hue);
        return $this->_saveObject();
    }

    /**
     * sets saturation to the color.
     * value may be actual/float/percentage
     *
     * @param string|integer $saturation
     * @return Sodium
     */
    public function setSaturation($saturation)
    {
        $this->_setElement('Colorspace\Hsv')->setSaturation($saturation);
        return $this->_saveObject();
    }

    /**
     * sets value/brightness to the color.
     * value may be actual/float/percentage
     *
     * @param string|int $value
     * @return Sodium
     */
    public function setValue($value)
    {
        $this->_setElement('Colorspace\Hsv')->setValue($value);
        return $this->_saveObject();
    }

    /**
     * returns value from HSV
     *
     * @return integer
     */
    public function getValue()
    {
        return $this->_getElement('Colorspace\Hsv')->getValue();
    }

    /**
     * returns HSV
     *
     * @return array
     */
    public function getHsv()
    {
        return $this->_getElement('Colorspace\Hsv')->getHsv();
    }

    /**
     * returns HSL
     *
     * @return array
     */
    public function getHsl()
    {
        return $this->_getElement('Colorspace\Hsl')->getHsl();
    }

    /**
     * sets lightness in HSL
     * value may be actual/float/percentage
     *
     * @param string|integer $value
     * @return Sodium
     */
    public function setLightness($value)
    {
        $this->_setElement('Colorspace\Hsl')->setLightness($value);
        return $this->_saveObject();
    }

    /**
     * returns lightness value from HSL
     *
     * @return mixed
     */
    public function getLightness()
    {
        return $this->_getElement('Colorspace\Hsl')->getLightness();
    }

    /**
     * returns Hue value
     *
     * @return mixed
     */
    public function getHue()
    {
        return $this->_getElement('Colorspace\Hsl')->getHue();
    }

    /**
     * returns saturation
     *
     * @return mixed
     */
    public function getSaturation()
    {
        return $this->_getElement('Colorspace\Hsv')->getSaturation();
    }

    /**
     * mixed hue with the color
     * value may be actual/float/percentage
     *
     * @param string|integer $hue
     * @return Sodium
     */
    public function mixHue($hue)
    {
        $this->_setElement('Colorspace\Hsv')->mixHue($hue);
        return $this->_saveObject();
    }

    /**
     * returns we name for the color.
     * If no name is available, returns 'unavailable'
     *
     * @return mixed
     */
    public function getName()
    {
        return $this->_getElement('Seed\Name')->getName();
    }

    /**
     * Mix color by name
     *
     * @param string $value web color name
     * @return Sodium
     */
    public function mixName($value)
    {
        $this->_setElement('Seed\Name')->mixName($value);
        return $this->_saveObject();
    }

    /**
     * returns hex triplet value
     *
     * @param bool $standard
     * @param bool $short
     * @return mixed
     */
    public function getHex($standard = FALSE, $short = FALSE)
    {
        if ($standard === TRUE)
            return $this->_getElement('Seed\Hex')->getStandardOutput($short);
        return $this->_getElement('Seed\Hex')->getHex($short);
    }

    /**
     * resets Cyan value in CMY.
     * value may be actual/float/percentage
     *
     * @param $value
     * @return Sodium
     */
    public function setCyan($value)
    {
        $this->_setElement('Colorspace\Cmy')->setCyan($value);
        return $this->_saveObject();
    }

    /**
     * return cyan value from CMY
     *
     * @param string $output
     * @return mixed
     */
    public function getCyan($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Cmy')->getCyan($output);
    }

    /**
     * resets magenta value in CMY
     * value may be actual/float/percentage
     *
     * @param $value
     * @return Sodium
     */
    public function setMagenta($value)
    {

        $this->_setElement('Colorspace\Cmy')->setMagenta($value);
        return $this->_saveObject();
    }

    /**
     * returns magenta value from CMY
     *
     * @param string $output
     * @return mixed
     */
    public function getMagenta($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Cmy')->getMagenta($output);
    }

    /**
     * resets yellow value in CMY
     * value may be actual/float/percentage
     *
     * @param $value
     * @return Sodium
     */
    public function setYellow($value)
    {
        $this->_setElement('Colorspace\Cmy')->setYellow($value);
        return $this->_saveObject();
    }

    /**
     * returns yellow value from CMY
     *
     * @param string $output
     * @return mixed
     */
    public function getYellow($output = Sodium::ACTUAL)
    {
        return $this->_getElement('Colorspace\Cmy')->getYellow($output);
    }

    /**
     * creates image of the color and saves in
     * the destination folder mentioned in Config file
     *
     * @return mixed
     */
    public function getImg()
    {
        return $this->_getElement('Aggregate\Image')->getImg();
    }

    /**
     * if the input source
     * (website, css, image, psd, ico, kuler pallate, colorlovers pallate)
     * has multiple colors it retuns all of them
     *
     * @param string $col
     * @return mixed
     */
    public function getCol($col = '')
    {
        return $this->_getElement('Aggregate\Image')->getCol($col);
    }

    /**
     * checks the given input is light color
     *
     * @return bool
     */
    public function isLight()
    {
        $rgb = $this->getRGB();
        return (($rgb[0] * 299 + $rgb[1] * 587 + $rgb[2] * 114) / 1000 > 130);
    }

    /**
     * checks the given input is dark color
     *
     * @return bool
     */
    public function isDark()
    {
        $rgb = $this->getRGB();
        return (($rgb[0] * 299 + $rgb[1] * 587 + $rgb[2] * 114) / 1000 <= 130);
    }

    /**
     * checks the given input is elegent color
     *
     *
     * @return bool
     */
    public function isElegent()
    {
        $hsv = $this->getHsv();
        $s = 94;
        $v = 96;
        if (round($hsv[1]) == $s && round($hsv[2]) == $v)
            return TRUE;
        return FALSE;
    }

    /**
     * checks the input color is gray
     *
     * @param int $threshold
     * @return bool
     */
    public function isGrayscale($threshold = 16)
    {
        $rgb = $this->getRGB();
        $rgbMin = min($rgb);
        $rgbMax = max($rgb);
        $diff = $rgbMax - $rgbMin;
        return $diff < $threshold;
    }

    /**
     * returns the tint color
     *
     * @param int $range level of the tint
     * @param string $model output format
     * @param bool $standard
     * @return mixed
     */
    public function getTint($range = 2, $model = 'Seed\Hex', $standard = TRUE)
    {
        $l = round($this->getLightness() * $range);
        $h = round($this->getHue());
        $s = round($this->getSaturation());
        $value = 'hsl(' . $h . ',' . $s . ',' . $l . ')';
        $new_instance = new Sodium($value);
        $method = ($standard) ? 'getStandardOutput' : 'getDefaultOutput';
        return $new_instance->getModel($model)->$method();
    }

    /**
     * returns the shade color
     *
     * @param float $range level of the shade
     * @param string $model output format
     * @param bool $standard
     * @return mixed
     */
    public function getShade($range = 0.9, $model = 'Seed\Hex', $standard = TRUE)
    {
        $v = round($this->getValue() * $range);
        $h = round($this->getHue());
        $s = round($this->getSaturation());
        $value = 'hsv(' . $h . ',' . $s . ',' . $v . ')';
        $new_instance = new Sodium($value);
        $method = ($standard) ? 'getStandardOutput' : 'getDefaultOutput';
        return $new_instance->getModel($model)->$method();
    }

    /**
     * returns the tone color
     *
     * @param float $range level of the tone
     * @param string $model output format
     * @param bool $standard
     * @return mixed
     */
    public function getTone($range = 0.9, $model = 'Seed\Hex', $standard = TRUE)
    {
        print_r($this);
        exit;
        $this->setValue('50%');
        $v = round($this->getValue());
        $h = round($this->getHue());
        $s = round($this->getSaturation() * $range);
        $value = 'hsv(' . $h . ',' . $s . ',' . $v . ')';
        $new_instance = new Sodium($value);
        $method = ($standard) ? 'getStandardOutput' : 'getDefaultOutput';
        return $new_instance->getModel($model)->$method();
    }

    /**
     * returns information about the loaded models/input formats/input colors
     *
     * @return array
     */
    public function getInfo()
    {
        return array(
            'loaded_models' => $this->getLoadedModels(),
            'loaded_formats' => $this->getLoadedInputFormatters(),
            'input_colors' => $this->getInputColors(),
            'version' => $this->version()
        );
    }

    /*
     * enbles sodium to act as a variable to display properties
     *
     * @return string
     */

    public function __toString()
    {

        $mts = new Export\MultipleToSingle($this, array('standard' => FALSE));
        $output = $mts->export();
        foreach ($output as $op)
            $v[] = '<div style="background-color:#' . $op . ';width:50px;height:50px;display:inline-block;" title="#' . $op . '"></div>';
        $info['models_title'] = '<br/><b>Loaded Models</b><br/>';
        $info['models'] = implode('<br/>', $this->getLoadedModels());
        $info['formatter_title'] = '<br/><b>Loaded Formatters</b><br/>';
        $info['formatters'] = implode('<br/>', $this->getLoadedInputFormatters());
        $info['input_title'] = '<br/><b>Input Colors</b><br/>';
        $info['inputs'] = implode('<br/>', $this->getInputColors());
        $info['output_title'] = '<br/><b>Input Colors ( visual )</b><br/>';
        $info['outputs'] = implode('', $v);
        $info['version_title'] = '<br/><b>Sodium Version</b><br/>';
        $info['version'] = $this->version();
        return implode('<br/>', $info);
    }

    /*
     * returns current version
     * 
     * @return string 
     */

    public function version()
    {
        return self::VERSION;
    }

    /*
     *  enables sodium as a function to import colors
     * 
     * @param  mixed $input input color 
     * @return object Sodium
     */

    public function __invoke($input)
    {
        $this->import($input);
    }

    /*
     * returns the html view of the input colors
     *
     *  horizontally displays each color visually 
     */

    public function view()
    {
        $mts = new Export\MultipleToSingle($this, array('standard' => FALSE));
        $output = $mts->export();
        foreach ($output as $op)
            $v[] = '<div style="background-color:#' . $op . ';margin:2px;width:50px;height:50px;display:inline-block;" title="#' . $op . '"></div>';

        return implode('', $v);
    }

}
