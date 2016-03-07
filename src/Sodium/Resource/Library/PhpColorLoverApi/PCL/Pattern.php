<?php

/**
 * PCL_Pattern.
 *
 * Make a pattern request to the ColourLovers API.
 *
 * PCL_Pattern is almost the same as PCL_Patterns except for the fact that there are no
 * optional parameters to specify. Setting $patternID in the constructor will request the
 * data for that pattern id. Run PCL_Pattern::get() to request the data.
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
 * @author      Nathan Lucas <nathan@unwrittenmedia.com>
 *
 * @link        http://www.colourlovers.com/api
 * @link        http://www.unwrittenmedia.com/projects/phpColourLover
 *
 * @license     http://www.gnu.org/licenses/
 * @copyright   Copyright (c) 2008, Nathan Lucas
 *
 * @version     1.0.0
 */
class PCL_Pattern
{
    /**
     * Pattern ID to be requested.
     *
     * @var int
     */
    private $patternID;

    /**
     * PCL_Pattern($patternID).
     *
     * Initializes PCL_Pattern and sets the patternID for the instance.
     *
     * @param int $patternID pattern id
     *
     * @return object
     */
    public function __construct($patternID)
    {
        $this->patternID = (string) $patternID;
    }

    /**
     * get().
     *
     * Preforms a curl call. get() returns an array based on the XML data recieved from the call.
     *
     * @return array
     */
    public function get()
    {
        $url = 'http://www.colourlovers.com/api/pattern/'.$this->patternID;
        if (function_exists('curl_init')) {
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, $url);
            curl_setopt($ch, CURLOPT_HEADER, false);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            $xml = curl_exec($ch);
            curl_close($ch);
        } else {
            $xml = file_get_contents($url);
        }

        return $this->parse($xml);
    }

    /**
     * parse($xml).
     *
     * Parses XML data into an array to work with the returned curl call. Fixes the problem
     * with SimpleXML and CDATA and also HTML entities by base64 encoding CDATA values.
     *
     * @param string $xml xml string
     *
     * @return array
     */
    private function parse($xml)
    {
        $xml = preg_replace("/\<\!\[CDATA\[(.*?)\]\]\>/ies", "'[CDATA]'.base64_encode('$1').'[/CDATA]'", $xml);
        $xml = new SimpleXMLElement($xml);
        if (isset($xml->noresults)) {
            return false;
        }
        $out = array();
        foreach ($xml->pattern as $pattern) {
            $p = array();
            $p['title'] = $this->parseString($pattern->title);
            $p['lover'] = $this->parseString($pattern->userName);
            $p['views'] = $this->parseInt($pattern->numViews);
            $p['votes'] = $this->parseInt($pattern->numVotes);
            $p['comments'] = $this->parseInt($pattern->numComments);
            $p['hearts'] = $this->parseInt($pattern->numHearts);
            $p['rank'] = $this->parseInt($pattern->rank);
            $p['date'] = $this->parseString($pattern->dateCreated);
            $p['colors'] = array();
            foreach ($pattern->colors->hex as $hex) {
                $p['colors'][] = $this->parseString($hex);
            }
            $p['description'] = $this->parseString($pattern->description);
            $p['url'] = $this->parseString($pattern->url);
            $p['image'] = $this->parseString($pattern->imageUrl);
            $p['api'] = $this->parseString($pattern->apiUrl);
            $out[] = $p;
        }
        $out = $out[0];

        return $out;
    }

    /**
     * parseString($obj_val).
     *
     * Parses a value passed from SimpleXML into a string. If needed, CDATA will be base64 decoded.
     *
     * @param object $obj_val SimpleXML value
     *
     * @return string
     */
    private function parseString($obj_val)
    {
        $obj_val = preg_replace("/\[CDATA\](.*?)\[\/CDATA\]/ies", "base64_decode('$1')", $obj_val);

        return (string) stripslashes($obj_val);
    }

    /**
     * parseInt($obj_val).
     *
     * Parses a value passed from SimpleXML into a string.
     *
     * @param object $obj_val SimpleXML value
     *
     * @return string
     */
    private function parseInt($obj_val)
    {
        $obj_val = preg_replace('/[^0-9]/', '', $obj_val);

        return (int) $obj_val;
    }
}
