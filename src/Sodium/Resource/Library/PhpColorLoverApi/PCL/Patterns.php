<?php

/**
 * PCL_Patterns
 *
 * Make a patterns request to the ColourLovers API.
 *
 * The PCL_Patterns subclass is a set of methods for setting parameters alloed
 * when calling the api/patterns portion of the ColourLovers API. Running
 * PCL_Patterns::get() will send the request to the API and return the data formatted
 * in an array.
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
 * @subpackage  PCL_Patterns
 * @access      private
 * @author      Nathan Lucas <nathan@unwrittenmedia.com>
 * @link        http://www.colourlovers.com/api
 * @link        http://www.unwrittenmedia.com/projects/phpColourLover
 * @license     http://www.gnu.org/licenses/
 * @copyright   Copyright (c) 2008, Nathan Lucas
 * @version     1.0.0
 */
class PCL_Patterns
{

    /**
     * Sets either normal, new, or top.
     *
     * @access  private
     * @var     string
     */
    private $get = null;

    /**
     * Parameters to be parsed into URL string.
     *
     * @access  private
     * @var     array
     */
    private $params = array();

    /**
     * lover($lover)
     *
     * Sets $params['lover'] to be parsed into URL string.
     *
     * @param   string $lover lover name
     * @access  public
     * @return  void
     */
    public function lover($lover)
    {
        $this->params['lover'] = str_replace(" ", "+", $lover);
    }

    /**
     * hues($option1, $option2, $option3)
     *
     * Sets $params['hueOption']. You can sepcify up to three hues to include in the lookup.
     * If a hue is not in the allowed list, an error will be triggered.
     *
     * @param   string $option1 hue option
     * @param   string $option2 hue option
     * @param   string $option3 hue option
     * @access  public
     * @return  void
     */
    public function hues($option1, $option2 = null, $option3 = null)
    {
        $allowed = array("red", "orange", "yellow", "green", "aqua", "blue", "violet", "fuchsia");
        if (!in_array($option1, $allowed)) {
            trigger_error("hues(): " . $option1 . " is not a valid hue value.", E_USER_ERROR);
        }
        $options = $option1;
        if (!is_null($option2)) {
            if (!in_array($option2, $allowed)) {
                trigger_error("hues(): " . $option2 . " is not a valid hue value.", E_USER_ERROR);
            }
            $options .= "," . $option2;
        }
        if (!is_null($option2)) {
            if (!in_array($option2, $allowed)) {
                trigger_error("hues(): " . $option2 . " is not a valid hue value.", E_USER_ERROR);
            }
            $options .= "," . $option2;
        }
        if (!is_null($option3)) {
            if (!in_array($option3, $allowed)) {
                trigger_error("hues(): " . $option3 . " is not a valid hue value.", E_USER_ERROR);
            }
            $options .= "," . $option3;
        }
        $this->params['hueOption'] = $options;
    }

    /**
     * hex($hex)
     *
     * Sets $params['hex'] to be parsed into URL string. If $hex is an invalid hex color
     * code, an error will be triggered.
     *
     * @param   string $hex hexidecimal color value
     * @access  public
     * @return  void
     */
    public function hex($hex)
    {
        $hex = strtoupper($hex);
        $hex = preg_replace("/[^A-Z0-9]/", "", $hex);
        if (strlen($hex) != 6) {
            trigger_error("hex(): " . $hex . " is not a valid hex value.", E_USER_ERROR);
        }
        $this->params['hex'] = $hex;
    }

    /**
     * keywords($keywords)
     *
     * Sets $params['keywords'] to be used in parsing the URL string.
     *
     * @param   string $keywords keywords
     * @access  public
     * @return  void
     */
    public function keywords($keywords)
    {
        $this->params['keywords'] = str_replace(" ", "+", $keywords);
    }

    /**
     * order($col, $sort)
     *
     * Sets $params['orderCol'] and $params['sortBy']. $col can be set using the constants
     * defined at the top of the script. $sort can either be ASC or DESC.
     *
     * @param   string $col sort column
     * @param   string $sort sort order
     * @access  public
     * @return  void
     */
    public function order($col, $sort = null)
    {
        $allowed = array("dateCreated", "score", "name", "numVotes", "numViews");
        if (!in_array($col, $allowed)) {
            trigger_error("order(): " . $col . " is not a valid column value.", E_USER_ERROR);
        }
        $this->params['orderCol'] = $col;
        if (!is_null($sort)) {
            $sort = strtoupper($sort);
            $allowed = array("ASC", "DESC");
            if (!in_array($sort, $allowed)) {
                trigger_error("order(): " . $sort . " is not a valid sort value.", E_USER_ERROR);
            }
            $this->params['sortBy'] = $sort;
        }
    }

    /**
     * limit($limit, $offset)
     *
     * Sets $params['numResults'] and $params['resultOffset'] for use in parsing the
     * URL string.
     *
     * @param   int $limit results limit
     * @param   int $offset results offset
     * @access  public
     * @return  void
     */
    public function limit($limit, $offset = null)
    {
        $this->params['numResults'] = (string)$limit;
        if (!is_null($offset)) {
            $this->params['resultOffset'] = (string)$offset;
        }
    }

    /**
     * get($get)
     *
     * Sets $this->get (null, new, or top) for use in the URL string and preforms a
     * curl call. get() returns an array based on the XML data recieved from the call.
     *
     * @param   string $get get type
     * @access  public
     * @return  array
     */
    public function get($get = null)
    {
        if (!is_null($get)) {
            $get = strtolower($get);
            $allowed = array("new", "top");
            if (!in_array($get, $allowed)) {
                trigger_error("get(): " . $get . " is not a valid value.", E_USER_ERROR);
            }
            $this->get = $get;
        }
        $url = $this->url();
        if (function_exists("curl_init")) {
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
     * url()
     *
     * Parses all items in $params into the URL string used in get().
     *
     * @access  private
     * @return  string
     */
    private function url()
    {
        $url = "http://www.colourlovers.com/api/patterns/";
        if (!is_null($this->get)) {
            $url .= $this->get;
        }
        if (count($this->params) > 0) {
            $url .= "?";
            foreach ($this->params as $param => $value) {
                $url .= $param . "=" . $value . "&";
            }
            $url = preg_replace("/(.*?)\&$/", "$1", $url);
        }
        return $url;
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
        if (count($out) == 1) {
            $out = $out[0];
        }
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
     * @param   object $obj_val SimpleXML value
     * @access  private
     * @return  string
     */
    private function parseInt($obj_val)
    {
        $obj_val = preg_replace("/[^0-9]/", "", $obj_val);
        return (int)$obj_val;
    }
}

?>
