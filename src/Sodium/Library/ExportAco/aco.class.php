<?php

/**
 * ACO File generator
 *
 * Adobe Color File (ACO) Generator Class
 *
 * This program is free software; you can redistribute it and/or
 * modify it under the terms of the GNU General Public License
 * as published by the Free Software Foundation; either version 2
 * of the License, or (at your option) any later version.
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program; if not, write to the Free Software
 * Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
 *
 * @package   Adobe Color File (ACO) Generator Class
 * @file      aco.class.php
 */
class acofile
{
    var $colors = array();
    var $i = 0;
    var $file;
    var $count = 0;

    function acofile($filename = "aco_file.aco")
    {
        $this->i = 0;
        $this->file = $filename;
    }

    function add($param, $r = 0, $g = 0, $b = 0)
    {
        if (!is_array($param)) {
            $this->i++;
            $this->colors[$this->i]['r'] = $r;
            $this->colors[$this->i]['g'] = $g;
            $this->colors[$this->i]['b'] = $b;
            $this->colors[$this->i]['length'] = strlen($param) + 1;
            $this->colors[$this->i]['name'] = $param;
        } else
            foreach ($param as $color => $rgb)
                $this->add($color, $rgb[0], $rgb[1], $rgb[2]);
    }

    function n($x)
    {
        return sprintf("%c%c", ($x >> 8) & 0xff, $x & 0xff);
    }

    function createAcofile()
    {
        $this->count = count($this->colors);
        $out = $this->n(1);
        $out .= $this->n($this->count);
        for ($k = 1; $k <= $this->i; $k++) {
            $out .= $this->n(0);
            $out .= $this->n(($this->colors[$k]['r'] << 8) | $this->colors[$k]['r']);
            $out .= $this->n(($this->colors[$k]['g'] << 8) | $this->colors[$k]['g']);
            $out .= $this->n(($this->colors[$k]['b'] << 8) | $this->colors[$k]['b']);
            $out .= $this->n(0);
        }
        $out .= $this->n(2);
        $out .= $this->n($this->count);
        for ($l = 1; $l <= $this->i; $l++) {
            $out .= $this->n(0);
            $out .= $this->n(($this->colors[$l]['r'] << 8) | $this->colors[$l]['r']);
            $out .= $this->n(($this->colors[$l]['g'] << 8) | $this->colors[$l]['g']);
            $out .= $this->n(($this->colors[$l]['b'] << 8) | $this->colors[$l]['b']);
            $out .= $this->n(0);
            $out .= $this->n(0);
            $out .= $this->n($this->colors[$l]['length']);
            for ($m = 0; $m <= strlen($this->colors[$l]['name']) - 1; $m++) {
                $out .= $this->n(ord(substr($this->colors[$l]['name'], $m, $m + 1)));
            }
            $out .= $this->n(0);
        }
        return $out;
    }

    function outputAcofile()
    {
        $aco = $this->createAcoFile();
        header("Content-type: application/octet-stream");
        header('Content-Length: ' . strlen($aco));
        header("Content-disposition: attachment; filename=\"" . $this->file . "\"");
        print $aco;
        exit;
    }

    function saveAcofile() //Suggested by Horst Nogajski <info {at} nogajski <dot> de>
    {
        $fp = @fopen($this->file, 'wb'); // write binarysave (needed on windows systems, has no effect on Unix)
        if ($fp === FALSE) {
            return FALSE;
        }
        fwrite($fp, $this->createAcofile());
        fclose($fp);
        return TRUE;
    }
}

?>
