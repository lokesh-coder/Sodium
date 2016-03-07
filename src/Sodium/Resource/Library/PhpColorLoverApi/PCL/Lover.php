<?php

/**
 * PCL_Lover.
 *
 * Make a pattern request to the ColourLovers API.
 *
 * PCL_Lover is almost the same as PCL_Lovers except for the fact that there are no
 * optional parameters to specify. Setting $lover in the constructor will request the
 * data for that lover name. Run PCL_Lover::get() to request the data.
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
class PCL_Lover
{
    /**
     * Lover to be requested.
     *
     * @var string
     */
    private $lover;

    /**
     * Request comments.
     *
     * When $comments is set to TRUE the api will be called using ?comments=1 which
     * will return the comments on a lover's profile.
     *
     * @var bool
     */
    private $comments = false;

    /**
     * PCL_Lover($lover).
     *
     * Initializes PCL_Lover and sets the lover to be requested.
     *
     * @param string $lover lover name
     *
     * @return object
     */
    public function __construct($lover)
    {
        $this->lover = str_replace(' ', '+', $lover);
    }

    /**
     * comments().
     *
     * When called, sets $comments to true.
     */
    public function comments()
    {
        $this->comments = true;
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
        $url = $this->url();
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
     * url().
     *
     * Sets the API url and sets the comments parameter if $comments is TRUE.
     *
     * @return string
     */
    private function url()
    {
        $url = 'http://www.colourlovers.com/api/lover/'.$this->lover;
        if ($this->comments) {
            $url .= '?comments=1';
        }

        return $url;
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
        foreach ($xml->lover as $lover) {
            $l = array();
            $l['lover'] = $this->parseString($lover->userName);
            $l['registered'] = $this->parseString($lover->dateRegistered);
            $l['activeLast'] = $this->parseString($lover->dateLastActive);
            $l['rating'] = $this->parseInt($lover->rating);
            $l['location'] = $this->parseString($lover->location);
            $l['colors'] = $this->parseInt($lover->numColors);
            $l['palettes'] = $this->parseInt($lover->numPalettes);
            $l['patterns'] = $this->parseInt($lover->numPatterns);
            $l['commentsMade'] = $this->parseInt($lover->numCommentsOnProfile);
            $l['profileComments'] = $this->parseInt($lover->numCommentsOnProfile);
            $l['lovers'] = $this->parseInt($lover->numLovers);
            if ($this->comments) {
                $l['comments'] = array();
                foreach ($lover->comments->comment as $comment) {
                    $c = array();
                    $c['date'] = $this->parseString($comment->commentDate);
                    $c['lover'] = $this->parseString($comment->commentUserName);
                    $c['comment'] = $this->parseString($comment->commentComments);
                    $l['comments'][] = $c;
                }
            }
            $l['url'] = $this->parseString(str_replace(' ', '+', $lover->url));
            $l['api'] = $this->parseString(str_replace(' ', '+', $lover->apiUrl));
            $out[] = $l;
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
