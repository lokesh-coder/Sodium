<?php
/**
 * These constants are here to make calling order() simpler. They really don't
 * serve any purpose other than giving the allowed orderCol values an easier
 * name to remember.
 */
define("PCL_SORT_DATE", "dateCreated");
define("PCL_SORT_SCORE", "score");
define("PCL_SORT_NAME", "name");
define("PCL_SORT_VOTES", "numVotes");
define("PCL_SORT_VIEWS", "numViews");
define("PCL_SORT_LASTACTIVE", "lastActive");

/**
 * Path of the phpColourLover class.
 *
 * Be sure to set this to the path of your local copy of phpColourLover.
 */
define("PCL_INSTALL_PATH", "");

/**
 * phpColourLover
 *
 * Make requests to the COLOURLovers API.
 *
 * ColourLovers released the COLOURLovers API on April 2nd, 2008. I wanted
 * a PHP wrapper to this API so I wrote phpColourLover. This is an interface
 * for the COLOURLovers API that enables you to make any request that the API
 * allows. You can get Color(s), Palette(s), Pattern(s) and Lover(s) through
 * the API using cURL requests. The XML response is parsed into an array using
 * SimpleXML. The reason I don't just return the SimpleXML object is because
 * personally I do not like how the class is set up.
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
 * @version     1.0.0
 * @author      Nathan Lucas <nathan@unwrittenmedia.com>
 * @link        http://www.colourlovers.com/apiI
 * @link        http://www.unwrittenmedia.com/projects/phpColourLover
 * @license     http://www.gnu.org/licenses/
 * @copyright   Copyright (c) 2008, Nathan Lucas
 */
class phpColourLover
{

    /**
     * Colors()
     *
     * Returns a new isntance of PCL_Colors.
     *
     * @access  public
     * @return  object
     */
    public function Colors()
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Colors.php");
        return new PCL_Colors;
    }

    /**
     * Color($hex)
     *
     * Returns a new instance of PCL_Color.
     *
     * @param   string $hex hexidecimal color value
     * @access  public
     * @return  object
     */
    public function Color($hex)
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Color.php");
        return new PCL_Color($hex);
    }

    /**
     * Palettes()
     *
     * Returns a new isntance of PCL_Palettes.
     *
     * @access  public
     * @return  object
     */
    public function Palettes()
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Palettes.php");
        return new PCL_Palettes;
    }

    /**
     * Palette($paletteID)
     *
     * Returns a new instance of PCL_Palette.
     *
     * @param   string $paletteID palette id
     * @access  public
     * @return  object
     */
    public function Palette($paletteID)
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Palette.php");
        return new PCL_Palette($paletteID);
    }

    /**
     * Patterns()
     *
     * Returns a new isntance of PCL_Patterns.
     *
     * @access  public
     * @return  object
     */
    public function Patterns()
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Patterns.php");
        return new PCL_Patterns;
    }

    /**
     * Pattern($patternID)
     *
     * Returns a new instance of PCL_Pattern.
     *
     * @param   string $patternID pattern id
     * @access  public
     * @return  object
     */
    public function Pattern($patternID)
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Pattern.php");
        return new PCL_Pattern($patternID);
    }

    /**
     * Lovers()
     *
     * Returns a new isntance of PCL_Lovers.
     *
     * @access  public
     * @return  object
     */
    public function Lovers()
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Lovers.php");
        return new PCL_Lovers;
    }

    /**
     * Lover($lover)
     *
     * Returns a new instance of PCL_Lover.
     *
     * @param   string $lover lover name
     * @access  public
     * @return  object
     */
    public function Lover($lover)
    {
        require_once(PCL_INSTALL_PATH . "/PCL/Lover.php");
        return new PCL_Lover($lover);
    }
}

?>
