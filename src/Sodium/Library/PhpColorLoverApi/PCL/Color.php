<?php

/**
 * PCL_Color
 *
 * Make a color request to the ColourLovers API.
 *
 * PCL_Color is almost the same as PCL_Colors except for the fact that there are no
 * optional parameters to specify. Setting $hex in the constructor will request the
 * data for that hex value. Run PCL_Color::get() to request the data.
 *
 *
 * This file is part of phpColourLover.
 *
 * phpColourLover is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * phpColourLover is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
 *
 *
 * @package     phpColourLover
 * @subpackage  PCL_Color
 * @access      private
 * @author      Nathan Lucas <nathan@unwrittenmedia.com>
 * @link        http://www.colourlovers.com/api
 * @link        http://www.unwrittenmedia.com/projects/phpColourLover
 * @license     http://www.gnu.org/licenses/
 * @copyright   Copyright (c) 2008, Nathan Lucas
 * @version     1.0.0
 */
class PCL_Color
{

    /**
     * The hex to lookup.
     *
     * @access  private
     * @var     string
     */
    private $hex;

    /**
     * PCL_Color($hex)
     *
     * Initializes PCL_Color and sets the hex value to lookup. If the value is invalid,
     * an error will trigger.
     *
     * @param   string $hex hexidecimal color value
     * @access  public
     * @return  object
     */
    public function __construct($hex)
    {
        $hex = strtoupper($hex);
        $hex = preg_replace("/[^A-Z0-9]/", "", $hex);
        if (strlen($hex) != 6) {
            trigger_error("PCL_Color: " . $hex . " is not a valid hex value.", E_USER_ERROR);
        }
        $this->hex = $hex;
    }

    /**
     * get()
     *
     * Preforms a curl call. get() returns an array based on the XML data recieved from the call.
     *
     * @access  public
     * @return  array
     */
    public function get()
    {
        $url = "http://www.colourlovers.com/api/color/" . $this->hex;
        if (function_exists("curl_init")) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, FALSE);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
            $xml = curl_exec($ch);
            curl_close($ch);
        } else {
            $xml = file_get_contents($url);
        }
        return $this->parse($xml);
    }

    /**
     * parse($xml)
     *
     * Parses XML data into an array to work with the returned curl call. Fixes the problem
     * with SimpleXML and CDATA and also HTML entities by base64 encoding CDATA values.
     *
     * @param   string $xml xml string
     * @access  private
     * @return  array
     */
    private function parse($xml)
    {
        $xml = preg_replace("/\<\!\[CDATA\[(.*?)\]\]\>/ies", "'[CDATA]'.base64_encode('$1').'[/CDATA]'", $xml);
        $xml = new SimpleXMLElement($xml);
        if (isset($xml->noresults)) {
            return FALSE;
        }
        $out = array();
        foreach ($xml->color as $color) {
            $c = array();
            $c['title'] = $this->parseString($color->title);
            $c['lover'] = $this->parseString($color->userName);
            $c['views'] = $this->parseInt($color->numViews);
            $c['votes'] = $this->parseInt($color->numVotes);
            $c['comments'] = $this->parseInt($color->numComments);
            $c['hearts'] = $this->parseInt($color->numHearts);
            $c['rank'] = $this->parseInt($color->rank);
            $c['date'] = $this->parseString($color->dateCreated);
            $c['hex'] = $this->parseString($color->hex);
            $c['rgb'] = array("red" => $this->parseInt($color->rgb->red),
                "green" => $this->parseInt($color->rgb->green),
                "blue" => $this->parseInt($color->rgb->blue));
            $c['hsv'] = array("hue" => $this->parseInt($color->hsv->hue),
                "saturation" => $this->parseInt($color->hsv->saturation),
                "value" => $this->parseInt($color->hsv->value));
            $c['description'] = $this->parseString($color->description);
            $c['url'] = $this->parseString($color->url);
            $c['image'] = $this->parseString($color->imageUrl);
            $c['api'] = $this->parseString($color->apiUrl);
            $out[] = $c;
        }
        $out = $out[0];
        return $out;
    }

    /**
     * parseString($obj_val)
     *
     * Parses a value passed from SimpleXML into a string. If needed, CDATA will be base64 decoded.
     *
     * @param   object $obj_val SimpleXML value
     * @access  private
     * @return  string
     */
    private function parseString($obj_val)
    {
        $obj_val = preg_replace("/\[CDATA\](.*?)\[\/CDATA\]/ies", "base64_decode('$1')", $obj_val);
        return (string)stripslashes($obj_val);
    }

    /**
     * parseInt($obj_val)
     *
     * Parses a value passed from SimpleXML into a string.
     *
     * @param   object $obj_val SimpeXML value
     * @access  private
     * @return  string
     */
    private function parseInt($obj_val)
    {
        $obj_val = preg_replace("/[^0-9]/", "", $obj_val);
        return (int)$obj_val;
    }
}
