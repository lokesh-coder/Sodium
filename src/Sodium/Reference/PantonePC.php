<?php

namespace Sodium\Reference;

class PantonePC extends ReferenceAbstract
{
    public function get()
    {
        $pantone_pallete_pc = array(
            "Proc. y PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "Proc. Magen. PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "Proc. c PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 0
            ),
            "Proc. b PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 100
            ),
            "100 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 51,
                'key' => 0
            ),
            "101 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 79,
                'key' => 0
            ),
            "102 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 95,
                'key' => 0
            ),
            "y PC" => array(
                'cyan' => 0,
                'magenta' => 1,
                'yellow' => 100,
                'key' => 0
            ),
            "103 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 100,
                'key' => 18
            ),
            "104 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 100,
                'key' => 30
            ),
            "105 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 100,
                'key' => 50
            ),
            "106 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 69,
                'key' => 0
            ),
            "107 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 79,
                'key' => 0
            ),
            "108 PC" => array(
                'cyan' => 0,
                'magenta' => 6,
                'yellow' => 95,
                'key' => 0
            ),
            "109 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 100,
                'key' => 0
            ),
            "110 PC" => array(
                'cyan' => 0,
                'magenta' => 12,
                'yellow' => 100,
                'key' => 7
            ),
            "111 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 100,
                'key' => 27
            ),
            "112 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 100,
                'key' => 38
            ),
            "113 PC" => array(
                'cyan' => 0,
                'magenta' => 7,
                'yellow' => 66,
                'key' => 0
            ),
            "114 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 73,
                'key' => 0
            ),
            "115 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 80,
                'key' => 0
            ),
            "116 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 100,
                'key' => 0
            ),
            "117 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 100,
                'key' => 15
            ),
            "118 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 100,
                'key' => 27
            ),
            "119 PC" => array(
                'cyan' => 0,
                'magenta' => 12,
                'yellow' => 100,
                'key' => 49
            ),
            "120 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 58,
                'key' => 0
            ),
            "121 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 69,
                'key' => 0
            ),
            "122 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 80,
                'key' => 0
            ),
            "123 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 94,
                'key' => 0
            ),
            "124 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 100,
                'key' => 6
            ),
            "125 PC" => array(
                'cyan' => 0,
                'magenta' => 26,
                'yellow' => 100,
                'key' => 26
            ),
            "126 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 100,
                'key' => 37
            ),
            "1205 PC" => array(
                'cyan' => 0,
                'magenta' => 5,
                'yellow' => 31,
                'key' => 0
            ),
            "1215 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 45,
                'key' => 0
            ),
            "1225 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 62,
                'key' => 0
            ),
            "1235 PC" => array(
                'cyan' => 0,
                'magenta' => 29,
                'yellow' => 91,
                'key' => 0
            ),
            "1245 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 100,
                'key' => 18
            ),
            "1255 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 100,
                'key' => 34
            ),
            "1265 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 100,
                'key' => 51
            ),
            "127 PC" => array(
                'cyan' => 0,
                'magenta' => 7,
                'yellow' => 50,
                'key' => 0
            ),
            "128 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 65,
                'key' => 0
            ),
            "129 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 77,
                'key' => 0
            ),
            "130 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 100,
                'key' => 0
            ),
            "131 PC" => array(
                'cyan' => 0,
                'magenta' => 32,
                'yellow' => 100,
                'key' => 9
            ),
            "132 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 100,
                'key' => 30
            ),
            "133 PC" => array(
                'cyan' => 0,
                'magenta' => 20,
                'yellow' => 100,
                'key' => 56
            ),
            "134 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 45,
                'key' => 0
            ),
            "135 PC" => array(
                'cyan' => 0,
                'magenta' => 19,
                'yellow' => 60,
                'key' => 0
            ),
            "136 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 76,
                'key' => 0
            ),
            "137 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 90,
                'key' => 0
            ),
            "138 PC" => array(
                'cyan' => 0,
                'magenta' => 42,
                'yellow' => 100,
                'key' => 1
            ),
            "139 PC" => array(
                'cyan' => 0,
                'magenta' => 37,
                'yellow' => 100,
                'key' => 23
            ),
            "140 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 100,
                'key' => 54
            ),
            "1345 PC" => array(
                'cyan' => 0,
                'magenta' => 14,
                'yellow' => 47,
                'key' => 0
            ),
            "1355 PC" => array(
                'cyan' => 0,
                'magenta' => 20,
                'yellow' => 56,
                'key' => 0
            ),
            "1365 PC" => array(
                'cyan' => 0,
                'magenta' => 29,
                'yellow' => 72,
                'key' => 0
            ),
            "1375 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 90,
                'key' => 0
            ),
            "1385 PC" => array(
                'cyan' => 0,
                'magenta' => 44,
                'yellow' => 100,
                'key' => 7
            ),
            "1395 PC" => array(
                'cyan' => 0,
                'magenta' => 41,
                'yellow' => 100,
                'key' => 37
            ),
            "1405 PC" => array(
                'cyan' => 0,
                'magenta' => 36,
                'yellow' => 100,
                'key' => 63
            ),
            "141 PC" => array(
                'cyan' => 0,
                'magenta' => 19,
                'yellow' => 51,
                'key' => 0
            ),
            "142 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 76,
                'key' => 0
            ),
            "143 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 85,
                'key' => 0
            ),
            "144 PC" => array(
                'cyan' => 0,
                'magenta' => 48,
                'yellow' => 100,
                'key' => 0
            ),
            "145 PC" => array(
                'cyan' => 0,
                'magenta' => 47,
                'yellow' => 100,
                'key' => 8
            ),
            "146 PC" => array(
                'cyan' => 0,
                'magenta' => 43,
                'yellow' => 100,
                'key' => 33
            ),
            "147 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 100,
                'key' => 56
            ),
            "148 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 37,
                'key' => 0
            ),
            "149 PC" => array(
                'cyan' => 0,
                'magenta' => 23,
                'yellow' => 47,
                'key' => 0
            ),
            "150 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 70,
                'key' => 0
            ),
            "151 PC" => array(
                'cyan' => 0,
                'magenta' => 48,
                'yellow' => 95,
                'key' => 0
            ),
            "152 PC" => array(
                'cyan' => 0,
                'magenta' => 51,
                'yellow' => 100,
                'key' => 1
            ),
            "153 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 100,
                'key' => 18
            ),
            "154 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 100,
                'key' => 34
            ),
            "1485 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 54,
                'key' => 0
            ),
            "1495 PC" => array(
                'cyan' => 0,
                'magenta' => 33,
                'yellow' => 67,
                'key' => 0
            ),
            "1505 PC" => array(
                'cyan' => 0,
                'magenta' => 42,
                'yellow' => 77,
                'key' => 0
            ),
            "Orange 021 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 0
            ),
            "1525 PC" => array(
                'cyan' => 0,
                'magenta' => 58,
                'yellow' => 100,
                'key' => 10
            ),
            "1535 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 38
            ),
            "1545 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 72
            ),
            "155 PC" => array(
                'cyan' => 0,
                'magenta' => 12,
                'yellow' => 28,
                'key' => 0
            ),
            "156 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 42,
                'key' => 0
            ),
            "157 PC" => array(
                'cyan' => 0,
                'magenta' => 43,
                'yellow' => 70,
                'key' => 0
            ),
            "158 PC" => array(
                'cyan' => 0,
                'magenta' => 61,
                'yellow' => 97,
                'key' => 0
            ),
            "159 PC" => array(
                'cyan' => 0,
                'magenta' => 66,
                'yellow' => 100,
                'key' => 7
            ),
            "160 PC" => array(
                'cyan' => 0,
                'magenta' => 62,
                'yellow' => 100,
                'key' => 32
            ),
            "161 PC" => array(
                'cyan' => 0,
                'magenta' => 52,
                'yellow' => 100,
                'key' => 64
            ),
            "1555 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 34,
                'key' => 0
            ),
            "1565 PC" => array(
                'cyan' => 0,
                'magenta' => 34,
                'yellow' => 49,
                'key' => 0
            ),
            "1575 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 72,
                'key' => 0
            ),
            "1585 PC" => array(
                'cyan' => 0,
                'magenta' => 56,
                'yellow' => 90,
                'key' => 0
            ),
            "1595 PC" => array(
                'cyan' => 0,
                'magenta' => 59,
                'yellow' => 100,
                'key' => 5
            ),
            "1605 PC" => array(
                'cyan' => 0,
                'magenta' => 56,
                'yellow' => 100,
                'key' => 30
            ),
            "1615 PC" => array(
                'cyan' => 0,
                'magenta' => 56,
                'yellow' => 100,
                'key' => 43
            ),
            "162 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 22,
                'key' => 0
            ),
            "163 PC" => array(
                'cyan' => 0,
                'magenta' => 31,
                'yellow' => 44,
                'key' => 0
            ),
            "164 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 73,
                'key' => 0
            ),
            "165 PC" => array(
                'cyan' => 0,
                'magenta' => 59,
                'yellow' => 96,
                'key' => 0
            ),
            "166 PC" => array(
                'cyan' => 0,
                'magenta' => 64,
                'yellow' => 100,
                'key' => 0
            ),
            "167 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 100,
                'key' => 17
            ),
            "168 PC" => array(
                'cyan' => 0,
                'magenta' => 57,
                'yellow' => 100,
                'key' => 59
            ),
            "1625 PC" => array(
                'cyan' => 0,
                'magenta' => 31,
                'yellow' => 37,
                'key' => 0
            ),
            "1635 PC" => array(
                'cyan' => 0,
                'magenta' => 39,
                'yellow' => 48,
                'key' => 0
            ),
            "1645 PC" => array(
                'cyan' => 0,
                'magenta' => 49,
                'yellow' => 66,
                'key' => 0
            ),
            "1655 PC" => array(
                'cyan' => 0,
                'magenta' => 63,
                'yellow' => 91,
                'key' => 0
            ),
            "1665 PC" => array(
                'cyan' => 0,
                'magenta' => 68,
                'yellow' => 100,
                'key' => 0
            ),
            "1675 PC" => array(
                'cyan' => 0,
                'magenta' => 67,
                'yellow' => 100,
                'key' => 28
            ),
            "1685 PC" => array(
                'cyan' => 0,
                'magenta' => 68,
                'yellow' => 100,
                'key' => 44
            ),
            "169 PC" => array(
                'cyan' => 0,
                'magenta' => 20,
                'yellow' => 20,
                'key' => 0
            ),
            "170 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 44,
                'key' => 0
            ),
            "171 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 68,
                'key' => 0
            ),
            "172 PC" => array(
                'cyan' => 0,
                'magenta' => 66,
                'yellow' => 88,
                'key' => 0
            ),
            "173 PC" => array(
                'cyan' => 0,
                'magenta' => 69,
                'yellow' => 100,
                'key' => 4
            ),
            "174 PC" => array(
                'cyan' => 0,
                'magenta' => 70,
                'yellow' => 100,
                'key' => 36
            ),
            "175 PC" => array(
                'cyan' => 0,
                'magenta' => 65,
                'yellow' => 100,
                'key' => 60
            ),
            "176 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 18,
                'key' => 0
            ),
            "177 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 40,
                'key' => 0
            ),
            "178 PC" => array(
                'cyan' => 0,
                'magenta' => 59,
                'yellow' => 56,
                'key' => 0
            ),
            "Warm Red PC" => array(
                'cyan' => 0,
                'magenta' => 75,
                'yellow' => 90,
                'key' => 0
            ),
            "179 PC" => array(
                'cyan' => 0,
                'magenta' => 79,
                'yellow' => 100,
                'key' => 0
            ),
            "180 PC" => array(
                'cyan' => 0,
                'magenta' => 79,
                'yellow' => 100,
                'key' => 11
            ),
            "181 PC" => array(
                'cyan' => 0,
                'magenta' => 74,
                'yellow' => 100,
                'key' => 47
            ),
            "1765 PC" => array(
                'cyan' => 0,
                'magenta' => 38,
                'yellow' => 21,
                'key' => 0
            ),
            "1775 PC" => array(
                'cyan' => 0,
                'magenta' => 47,
                'yellow' => 29,
                'key' => 0
            ),
            "1785 PC" => array(
                'cyan' => 0,
                'magenta' => 67,
                'yellow' => 50,
                'key' => 0
            ),
            "1788 PC" => array(
                'cyan' => 0,
                'magenta' => 84,
                'yellow' => 88,
                'key' => 0
            ),
            "1795 PC" => array(
                'cyan' => 0,
                'magenta' => 94,
                'yellow' => 100,
                'key' => 0
            ),
            "1805 PC" => array(
                'cyan' => 0,
                'magenta' => 91,
                'yellow' => 100,
                'key' => 23
            ),
            "1815 PC" => array(
                'cyan' => 0,
                'magenta' => 90,
                'yellow' => 100,
                'key' => 51
            ),
            "1767 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 12,
                'key' => 0
            ),
            "1777 PC" => array(
                'cyan' => 0,
                'magenta' => 58,
                'yellow' => 36,
                'key' => 0
            ),
            "1787 PC" => array(
                'cyan' => 0,
                'magenta' => 76,
                'yellow' => 60,
                'key' => 0
            ),
            "Red 032 PC" => array(
                'cyan' => 0,
                'magenta' => 90,
                'yellow' => 86,
                'key' => 0
            ),
            "1797 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 99,
                'key' => 4
            ),
            "1807 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 96,
                'key' => 28
            ),
            "1817 PC" => array(
                'cyan' => 0,
                'magenta' => 90,
                'yellow' => 100,
                'key' => 66
            ),
            "182 PC" => array(
                'cyan' => 0,
                'magenta' => 26,
                'yellow' => 10,
                'key' => 0
            ),
            "183 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 21,
                'key' => 0
            ),
            "184 PC" => array(
                'cyan' => 0,
                'magenta' => 68,
                'yellow' => 41,
                'key' => 0
            ),
            "185 PC" => array(
                'cyan' => 0,
                'magenta' => 91,
                'yellow' => 76,
                'key' => 0
            ),
            "186 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 81,
                'key' => 4
            ),
            "187 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 79,
                'key' => 20
            ),
            "188 PC" => array(
                'cyan' => 0,
                'magenta' => 97,
                'yellow' => 100,
                'key' => 50
            ),
            "189 PC" => array(
                'cyan' => 0,
                'magenta' => 37,
                'yellow' => 10,
                'key' => 0
            ),
            "190 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 22,
                'key' => 0
            ),
            "191 PC" => array(
                'cyan' => 0,
                'magenta' => 76,
                'yellow' => 38,
                'key' => 0
            ),
            "192 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 68,
                'key' => 0
            ),
            "193 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 66,
                'key' => 13
            ),
            "194 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 64,
                'key' => 33
            ),
            "195 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 60,
                'key' => 55
            ),
            "1895 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 7,
                'key' => 0
            ),
            "1905 PC" => array(
                'cyan' => 0,
                'magenta' => 41,
                'yellow' => 9,
                'key' => 0
            ),
            "1915 PC" => array(
                'cyan' => 0,
                'magenta' => 71,
                'yellow' => 20,
                'key' => 0
            ),
            "1925 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 55,
                'key' => 0
            ),
            "1935 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 57,
                'key' => 5
            ),
            "1945 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 56,
                'key' => 19
            ),
            "1955 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 60,
                'key' => 37
            ),
            "196 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 4,
                'key' => 0
            ),
            "197 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 10,
                'key' => 0
            ),
            "198 PC" => array(
                'cyan' => 0,
                'magenta' => 78,
                'yellow' => 33,
                'key' => 0
            ),
            "199 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 62,
                'key' => 0
            ),
            "200 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 63,
                'key' => 12
            ),
            "201 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 63,
                'key' => 29
            ),
            "202 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 61,
                'key' => 43
            ),
            "203 PC" => array(
                'cyan' => 0,
                'magenta' => 34,
                'yellow' => 3,
                'key' => 0
            ),
            "204 PC" => array(
                'cyan' => 0,
                'magenta' => 58,
                'yellow' => 3,
                'key' => 0
            ),
            "205 PC" => array(
                'cyan' => 0,
                'magenta' => 84,
                'yellow' => 9,
                'key' => 0
            ),
            "206 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 38,
                'key' => 3
            ),
            "207 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 43,
                'key' => 19
            ),
            "208 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 36,
                'key' => 37
            ),
            "209 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 34,
                'key' => 53
            ),
            "210 PC" => array(
                'cyan' => 0,
                'magenta' => 39,
                'yellow' => 6,
                'key' => 0
            ),
            "211 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 8,
                'key' => 0
            ),
            "212 PC" => array(
                'cyan' => 0,
                'magenta' => 72,
                'yellow' => 11,
                'key' => 0
            ),
            "213 PC" => array(
                'cyan' => 0,
                'magenta' => 95,
                'yellow' => 27,
                'key' => 0
            ),
            "214 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 34,
                'key' => 8
            ),
            "215 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 35,
                'key' => 27
            ),
            "216 PC" => array(
                'cyan' => 0,
                'magenta' => 95,
                'yellow' => 40,
                'key' => 49
            ),
            "217 PC" => array(
                'cyan' => 0,
                'magenta' => 28,
                'yellow' => 0,
                'key' => 0
            ),
            "218 PC" => array(
                'cyan' => 2,
                'magenta' => 61,
                'yellow' => 0,
                'key' => 0
            ),
            "219 PC" => array(
                'cyan' => 1,
                'magenta' => 88,
                'yellow' => 0,
                'key' => 0
            ),
            "Rub. Red PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 15,
                'key' => 4
            ),
            "220 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 13,
                'key' => 17
            ),
            "221 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 15,
                'key' => 30
            ),
            "222 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 10,
                'key' => 59
            ),
            "223 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 0,
                'key' => 0
            ),
            "224 PC" => array(
                'cyan' => 1,
                'magenta' => 63,
                'yellow' => 0,
                'key' => 0
            ),
            "225 PC" => array(
                'cyan' => 1,
                'magenta' => 83,
                'yellow' => 0,
                'key' => 0
            ),
            "226 PC" => array(
                'cyan' => 0,
                'magenta' => 99,
                'yellow' => 0,
                'key' => 0
            ),
            "227 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 7,
                'key' => 19
            ),
            "228 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 4,
                'key' => 41
            ),
            "229 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 15,
                'key' => 60
            ),
            "230 PC" => array(
                'cyan' => 0,
                'magenta' => 34,
                'yellow' => 0,
                'key' => 0
            ),
            "231 PC" => array(
                'cyan' => 1,
                'magenta' => 52,
                'yellow' => 0,
                'key' => 0
            ),
            "232 PC" => array(
                'cyan' => 3,
                'magenta' => 67,
                'yellow' => 0,
                'key' => 0
            ),
            "Rhod. Red PC" => array(
                'cyan' => 3,
                'magenta' => 89,
                'yellow' => 0,
                'key' => 0
            ),
            "233 PC" => array(
                'cyan' => 11,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "234 PC" => array(
                'cyan' => 6,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 26
            ),
            "235 PC" => array(
                'cyan' => 5,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 40
            ),
            "236 PC" => array(
                'cyan' => 1,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 0
            ),
            "237 PC" => array(
                'cyan' => 3,
                'magenta' => 49,
                'yellow' => 0,
                'key' => 0
            ),
            "238 PC" => array(
                'cyan' => 6,
                'magenta' => 63,
                'yellow' => 0,
                'key' => 0
            ),
            "239 PC" => array(
                'cyan' => 11,
                'magenta' => 79,
                'yellow' => 0,
                'key' => 0
            ),
            "240 PC" => array(
                'cyan' => 18,
                'magenta' => 94,
                'yellow' => 0,
                'key' => 0
            ),
            "241 PC" => array(
                'cyan' => 27,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 2
            ),
            "242 PC" => array(
                'cyan' => 10,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 49
            ),
            "2365 PC" => array(
                'cyan' => 2,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 0
            ),
            "2375 PC" => array(
                'cyan' => 10,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 0
            ),
            "2385 PC" => array(
                'cyan' => 19,
                'magenta' => 79,
                'yellow' => 0,
                'key' => 0
            ),
            "2395 PC" => array(
                'cyan' => 27,
                'magenta' => 95,
                'yellow' => 0,
                'key' => 0
            ),
            "2405 PC" => array(
                'cyan' => 34,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "2415 PC" => array(
                'cyan' => 33,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 8
            ),
            "2425 PC" => array(
                'cyan' => 37,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 26
            ),
            "243 PC" => array(
                'cyan' => 5,
                'magenta' => 29,
                'yellow' => 0,
                'key' => 0
            ),
            "244 PC" => array(
                'cyan' => 9,
                'magenta' => 38,
                'yellow' => 0,
                'key' => 0
            ),
            "245 PC" => array(
                'cyan' => 14,
                'magenta' => 53,
                'yellow' => 0,
                'key' => 0
            ),
            "246 PC" => array(
                'cyan' => 29,
                'magenta' => 90,
                'yellow' => 0,
                'key' => 0
            ),
            "247 PC" => array(
                'cyan' => 36,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "248 PC" => array(
                'cyan' => 40,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 2
            ),
            "249 PC" => array(
                'cyan' => 40,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 28
            ),
            "250 PC" => array(
                'cyan' => 5,
                'magenta' => 18,
                'yellow' => 0,
                'key' => 0
            ),
            "251 PC" => array(
                'cyan' => 13,
                'magenta' => 39,
                'yellow' => 0,
                'key' => 0
            ),
            "252 PC" => array(
                'cyan' => 24,
                'magenta' => 56,
                'yellow' => 0,
                'key' => 0
            ),
            "Purple PC" => array(
                'cyan' => 38,
                'magenta' => 88,
                'yellow' => 0,
                'key' => 0
            ),
            "253 PC" => array(
                'cyan' => 43,
                'magenta' => 95,
                'yellow' => 0,
                'key' => 0
            ),
            "254 PC" => array(
                'cyan' => 50,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "255 PC" => array(
                'cyan' => 51,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 25
            ),
            "256 PC" => array(
                'cyan' => 7,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 0
            ),
            "257 PC" => array(
                'cyan' => 14,
                'magenta' => 34,
                'yellow' => 0,
                'key' => 0
            ),
            "258 PC" => array(
                'cyan' => 43,
                'magenta' => 76,
                'yellow' => 0,
                'key' => 0
            ),
            "259 PC" => array(
                'cyan' => 55,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 15
            ),
            "260 PC" => array(
                'cyan' => 52,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 26
            ),
            "261 PC" => array(
                'cyan' => 48,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 40
            ),
            "262 PC" => array(
                'cyan' => 45,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 55
            ),
            "2562 PC" => array(
                'cyan' => 19,
                'magenta' => 35,
                'yellow' => 0,
                'key' => 0
            ),
            "2572 PC" => array(
                'cyan' => 30,
                'magenta' => 47,
                'yellow' => 0,
                'key' => 0
            ),
            "2582 PC" => array(
                'cyan' => 46,
                'magenta' => 72,
                'yellow' => 0,
                'key' => 0
            ),
            "2592 PC" => array(
                'cyan' => 60,
                'magenta' => 90,
                'yellow' => 0,
                'key' => 0
            ),
            "2602 PC" => array(
                'cyan' => 63,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 3
            ),
            "2612 PC" => array(
                'cyan' => 64,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 14
            ),
            "2622 PC" => array(
                'cyan' => 57,
                'magenta' => 98,
                'yellow' => 0,
                'key' => 46
            ),
            "2563 PC" => array(
                'cyan' => 22,
                'magenta' => 33,
                'yellow' => 0,
                'key' => 0
            ),
            "2573 PC" => array(
                'cyan' => 30,
                'magenta' => 43,
                'yellow' => 0,
                'key' => 0
            ),
            "2583 PC" => array(
                'cyan' => 46,
                'magenta' => 63,
                'yellow' => 0,
                'key' => 0
            ),
            "2593 PC" => array(
                'cyan' => 61,
                'magenta' => 89,
                'yellow' => 0,
                'key' => 0
            ),
            "2603 PC" => array(
                'cyan' => 69,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 2
            ),
            "2613 PC" => array(
                'cyan' => 63,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 15
            ),
            "2623 PC" => array(
                'cyan' => 59,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 32
            ),
            "2567 PC" => array(
                'cyan' => 29,
                'magenta' => 36,
                'yellow' => 0,
                'key' => 0
            ),
            "2577 PC" => array(
                'cyan' => 40,
                'magenta' => 45,
                'yellow' => 0,
                'key' => 0
            ),
            "2587 PC" => array(
                'cyan' => 59,
                'magenta' => 66,
                'yellow' => 0,
                'key' => 0
            ),
            "2597 PC" => array(
                'cyan' => 85,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "2607 PC" => array(
                'cyan' => 81,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 7
            ),
            "2617 PC" => array(
                'cyan' => 79,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 15
            ),
            "2627 PC" => array(
                'cyan' => 77,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 31
            ),
            "263 PC" => array(
                'cyan' => 10,
                'magenta' => 14,
                'yellow' => 0,
                'key' => 0
            ),
            "264 PC" => array(
                'cyan' => 26,
                'magenta' => 28,
                'yellow' => 0,
                'key' => 0
            ),
            "265 PC" => array(
                'cyan' => 54,
                'magenta' => 56,
                'yellow' => 0,
                'key' => 0
            ),
            "266 PC" => array(
                'cyan' => 79,
                'magenta' => 90,
                'yellow' => 0,
                'key' => 0
            ),
            "267 PC" => array(
                'cyan' => 89,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "268 PC" => array(
                'cyan' => 82,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 12
            ),
            "269 PC" => array(
                'cyan' => 78,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 33
            ),
            "2635 PC" => array(
                'cyan' => 28,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 0
            ),
            "2645 PC" => array(
                'cyan' => 40,
                'magenta' => 36,
                'yellow' => 0,
                'key' => 0
            ),
            "2655 PC" => array(
                'cyan' => 54,
                'magenta' => 49,
                'yellow' => 0,
                'key' => 0
            ),
            "2665 PC" => array(
                'cyan' => 62,
                'magenta' => 60,
                'yellow' => 0,
                'key' => 0
            ),
            "Violet PC" => array(
                'cyan' => 98,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "2685 PC" => array(
                'cyan' => 96,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 10
            ),
            "2695 PC" => array(
                'cyan' => 91,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 49
            ),
            "270 PC" => array(
                'cyan' => 31,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 0
            ),
            "271 PC" => array(
                'cyan' => 43,
                'magenta' => 37,
                'yellow' => 0,
                'key' => 0
            ),
            "272 PC" => array(
                'cyan' => 58,
                'magenta' => 48,
                'yellow' => 0,
                'key' => 0
            ),
            "273 PC" => array(
                'cyan' => 100,
                'magenta' => 96,
                'yellow' => 0,
                'key' => 8
            ),
            "274 PC" => array(
                'cyan' => 100,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 28
            ),
            "275 PC" => array(
                'cyan' => 98,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 43
            ),
            "276 PC" => array(
                'cyan' => 100,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 58
            ),
            "2705 PC" => array(
                'cyan' => 40,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 0
            ),
            "2715 PC" => array(
                'cyan' => 57,
                'magenta' => 45,
                'yellow' => 0,
                'key' => 0
            ),
            "2725 PC" => array(
                'cyan' => 77,
                'magenta' => 68,
                'yellow' => 0,
                'key' => 0
            ),
            "2735 PC" => array(
                'cyan' => 100,
                'magenta' => 95,
                'yellow' => 0,
                'key' => 3
            ),
            "2745 PC" => array(
                'cyan' => 100,
                'magenta' => 95,
                'yellow' => 0,
                'key' => 15
            ),
            "2755 PC" => array(
                'cyan' => 100,
                'magenta' => 97,
                'yellow' => 0,
                'key' => 30
            ),
            "2765 PC" => array(
                'cyan' => 100,
                'magenta' => 97,
                'yellow' => 0,
                'key' => 45
            ),
            "2706 PC" => array(
                'cyan' => 19,
                'magenta' => 9,
                'yellow' => 0,
                'key' => 0
            ),
            "2716 PC" => array(
                'cyan' => 45,
                'magenta' => 29,
                'yellow' => 0,
                'key' => 0
            ),
            "2726 PC" => array(
                'cyan' => 79,
                'magenta' => 66,
                'yellow' => 0,
                'key' => 0
            ),
            "2736 PC" => array(
                'cyan' => 100,
                'magenta' => 91,
                'yellow' => 0,
                'key' => 0
            ),
            "2746 PC" => array(
                'cyan' => 100,
                'magenta' => 92,
                'yellow' => 0,
                'key' => 10
            ),
            "2756 PC" => array(
                'cyan' => 100,
                'magenta' => 94,
                'yellow' => 0,
                'key' => 29
            ),
            "2766 PC" => array(
                'cyan' => 100,
                'magenta' => 94,
                'yellow' => 0,
                'key' => 47
            ),
            "2707 PC" => array(
                'cyan' => 17,
                'magenta' => 6,
                'yellow' => 0,
                'key' => 0
            ),
            "2717 PC" => array(
                'cyan' => 29,
                'magenta' => 12,
                'yellow' => 0,
                'key' => 0
            ),
            "2727 PC" => array(
                'cyan' => 71,
                'magenta' => 42,
                'yellow' => 0,
                'key' => 0
            ),
            "Blue 072 PC" => array(
                'cyan' => 100,
                'magenta' => 88,
                'yellow' => 0,
                'key' => 5
            ),
            "2747 PC" => array(
                'cyan' => 100,
                'magenta' => 85,
                'yellow' => 0,
                'key' => 13
            ),
            "2757 PC" => array(
                'cyan' => 100,
                'magenta' => 82,
                'yellow' => 0,
                'key' => 30
            ),
            "2767 PC" => array(
                'cyan' => 100,
                'magenta' => 78,
                'yellow' => 0,
                'key' => 54
            ),
            "2708 PC" => array(
                'cyan' => 26,
                'magenta' => 10,
                'yellow' => 0,
                'key' => 0
            ),
            "2718 PC" => array(
                'cyan' => 67,
                'magenta' => 41,
                'yellow' => 0,
                'key' => 0
            ),
            "2728 PC" => array(
                'cyan' => 96,
                'magenta' => 69,
                'yellow' => 0,
                'key' => 0
            ),
            "2738 PC" => array(
                'cyan' => 100,
                'magenta' => 87,
                'yellow' => 0,
                'key' => 2
            ),
            "2748 PC" => array(
                'cyan' => 100,
                'magenta' => 88,
                'yellow' => 0,
                'key' => 14
            ),
            "2758 PC" => array(
                'cyan' => 100,
                'magenta' => 80,
                'yellow' => 0,
                'key' => 26
            ),
            "2768 PC" => array(
                'cyan' => 100,
                'magenta' => 78,
                'yellow' => 0,
                'key' => 44
            ),
            "277 PC" => array(
                'cyan' => 27,
                'magenta' => 7,
                'yellow' => 0,
                'key' => 0
            ),
            "278 PC" => array(
                'cyan' => 39,
                'magenta' => 14,
                'yellow' => 0,
                'key' => 0
            ),
            "279 PC" => array(
                'cyan' => 68,
                'magenta' => 34,
                'yellow' => 0,
                'key' => 0
            ),
            "Ref. Blue PC" => array(
                'cyan' => 100,
                'magenta' => 73,
                'yellow' => 0,
                'key' => 2
            ),
            "280 PC" => array(
                'cyan' => 100,
                'magenta' => 72,
                'yellow' => 0,
                'key' => 18
            ),
            "281 PC" => array(
                'cyan' => 100,
                'magenta' => 72,
                'yellow' => 0,
                'key' => 32
            ),
            "282 PC" => array(
                'cyan' => 100,
                'magenta' => 68,
                'yellow' => 0,
                'key' => 54
            ),
            "283 PC" => array(
                'cyan' => 35,
                'magenta' => 9,
                'yellow' => 0,
                'key' => 0
            ),
            "284 PC" => array(
                'cyan' => 55,
                'magenta' => 19,
                'yellow' => 0,
                'key' => 0
            ),
            "285 PC" => array(
                'cyan' => 89,
                'magenta' => 43,
                'yellow' => 0,
                'key' => 0
            ),
            "286 PC" => array(
                'cyan' => 100,
                'magenta' => 66,
                'yellow' => 0,
                'key' => 2
            ),
            "287 PC" => array(
                'cyan' => 100,
                'magenta' => 68,
                'yellow' => 0,
                'key' => 12
            ),
            "288 PC" => array(
                'cyan' => 100,
                'magenta' => 67,
                'yellow' => 0,
                'key' => 23
            ),
            "289 PC" => array(
                'cyan' => 100,
                'magenta' => 64,
                'yellow' => 0,
                'key' => 60
            ),
            "290 PC" => array(
                'cyan' => 25,
                'magenta' => 2,
                'yellow' => 0,
                'key' => 0
            ),
            "291 PC" => array(
                'cyan' => 33,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 0
            ),
            "292 PC" => array(
                'cyan' => 49,
                'magenta' => 11,
                'yellow' => 0,
                'key' => 0
            ),
            "293 PC" => array(
                'cyan' => 100,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 2
            ),
            "294 PC" => array(
                'cyan' => 100,
                'magenta' => 58,
                'yellow' => 0,
                'key' => 21
            ),
            "295 PC" => array(
                'cyan' => 100,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 40
            ),
            "296 PC" => array(
                'cyan' => 100,
                'magenta' => 46,
                'yellow' => 0,
                'key' => 70
            ),
            "2905 PC" => array(
                'cyan' => 41,
                'magenta' => 2,
                'yellow' => 0,
                'key' => 0
            ),
            "2915 PC" => array(
                'cyan' => 59,
                'magenta' => 7,
                'yellow' => 0,
                'key' => 0
            ),
            "2925 PC" => array(
                'cyan' => 85,
                'magenta' => 24,
                'yellow' => 0,
                'key' => 0
            ),
            "2935 PC" => array(
                'cyan' => 100,
                'magenta' => 46,
                'yellow' => 0,
                'key' => 0
            ),
            "2945 PC" => array(
                'cyan' => 100,
                'magenta' => 45,
                'yellow' => 0,
                'key' => 14
            ),
            "2955 PC" => array(
                'cyan' => 100,
                'magenta' => 45,
                'yellow' => 0,
                'key' => 37
            ),
            "2965 PC" => array(
                'cyan' => 100,
                'magenta' => 38,
                'yellow' => 0,
                'key' => 64
            ),
            "297 PC" => array(
                'cyan' => 49,
                'magenta' => 1,
                'yellow' => 0,
                'key' => 0
            ),
            "298 PC" => array(
                'cyan' => 69,
                'magenta' => 7,
                'yellow' => 0,
                'key' => 0
            ),
            "299 PC" => array(
                'cyan' => 85,
                'magenta' => 19,
                'yellow' => 0,
                'key' => 0
            ),
            "300 PC" => array(
                'cyan' => 100,
                'magenta' => 44,
                'yellow' => 0,
                'key' => 0
            ),
            "301 PC" => array(
                'cyan' => 100,
                'magenta' => 45,
                'yellow' => 0,
                'key' => 18
            ),
            "302 PC" => array(
                'cyan' => 100,
                'magenta' => 25,
                'yellow' => 0,
                'key' => 50
            ),
            "303 PC" => array(
                'cyan' => 100,
                'magenta' => 11,
                'yellow' => 0,
                'key' => 74
            ),
            "2975 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 0
            ),
            "2985 PC" => array(
                'cyan' => 59,
                'magenta' => 0,
                'yellow' => 6,
                'key' => 0
            ),
            "2995 PC" => array(
                'cyan' => 90,
                'magenta' => 11,
                'yellow' => 0,
                'key' => 0
            ),
            "3005 PC" => array(
                'cyan' => 100,
                'magenta' => 34,
                'yellow' => 0,
                'key' => 2
            ),
            "3015 PC" => array(
                'cyan' => 100,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 20
            ),
            "3025 PC" => array(
                'cyan' => 100,
                'magenta' => 17,
                'yellow' => 0,
                'key' => 51
            ),
            "3035 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 72
            ),
            "304 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 8,
                'key' => 0
            ),
            "305 PC" => array(
                'cyan' => 51,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 0
            ),
            "306 PC" => array(
                'cyan' => 75,
                'magenta' => 0,
                'yellow' => 7,
                'key' => 0
            ),
            "Proc. Blue PC" => array(
                'cyan' => 100,
                'magenta' => 10,
                'yellow' => 0,
                'key' => 10
            ),
            "307 PC" => array(
                'cyan' => 100,
                'magenta' => 16,
                'yellow' => 0,
                'key' => 27
            ),
            "308 PC" => array(
                'cyan' => 100,
                'magenta' => 5,
                'yellow' => 0,
                'key' => 47
            ),
            "309 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 72
            ),
            "310 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 0
            ),
            "311 PC" => array(
                'cyan' => 63,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 0
            ),
            "312 PC" => array(
                'cyan' => 96,
                'magenta' => 0,
                'yellow' => 11,
                'key' => 0
            ),
            "313 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 8,
                'key' => 13
            ),
            "314 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 30
            ),
            "315 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 43
            ),
            "316 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 27,
                'key' => 68
            ),
            "3105 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 0
            ),
            "3115 PC" => array(
                'cyan' => 63,
                'magenta' => 0,
                'yellow' => 18,
                'key' => 0
            ),
            "3125 PC" => array(
                'cyan' => 83,
                'magenta' => 0,
                'yellow' => 21,
                'key' => 0
            ),
            "3135 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 9
            ),
            "3145 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 19,
                'key' => 23
            ),
            "3155 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 38
            ),
            "3165 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 28,
                'key' => 65
            ),
            "317 PC" => array(
                'cyan' => 18,
                'magenta' => 0,
                'yellow' => 8,
                'key' => 0
            ),
            "318 PC" => array(
                'cyan' => 38,
                'magenta' => 0,
                'yellow' => 15,
                'key' => 0
            ),
            "319 PC" => array(
                'cyan' => 52,
                'magenta' => 0,
                'yellow' => 19,
                'key' => 0
            ),
            "320 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 7
            ),
            "321 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 23
            ),
            "322 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 35
            ),
            "323 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 38,
                'key' => 47
            ),
            "324 PC" => array(
                'cyan' => 28,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 0
            ),
            "325 PC" => array(
                'cyan' => 56,
                'magenta' => 0,
                'yellow' => 26,
                'key' => 0
            ),
            "326 PC" => array(
                'cyan' => 87,
                'magenta' => 0,
                'yellow' => 38,
                'key' => 0
            ),
            "327 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 44,
                'key' => 17
            ),
            "328 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 45,
                'key' => 32
            ),
            "329 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 46,
                'key' => 46
            ),
            "330 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 48,
                'key' => 60
            ),
            "3242 PC" => array(
                'cyan' => 37,
                'magenta' => 0,
                'yellow' => 18,
                'key' => 0
            ),
            "3252 PC" => array(
                'cyan' => 47,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 0
            ),
            "3262 PC" => array(
                'cyan' => 71,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 0
            ),
            "3272 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 44,
                'key' => 0
            ),
            "3282 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 46,
                'key' => 15
            ),
            "3292 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 49,
                'key' => 46
            ),
            "3302 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 54,
                'key' => 69
            ),
            "3245 PC" => array(
                'cyan' => 34,
                'magenta' => 0,
                'yellow' => 19,
                'key' => 0
            ),
            "3255 PC" => array(
                'cyan' => 49,
                'magenta' => 0,
                'yellow' => 28,
                'key' => 0
            ),
            "3265 PC" => array(
                'cyan' => 69,
                'magenta' => 0,
                'yellow' => 37,
                'key' => 0
            ),
            "3275 PC" => array(
                'cyan' => 95,
                'magenta' => 0,
                'yellow' => 47,
                'key' => 0
            ),
            "3285 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 7
            ),
            "3295 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 53,
                'key' => 21
            ),
            "3305 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 61,
                'key' => 61
            ),
            "3248 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 0
            ),
            "3258 PC" => array(
                'cyan' => 59,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 0
            ),
            "3268 PC" => array(
                'cyan' => 90,
                'magenta' => 0,
                'yellow' => 49,
                'key' => 0
            ),
            "3278 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 55,
                'key' => 5
            ),
            "3288 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 54,
                'key' => 20
            ),
            "3298 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 57,
                'key' => 42
            ),
            "3308 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 60,
                'key' => 72
            ),
            "331 PC" => array(
                'cyan' => 24,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 0
            ),
            "332 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 0
            ),
            "333 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 27,
                'key' => 0
            ),
            "Green PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 59,
                'key' => 0
            ),
            "334 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 60,
                'key' => 3
            ),
            "335 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 65,
                'key' => 30
            ),
            "336 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 67,
                'key' => 47
            ),
            "337 PC" => array(
                'cyan' => 31,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 0
            ),
            "338 PC" => array(
                'cyan' => 47,
                'magenta' => 0,
                'yellow' => 32,
                'key' => 0
            ),
            "339 PC" => array(
                'cyan' => 84,
                'magenta' => 0,
                'yellow' => 56,
                'key' => 0
            ),
            "340 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 66,
                'key' => 9
            ),
            "341 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 67,
                'key' => 29
            ),
            "342 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 71,
                'key' => 43
            ),
            "343 PC" => array(
                'cyan' => 98,
                'magenta' => 0,
                'yellow' => 72,
                'key' => 61
            ),
            "3375 PC" => array(
                'cyan' => 35,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 0
            ),
            "3385 PC" => array(
                'cyan' => 45,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 0
            ),
            "3395 PC" => array(
                'cyan' => 61,
                'magenta' => 0,
                'yellow' => 45,
                'key' => 0
            ),
            "3405 PC" => array(
                'cyan' => 85,
                'magenta' => 0,
                'yellow' => 65,
                'key' => 0
            ),
            "3415 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 77,
                'key' => 22
            ),
            "3425 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 78,
                'key' => 42
            ),
            "3435 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 81,
                'key' => 66
            ),
            "344 PC" => array(
                'cyan' => 27,
                'magenta' => 0,
                'yellow' => 23,
                'key' => 0
            ),
            "345 PC" => array(
                'cyan' => 38,
                'magenta' => 0,
                'yellow' => 32,
                'key' => 0
            ),
            "346 PC" => array(
                'cyan' => 55,
                'magenta' => 0,
                'yellow' => 47,
                'key' => 0
            ),
            "347 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 86,
                'key' => 3
            ),
            "348 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 24
            ),
            "349 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 91,
                'key' => 42
            ),
            "350 PC" => array(
                'cyan' => 79,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 75
            ),
            "351 PC" => array(
                'cyan' => 17,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 0
            ),
            "352 PC" => array(
                'cyan' => 27,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 0
            ),
            "353 PC" => array(
                'cyan' => 38,
                'magenta' => 0,
                'yellow' => 36,
                'key' => 0
            ),
            "354 PC" => array(
                'cyan' => 80,
                'magenta' => 0,
                'yellow' => 90,
                'key' => 0
            ),
            "355 PC" => array(
                'cyan' => 94,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "356 PC" => array(
                'cyan' => 95,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 27
            ),
            "357 PC" => array(
                'cyan' => 80,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 56
            ),
            "358 PC" => array(
                'cyan' => 27,
                'magenta' => 0,
                'yellow' => 38,
                'key' => 0
            ),
            "359 PC" => array(
                'cyan' => 36,
                'magenta' => 0,
                'yellow' => 49,
                'key' => 0
            ),
            "360 PC" => array(
                'cyan' => 58,
                'magenta' => 0,
                'yellow' => 80,
                'key' => 0
            ),
            "361 PC" => array(
                'cyan' => 69,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "362 PC" => array(
                'cyan' => 70,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 9
            ),
            "363 PC" => array(
                'cyan' => 68,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 24
            ),
            "364 PC" => array(
                'cyan' => 65,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 42
            ),
            "365 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 29,
                'key' => 0
            ),
            "366 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 44,
                'key' => 0
            ),
            "367 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 59,
                'key' => 0
            ),
            "368 PC" => array(
                'cyan' => 57,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "369 PC" => array(
                'cyan' => 59,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 7
            ),
            "370 PC" => array(
                'cyan' => 56,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 27
            ),
            "371 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 56
            ),
            "372 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 0
            ),
            "373 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 46,
                'key' => 0
            ),
            "374 PC" => array(
                'cyan' => 24,
                'magenta' => 0,
                'yellow' => 57,
                'key' => 0
            ),
            "375 PC" => array(
                'cyan' => 41,
                'magenta' => 0,
                'yellow' => 78,
                'key' => 0
            ),
            "376 PC" => array(
                'cyan' => 50,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "377 PC" => array(
                'cyan' => 45,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 24
            ),
            "378 PC" => array(
                'cyan' => 34,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 60
            ),
            "379 PC" => array(
                'cyan' => 9,
                'magenta' => 0,
                'yellow' => 58,
                'key' => 0
            ),
            "380 PC" => array(
                'cyan' => 13,
                'magenta' => 0,
                'yellow' => 72,
                'key' => 0
            ),
            "381 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 91,
                'key' => 0
            ),
            "382 PC" => array(
                'cyan' => 29,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "383 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 19
            ),
            "384 PC" => array(
                'cyan' => 18,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 31
            ),
            "385 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 58
            ),
            "386 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 56,
                'key' => 0
            ),
            "387 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 74,
                'key' => 0
            ),
            "388 PC" => array(
                'cyan' => 14,
                'magenta' => 0,
                'yellow' => 79,
                'key' => 0
            ),
            "389 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 0
            ),
            "390 PC" => array(
                'cyan' => 22,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 8
            ),
            "391 PC" => array(
                'cyan' => 13,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 33
            ),
            "392 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 49
            ),
            "393 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 55,
                'key' => 0
            ),
            "394 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 76,
                'key' => 0
            ),
            "395 PC" => array(
                'cyan' => 8,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 0
            ),
            "396 PC" => array(
                'cyan' => 11,
                'magenta' => 0,
                'yellow' => 94,
                'key' => 0
            ),
            "397 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 11
            ),
            "398 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 28
            ),
            "399 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 43
            ),
            "3935 PC" => array(
                'cyan' => 1,
                'magenta' => 0,
                'yellow' => 68,
                'key' => 0
            ),
            "3945 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 0
            ),
            "3955 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "3965 PC" => array(
                'cyan' => 8,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 0
            ),
            "3975 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 29
            ),
            "3985 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 100,
                'key' => 41
            ),
            "3995 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 100,
                'key' => 64
            ),
            "400 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 6,
                'key' => 16
            ),
            "401 PC" => array(
                'cyan' => 0,
                'magenta' => 5,
                'yellow' => 11,
                'key' => 23
            ),
            "402 PC" => array(
                'cyan' => 0,
                'magenta' => 6,
                'yellow' => 14,
                'key' => 31
            ),
            "403 PC" => array(
                'cyan' => 0,
                'magenta' => 7,
                'yellow' => 17,
                'key' => 43
            ),
            "404 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 22,
                'key' => 56
            ),
            "405 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 33,
                'key' => 72
            ),
            "b PC" => array(
                'cyan' => 0,
                'magenta' => 13,
                'yellow' => 49,
                'key' => 98
            ),
            "406 PC" => array(
                'cyan' => 0,
                'magenta' => 5,
                'yellow' => 6,
                'key' => 16
            ),
            "407 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 9,
                'key' => 26
            ),
            "408 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 11,
                'key' => 34
            ),
            "409 PC" => array(
                'cyan' => 0,
                'magenta' => 13,
                'yellow' => 15,
                'key' => 45
            ),
            "410 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 21,
                'key' => 56
            ),
            "411 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 36,
                'key' => 72
            ),
            "412 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 66,
                'key' => 98
            ),
            "413 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 20
            ),
            "414 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 30
            ),
            "415 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 41
            ),
            "416 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 50
            ),
            "417 PC" => array(
                'cyan' => 1,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 65
            ),
            "418 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 75
            ),
            "419 PC" => array(
                'cyan' => 29,
                'magenta' => 0,
                'yellow' => 36,
                'key' => 100
            ),
            "420 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 15
            ),
            "421 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 26
            ),
            "422 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 33
            ),
            "423 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 44
            ),
            "424 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 61
            ),
            "425 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 77
            ),
            "426 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 99
            ),
            "427 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 11
            ),
            "428 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 18
            ),
            "429 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 32
            ),
            "430 PC" => array(
                'cyan' => 5,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 45
            ),
            "431 PC" => array(
                'cyan' => 11,
                'magenta' => 1,
                'yellow' => 0,
                'key' => 64
            ),
            "432 PC" => array(
                'cyan' => 23,
                'magenta' => 2,
                'yellow' => 0,
                'key' => 77
            ),
            "433 PC" => array(
                'cyan' => 33,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 95
            ),
            "434 PC" => array(
                'cyan' => 7,
                'magenta' => 9,
                'yellow' => 10,
                'key' => 0
            ),
            "435 PC" => array(
                'cyan' => 13,
                'magenta' => 15,
                'yellow' => 15,
                'key' => 0
            ),
            "436 PC" => array(
                'cyan' => 24,
                'magenta' => 25,
                'yellow' => 26,
                'key' => 0
            ),
            "437 PC" => array(
                'cyan' => 46,
                'magenta' => 45,
                'yellow' => 49,
                'key' => 0
            ),
            "438 PC" => array(
                'cyan' => 75,
                'magenta' => 68,
                'yellow' => 100,
                'key' => 10
            ),
            "439 PC" => array(
                'cyan' => 80,
                'magenta' => 73,
                'yellow' => 100,
                'key' => 20
            ),
            "440 PC" => array(
                'cyan' => 82,
                'magenta' => 76,
                'yellow' => 100,
                'key' => 30
            ),
            "441 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 7,
                'key' => 9
            ),
            "442 PC" => array(
                'cyan' => 8,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 19
            ),
            "443 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 30
            ),
            "444 PC" => array(
                'cyan' => 15,
                'magenta' => 0,
                'yellow' => 15,
                'key' => 42
            ),
            "445 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 65
            ),
            "446 PC" => array(
                'cyan' => 21,
                'magenta' => 0,
                'yellow' => 23,
                'key' => 75
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "447 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 82
            ),
            "b 2 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 55,
                'key' => 87
            ),
            "b 3 PC" => array(
                'cyan' => 60,
                'magenta' => 0,
                'yellow' => 60,
                'key' => 91
            ),
            "b 4 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 100,
                'key' => 89
            ),
            "b 5 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 22,
                'key' => 87
            ),
            "b 6 PC" => array(
                'cyan' => 100,
                'magenta' => 35,
                'yellow' => 0,
                'key' => 100
            ),
            "b 7 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 15,
                'key' => 82
            ),
            "448 PC" => array(
                'cyan' => 65,
                'magenta' => 58,
                'yellow' => 100,
                'key' => 35
            ),
            "449 PC" => array(
                'cyan' => 65,
                'magenta' => 55,
                'yellow' => 100,
                'key' => 28
            ),
            "450 PC" => array(
                'cyan' => 60,
                'magenta' => 50,
                'yellow' => 100,
                'key' => 22
            ),
            "451 PC" => array(
                'cyan' => 33,
                'magenta' => 28,
                'yellow' => 58,
                'key' => 0
            ),
            "452 PC" => array(
                'cyan' => 24,
                'magenta' => 18,
                'yellow' => 42,
                'key' => 0
            ),
            "453 PC" => array(
                'cyan' => 14,
                'magenta' => 10,
                'yellow' => 27,
                'key' => 0
            ),
            "454 PC" => array(
                'cyan' => 9,
                'magenta' => 6,
                'yellow' => 17,
                'key' => 0
            ),
            "4485 PC" => array(
                'cyan' => 0,
                'magenta' => 26,
                'yellow' => 100,
                'key' => 69
            ),
            "4495 PC" => array(
                'cyan' => 0,
                'magenta' => 20,
                'yellow' => 95,
                'key' => 46
            ),
            "4505 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 78,
                'key' => 36
            ),
            "4515 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 50,
                'key' => 24
            ),
            "4525 PC" => array(
                'cyan' => 0,
                'magenta' => 7,
                'yellow' => 39,
                'key' => 17
            ),
            "4535 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 30,
                'key' => 11
            ),
            "4545 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 19,
                'key' => 6
            ),
            "455 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 100,
                'key' => 65
            ),
            "456 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 100,
                'key' => 43
            ),
            "457 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 100,
                'key' => 28
            ),
            "458 PC" => array(
                'cyan' => 10,
                'magenta' => 10,
                'yellow' => 73,
                'key' => 0
            ),
            "459 PC" => array(
                'cyan' => 6,
                'magenta' => 7,
                'yellow' => 55,
                'key' => 0
            ),
            "460 PC" => array(
                'cyan' => 4,
                'magenta' => 5,
                'yellow' => 44,
                'key' => 0
            ),
            "461 PC" => array(
                'cyan' => 3,
                'magenta' => 3,
                'yellow' => 35,
                'key' => 0
            ),
            "462 PC" => array(
                'cyan' => 50,
                'magenta' => 58,
                'yellow' => 100,
                'key' => 45
            ),
            "463 PC" => array(
                'cyan' => 30,
                'magenta' => 56,
                'yellow' => 100,
                'key' => 37
            ),
            "464 PC" => array(
                'cyan' => 10,
                'magenta' => 49,
                'yellow' => 100,
                'key' => 35
            ),
            "465 PC" => array(
                'cyan' => 20,
                'magenta' => 32,
                'yellow' => 58,
                'key' => 0
            ),
            "466 PC" => array(
                'cyan' => 12,
                'magenta' => 22,
                'yellow' => 43,
                'key' => 0
            ),
            "467 PC" => array(
                'cyan' => 9,
                'magenta' => 15,
                'yellow' => 34,
                'key' => 0
            ),
            "468 PC" => array(
                'cyan' => 6,
                'magenta' => 9,
                'yellow' => 23,
                'key' => 0
            ),
            "4625 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 100,
                'key' => 79
            ),
            "4635 PC" => array(
                'cyan' => 0,
                'magenta' => 48,
                'yellow' => 96,
                'key' => 44
            ),
            "4645 PC" => array(
                'cyan' => 0,
                'magenta' => 37,
                'yellow' => 68,
                'key' => 28
            ),
            "4655 PC" => array(
                'cyan' => 0,
                'magenta' => 26,
                'yellow' => 45,
                'key' => 18
            ),
            "4665 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 32,
                'key' => 10
            ),
            "4675 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 21,
                'key' => 6
            ),
            "4685 PC" => array(
                'cyan' => 0,
                'magenta' => 7,
                'yellow' => 14,
                'key' => 4
            ),
            "469 PC" => array(
                'cyan' => 0,
                'magenta' => 52,
                'yellow' => 100,
                'key' => 62
            ),
            "470 PC" => array(
                'cyan' => 0,
                'magenta' => 58,
                'yellow' => 100,
                'key' => 33
            ),
            "471 PC" => array(
                'cyan' => 0,
                'magenta' => 59,
                'yellow' => 100,
                'key' => 18
            ),
            "472 PC" => array(
                'cyan' => 0,
                'magenta' => 34,
                'yellow' => 52,
                'key' => 0
            ),
            "473 PC" => array(
                'cyan' => 0,
                'magenta' => 23,
                'yellow' => 36,
                'key' => 0
            ),
            "474 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 26,
                'key' => 0
            ),
            "475 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 20,
                'key' => 0
            ),
            "4695 PC" => array(
                'cyan' => 0,
                'magenta' => 81,
                'yellow' => 100,
                'key' => 77
            ),
            "4705 PC" => array(
                'cyan' => 0,
                'magenta' => 62,
                'yellow' => 71,
                'key' => 49
            ),
            "4715 PC" => array(
                'cyan' => 0,
                'magenta' => 42,
                'yellow' => 45,
                'key' => 34
            ),
            "4725 PC" => array(
                'cyan' => 0,
                'magenta' => 32,
                'yellow' => 35,
                'key' => 25
            ),
            "4735 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 23,
                'key' => 15
            ),
            "4745 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 18,
                'key' => 10
            ),
            "4755 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 12,
                'key' => 6
            ),
            "476 PC" => array(
                'cyan' => 57,
                'magenta' => 80,
                'yellow' => 100,
                'key' => 45
            ),
            "477 PC" => array(
                'cyan' => 50,
                'magenta' => 85,
                'yellow' => 100,
                'key' => 35
            ),
            "478 PC" => array(
                'cyan' => 40,
                'magenta' => 86,
                'yellow' => 100,
                'key' => 30
            ),
            "479 PC" => array(
                'cyan' => 30,
                'magenta' => 48,
                'yellow' => 57,
                'key' => 0
            ),
            "480 PC" => array(
                'cyan' => 15,
                'magenta' => 29,
                'yellow' => 33,
                'key' => 0
            ),
            "481 PC" => array(
                'cyan' => 9,
                'magenta' => 19,
                'yellow' => 23,
                'key' => 0
            ),
            "482 PC" => array(
                'cyan' => 5,
                'magenta' => 11,
                'yellow' => 15,
                'key' => 0
            ),
            "483 PC" => array(
                'cyan' => 0,
                'magenta' => 91,
                'yellow' => 100,
                'key' => 60
            ),
            "484 PC" => array(
                'cyan' => 0,
                'magenta' => 95,
                'yellow' => 100,
                'key' => 29
            ),
            "485 PC" => array(
                'cyan' => 0,
                'magenta' => 95,
                'yellow' => 100,
                'key' => 0
            ),
            "486 PC" => array(
                'cyan' => 0,
                'magenta' => 47,
                'yellow' => 41,
                'key' => 0
            ),
            "487 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 28,
                'key' => 0
            ),
            "488 PC" => array(
                'cyan' => 0,
                'magenta' => 26,
                'yellow' => 19,
                'key' => 0
            ),
            "489 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 11,
                'key' => 0
            ),
            "490 PC" => array(
                'cyan' => 0,
                'magenta' => 74,
                'yellow' => 100,
                'key' => 72
            ),
            "491 PC" => array(
                'cyan' => 0,
                'magenta' => 79,
                'yellow' => 100,
                'key' => 52
            ),
            "492 PC" => array(
                'cyan' => 0,
                'magenta' => 70,
                'yellow' => 66,
                'key' => 30
            ),
            "493 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 23,
                'key' => 5
            ),
            "494 PC" => array(
                'cyan' => 0,
                'magenta' => 33,
                'yellow' => 13,
                'key' => 0
            ),
            "495 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 11,
                'key' => 0
            ),
            "496 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 9,
                'key' => 0
            ),
            "497 PC" => array(
                'cyan' => 0,
                'magenta' => 70,
                'yellow' => 100,
                'key' => 78
            ),
            "498 PC" => array(
                'cyan' => 0,
                'magenta' => 64,
                'yellow' => 100,
                'key' => 60
            ),
            "499 PC" => array(
                'cyan' => 0,
                'magenta' => 58,
                'yellow' => 100,
                'key' => 49
            ),
            "500 PC" => array(
                'cyan' => 0,
                'magenta' => 38,
                'yellow' => 21,
                'key' => 11
            ),
            "501 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 13,
                'key' => 3
            ),
            "502 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 10,
                'key' => 1
            ),
            "503 PC" => array(
                'cyan' => 0,
                'magenta' => 11,
                'yellow' => 8,
                'key' => 0
            ),
            "4975 PC" => array(
                'cyan' => 0,
                'magenta' => 73,
                'yellow' => 100,
                'key' => 80
            ),
            "4985 PC" => array(
                'cyan' => 0,
                'magenta' => 59,
                'yellow' => 48,
                'key' => 48
            ),
            "4995 PC" => array(
                'cyan' => 0,
                'magenta' => 48,
                'yellow' => 38,
                'key' => 34
            ),
            "5005 PC" => array(
                'cyan' => 0,
                'magenta' => 38,
                'yellow' => 27,
                'key' => 23
            ),
            "5015 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 15,
                'key' => 11
            ),
            "5025 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 12,
                'key' => 7
            ),
            "5035 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 9,
                'key' => 3
            ),
            "504 PC" => array(
                'cyan' => 65,
                'magenta' => 100,
                'yellow' => 100,
                'key' => 35
            ),
            "505 PC" => array(
                'cyan' => 50,
                'magenta' => 100,
                'yellow' => 100,
                'key' => 25
            ),
            "506 PC" => array(
                'cyan' => 45,
                'magenta' => 100,
                'yellow' => 100,
                'key' => 15
            ),
            "507 PC" => array(
                'cyan' => 11,
                'magenta' => 45,
                'yellow' => 22,
                'key' => 0
            ),
            "508 PC" => array(
                'cyan' => 4,
                'magenta' => 34,
                'yellow' => 11,
                'key' => 0
            ),
            "509 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 7,
                'key' => 0
            ),
            "510 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 6,
                'key' => 0
            ),
            "511 PC" => array(
                'cyan' => 60,
                'magenta' => 100,
                'yellow' => 45,
                'key' => 30
            ),
            "512 PC" => array(
                'cyan' => 50,
                'magenta' => 100,
                'yellow' => 15,
                'key' => 10
            ),
            "513 PC" => array(
                'cyan' => 44,
                'magenta' => 83,
                'yellow' => 0,
                'key' => 0
            ),
            "514 PC" => array(
                'cyan' => 15,
                'magenta' => 50,
                'yellow' => 0,
                'key' => 0
            ),
            "515 PC" => array(
                'cyan' => 7,
                'magenta' => 38,
                'yellow' => 0,
                'key' => 0
            ),
            "516 PC" => array(
                'cyan' => 3,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 0
            ),
            "517 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 0,
                'key' => 0
            ),
            "5115 PC" => array(
                'cyan' => 75,
                'magenta' => 100,
                'yellow' => 70,
                'key' => 15
            ),
            "5125 PC" => array(
                'cyan' => 65,
                'magenta' => 86,
                'yellow' => 49,
                'key' => 0
            ),
            "5135 PC" => array(
                'cyan' => 47,
                'magenta' => 64,
                'yellow' => 28,
                'key' => 0
            ),
            "5145 PC" => array(
                'cyan' => 30,
                'magenta' => 44,
                'yellow' => 13,
                'key' => 0
            ),
            "5155 PC" => array(
                'cyan' => 17,
                'magenta' => 29,
                'yellow' => 8,
                'key' => 0
            ),
            "5165 PC" => array(
                'cyan' => 8,
                'magenta' => 17,
                'yellow' => 5,
                'key' => 0
            ),
            "5175 PC" => array(
                'cyan' => 5,
                'magenta' => 10,
                'yellow' => 3,
                'key' => 0
            ),
            "518 PC" => array(
                'cyan' => 70,
                'magenta' => 100,
                'yellow' => 55,
                'key' => 25
            ),
            "519 PC" => array(
                'cyan' => 67,
                'magenta' => 100,
                'yellow' => 30,
                'key' => 10
            ),
            "520 PC" => array(
                'cyan' => 64,
                'magenta' => 100,
                'yellow' => 12,
                'key' => 0
            ),
            "521 PC" => array(
                'cyan' => 27,
                'magenta' => 47,
                'yellow' => 0,
                'key' => 0
            ),
            "522 PC" => array(
                'cyan' => 17,
                'magenta' => 37,
                'yellow' => 0,
                'key' => 0
            ),
            "523 PC" => array(
                'cyan' => 10,
                'magenta' => 26,
                'yellow' => 0,
                'key' => 0
            ),
            "524 PC" => array(
                'cyan' => 6,
                'magenta' => 15,
                'yellow' => 0,
                'key' => 0
            ),
            "5185 PC" => array(
                'cyan' => 80,
                'magenta' => 100,
                'yellow' => 85,
                'key' => 25
            ),
            "5195 PC" => array(
                'cyan' => 72,
                'magenta' => 90,
                'yellow' => 75,
                'key' => 15
            ),
            "5205 PC" => array(
                'cyan' => 50,
                'magenta' => 58,
                'yellow' => 50,
                'key' => 0
            ),
            "5215 PC" => array(
                'cyan' => 28,
                'magenta' => 35,
                'yellow' => 24,
                'key' => 0
            ),
            "5225 PC" => array(
                'cyan' => 17,
                'magenta' => 25,
                'yellow' => 15,
                'key' => 0
            ),
            "5235 PC" => array(
                'cyan' => 10,
                'magenta' => 15,
                'yellow' => 10,
                'key' => 0
            ),
            "5245 PC" => array(
                'cyan' => 6,
                'magenta' => 8,
                'yellow' => 7,
                'key' => 0
            ),
            "525 PC" => array(
                'cyan' => 84,
                'magenta' => 100,
                'yellow' => 45,
                'key' => 5
            ),
            "526 PC" => array(
                'cyan' => 76,
                'magenta' => 100,
                'yellow' => 7,
                'key' => 0
            ),
            "527 PC" => array(
                'cyan' => 73,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 0
            ),
            "528 PC" => array(
                'cyan' => 41,
                'magenta' => 55,
                'yellow' => 0,
                'key' => 0
            ),
            "529 PC" => array(
                'cyan' => 26,
                'magenta' => 40,
                'yellow' => 0,
                'key' => 0
            ),
            "530 PC" => array(
                'cyan' => 18,
                'magenta' => 31,
                'yellow' => 0,
                'key' => 0
            ),
            "531 PC" => array(
                'cyan' => 10,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 0
            ),
            "5255 PC" => array(
                'cyan' => 100,
                'magenta' => 80,
                'yellow' => 0,
                'key' => 55
            ),
            "5265 PC" => array(
                'cyan' => 77,
                'magenta' => 70,
                'yellow' => 0,
                'key' => 40
            ),
            "5275 PC" => array(
                'cyan' => 60,
                'magenta' => 47,
                'yellow' => 0,
                'key' => 30
            ),
            "5285 PC" => array(
                'cyan' => 31,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 20
            ),
            "5295 PC" => array(
                'cyan' => 20,
                'magenta' => 15,
                'yellow' => 0,
                'key' => 10
            ),
            "5305 PC" => array(
                'cyan' => 14,
                'magenta' => 10,
                'yellow' => 0,
                'key' => 6
            ),
            "5315 PC" => array(
                'cyan' => 6,
                'magenta' => 6,
                'yellow' => 0,
                'key' => 5
            ),
            "532 PC" => array(
                'cyan' => 100,
                'magenta' => 80,
                'yellow' => 70,
                'key' => 25
            ),
            "533 PC" => array(
                'cyan' => 100,
                'magenta' => 83,
                'yellow' => 46,
                'key' => 13
            ),
            "534 PC" => array(
                'cyan' => 100,
                'magenta' => 80,
                'yellow' => 30,
                'key' => 5
            ),
            "535 PC" => array(
                'cyan' => 42,
                'magenta' => 27,
                'yellow' => 7,
                'key' => 0
            ),
            "536 PC" => array(
                'cyan' => 31,
                'magenta' => 20,
                'yellow' => 5,
                'key' => 0
            ),
            "537 PC" => array(
                'cyan' => 22,
                'magenta' => 12,
                'yellow' => 3,
                'key' => 0
            ),
            "538 PC" => array(
                'cyan' => 12,
                'magenta' => 7,
                'yellow' => 2,
                'key' => 0
            ),
            "539 PC" => array(
                'cyan' => 100,
                'magenta' => 49,
                'yellow' => 0,
                'key' => 70
            ),
            "540 PC" => array(
                'cyan' => 100,
                'magenta' => 55,
                'yellow' => 0,
                'key' => 55
            ),
            "541 PC" => array(
                'cyan' => 100,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 38
            ),
            "542 PC" => array(
                'cyan' => 62,
                'magenta' => 22,
                'yellow' => 0,
                'key' => 3
            ),
            "543 PC" => array(
                'cyan' => 41,
                'magenta' => 11,
                'yellow' => 0,
                'key' => 0
            ),
            "544 PC" => array(
                'cyan' => 30,
                'magenta' => 6,
                'yellow' => 0,
                'key' => 0
            ),
            "545 PC" => array(
                'cyan' => 22,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 0
            ),
            "5395 PC" => array(
                'cyan' => 100,
                'magenta' => 44,
                'yellow' => 0,
                'key' => 76
            ),
            "5405 PC" => array(
                'cyan' => 58,
                'magenta' => 17,
                'yellow' => 0,
                'key' => 46
            ),
            "5415 PC" => array(
                'cyan' => 42,
                'magenta' => 8,
                'yellow' => 0,
                'key' => 40
            ),
            "5425 PC" => array(
                'cyan' => 30,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 31
            ),
            "5435 PC" => array(
                'cyan' => 13,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 17
            ),
            "5445 PC" => array(
                'cyan' => 8,
                'magenta' => 1,
                'yellow' => 0,
                'key' => 13
            ),
            "5455 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 9
            ),
            "546 PC" => array(
                'cyan' => 95,
                'magenta' => 9,
                'yellow' => 0,
                'key' => 83
            ),
            "547 PC" => array(
                'cyan' => 100,
                'magenta' => 19,
                'yellow' => 0,
                'key' => 75
            ),
            "548 PC" => array(
                'cyan' => 100,
                'magenta' => 24,
                'yellow' => 0,
                'key' => 64
            ),
            "549 PC" => array(
                'cyan' => 52,
                'magenta' => 6,
                'yellow' => 0,
                'key' => 25
            ),
            "550 PC" => array(
                'cyan' => 38,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 19
            ),
            "551 PC" => array(
                'cyan' => 27,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 13
            ),
            "552 PC" => array(
                'cyan' => 15,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 9
            ),
            "5463 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 18,
                'key' => 83
            ),
            "5473 PC" => array(
                'cyan' => 82,
                'magenta' => 0,
                'yellow' => 28,
                'key' => 52
            ),
            "5483 PC" => array(
                'cyan' => 62,
                'magenta' => 0,
                'yellow' => 21,
                'key' => 31
            ),
            "5493 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 21
            ),
            "5503 PC" => array(
                'cyan' => 29,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 14
            ),
            "5513 PC" => array(
                'cyan' => 18,
                'magenta' => 0,
                'yellow' => 7,
                'key' => 5
            ),
            "5523 PC" => array(
                'cyan' => 11,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 3
            ),
            "5467 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 94
            ),
            "5477 PC" => array(
                'cyan' => 55,
                'magenta' => 0,
                'yellow' => 27,
                'key' => 73
            ),
            "5487 PC" => array(
                'cyan' => 35,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 54
            ),
            "5497 PC" => array(
                'cyan' => 17,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 63
            ),
            "5507 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 6,
                'key' => 27
            ),
            "5517 PC" => array(
                'cyan' => 8,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 17
            ),
            "5527 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 4,
                'key' => 11
            ),
            "553 PC" => array(
                'cyan' => 59,
                'magenta' => 0,
                'yellow' => 53,
                'key' => 80
            ),
            "554 PC" => array(
                'cyan' => 78,
                'magenta' => 0,
                'yellow' => 63,
                'key' => 67
            ),
            "555 PC" => array(
                'cyan' => 75,
                'magenta' => 0,
                'yellow' => 60,
                'key' => 55
            ),
            "556 PC" => array(
                'cyan' => 42,
                'magenta' => 0,
                'yellow' => 33,
                'key' => 27
            ),
            "557 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 15
            ),
            "558 PC" => array(
                'cyan' => 19,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 9
            ),
            "559 PC" => array(
                'cyan' => 14,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 6
            ),
            "5535 PC" => array(
                'cyan' => 66,
                'magenta' => 0,
                'yellow' => 57,
                'key' => 82
            ),
            "5545 PC" => array(
                'cyan' => 59,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 52
            ),
            "5555 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 34,
                'key' => 38
            ),
            "5565 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 26
            ),
            "5575 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 16,
                'key' => 17
            ),
            "5585 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 11,
                'key' => 10
            ),
            "5595 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 8,
                'key' => 7
            ),
            "560 PC" => array(
                'cyan' => 80,
                'magenta' => 0,
                'yellow' => 63,
                'key' => 75
            ),
            "561 PC" => array(
                'cyan' => 85,
                'magenta' => 0,
                'yellow' => 54,
                'key' => 52
            ),
            "562 PC" => array(
                'cyan' => 85,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 31
            ),
            "563 PC" => array(
                'cyan' => 52,
                'magenta' => 0,
                'yellow' => 32,
                'key' => 1
            ),
            "564 PC" => array(
                'cyan' => 37,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 0
            ),
            "565 PC" => array(
                'cyan' => 23,
                'magenta' => 0,
                'yellow' => 13,
                'key' => 0
            ),
            "566 PC" => array(
                'cyan' => 14,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 0
            ),
            "5605 PC" => array(
                'cyan' => 65,
                'magenta' => 0,
                'yellow' => 56,
                'key' => 94
            ),
            "5615 PC" => array(
                'cyan' => 49,
                'magenta' => 0,
                'yellow' => 44,
                'key' => 64
            ),
            "5625 PC" => array(
                'cyan' => 28,
                'magenta' => 0,
                'yellow' => 29,
                'key' => 48
            ),
            "5635 PC" => array(
                'cyan' => 13,
                'magenta' => 0,
                'yellow' => 18,
                'key' => 33
            ),
            "5645 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 11,
                'key' => 23
            ),
            "5655 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 16
            ),
            "5665 PC" => array(
                'cyan' => 5,
                'magenta' => 0,
                'yellow' => 7,
                'key' => 10
            ),
            "567 PC" => array(
                'cyan' => 82,
                'magenta' => 0,
                'yellow' => 64,
                'key' => 70
            ),
            "568 PC" => array(
                'cyan' => 88,
                'magenta' => 0,
                'yellow' => 57,
                'key' => 36
            ),
            "569 PC" => array(
                'cyan' => 98,
                'magenta' => 0,
                'yellow' => 57,
                'key' => 17
            ),
            "570 PC" => array(
                'cyan' => 48,
                'magenta' => 0,
                'yellow' => 29,
                'key' => 0
            ),
            "571 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 19,
                'key' => 0
            ),
            "572 PC" => array(
                'cyan' => 23,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 0
            ),
            "573 PC" => array(
                'cyan' => 14,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 0
            ),
            "574 PC" => array(
                'cyan' => 34,
                'magenta' => 0,
                'yellow' => 81,
                'key' => 71
            ),
            "575 PC" => array(
                'cyan' => 48,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 53
            ),
            "576 PC" => array(
                'cyan' => 49,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 39
            ),
            "577 PC" => array(
                'cyan' => 24,
                'magenta' => 0,
                'yellow' => 46,
                'key' => 10
            ),
            "578 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 40,
                'key' => 6
            ),
            "579 PC" => array(
                'cyan' => 17,
                'magenta' => 0,
                'yellow' => 34,
                'key' => 3
            ),
            "580 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 26,
                'key' => 2
            ),
            "5743 PC" => array(
                'cyan' => 33,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 82
            ),
            "5753 PC" => array(
                'cyan' => 25,
                'magenta' => 0,
                'yellow' => 81,
                'key' => 67
            ),
            "5763 PC" => array(
                'cyan' => 16,
                'magenta' => 0,
                'yellow' => 74,
                'key' => 57
            ),
            "5773 PC" => array(
                'cyan' => 9,
                'magenta' => 0,
                'yellow' => 43,
                'key' => 38
            ),
            "5783 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 28,
                'key' => 27
            ),
            "5793 PC" => array(
                'cyan' => 4,
                'magenta' => 0,
                'yellow' => 21,
                'key' => 18
            ),
            "5803 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 11
            ),
            "5747 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 79
            ),
            "5757 PC" => array(
                'cyan' => 27,
                'magenta' => 0,
                'yellow' => 95,
                'key' => 55
            ),
            "5767 PC" => array(
                'cyan' => 15,
                'magenta' => 0,
                'yellow' => 68,
                'key' => 39
            ),
            "5777 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 49,
                'key' => 28
            ),
            "5787 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 13
            ),
            "5797 PC" => array(
                'cyan' => 5,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 9
            ),
            "5807 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 3
            ),
            "581 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 72
            ),
            "582 PC" => array(
                'cyan' => 13,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 46
            ),
            "583 PC" => array(
                'cyan' => 23,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 17
            ),
            "584 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 79,
                'key' => 6
            ),
            "585 PC" => array(
                'cyan' => 11,
                'magenta' => 0,
                'yellow' => 66,
                'key' => 2
            ),
            "586 PC" => array(
                'cyan' => 9,
                'magenta' => 0,
                'yellow' => 53,
                'key' => 0
            ),
            "587 PC" => array(
                'cyan' => 5,
                'magenta' => 0,
                'yellow' => 40,
                'key' => 0
            ),
            "5815 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 91,
                'key' => 79
            ),
            "5825 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 87,
                'key' => 59
            ),
            "5835 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 67,
                'key' => 40
            ),
            "5845 PC" => array(
                'cyan' => 0,
                'magenta' => 1,
                'yellow' => 47,
                'key' => 30
            ),
            "5855 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 31,
                'key' => 18
            ),
            "5865 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 13
            ),
            "5875 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 26,
                'key' => 11
            ),
            "600 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 29,
                'key' => 0
            ),
            "601 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 40,
                'key' => 0
            ),
            "602 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 0
            ),
            "603 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 69,
                'key' => 1
            ),
            "604 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 88,
                'key' => 3
            ),
            "605 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 100,
                'key' => 7
            ),
            "606 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 100,
                'key' => 12
            ),
            "607 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 18,
                'key' => 1
            ),
            "608 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 32,
                'key' => 2
            ),
            "609 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 46,
                'key' => 4
            ),
            "610 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 58,
                'key' => 6
            ),
            "611 PC" => array(
                'cyan' => 0,
                'magenta' => 1,
                'yellow' => 92,
                'key' => 11
            ),
            "612 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 100,
                'key' => 20
            ),
            "613 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 100,
                'key' => 30
            ),
            "614 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 20,
                'key' => 4
            ),
            "615 PC" => array(
                'cyan' => 0,
                'magenta' => 1,
                'yellow' => 27,
                'key' => 6
            ),
            "616 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 35,
                'key' => 9
            ),
            "617 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 48,
                'key' => 17
            ),
            "618 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 87,
                'key' => 30
            ),
            "619 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 100,
                'key' => 43
            ),
            "620 PC" => array(
                'cyan' => 0,
                'magenta' => 5,
                'yellow' => 100,
                'key' => 53
            ),
            "621 PC" => array(
                'cyan' => 13,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 2
            ),
            "622 PC" => array(
                'cyan' => 24,
                'magenta' => 0,
                'yellow' => 19,
                'key' => 4
            ),
            "623 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 24,
                'key' => 10
            ),
            "624 PC" => array(
                'cyan' => 44,
                'magenta' => 0,
                'yellow' => 35,
                'key' => 20
            ),
            "625 PC" => array(
                'cyan' => 56,
                'magenta' => 0,
                'yellow' => 44,
                'key' => 33
            ),
            "626 PC" => array(
                'cyan' => 76,
                'magenta' => 0,
                'yellow' => 64,
                'key' => 62
            ),
            "627 PC" => array(
                'cyan' => 90,
                'magenta' => 0,
                'yellow' => 75,
                'key' => 83
            ),
            "628 PC" => array(
                'cyan' => 19,
                'magenta' => 0,
                'yellow' => 6,
                'key' => 0
            ),
            "629 PC" => array(
                'cyan' => 34,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 0
            ),
            "630 PC" => array(
                'cyan' => 47,
                'magenta' => 0,
                'yellow' => 11,
                'key' => 0
            ),
            "631 PC" => array(
                'cyan' => 67,
                'magenta' => 0,
                'yellow' => 12,
                'key' => 2
            ),
            "632 PC" => array(
                'cyan' => 92,
                'magenta' => 0,
                'yellow' => 15,
                'key' => 5
            ),
            "633 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 25
            ),
            "634 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 40
            ),
            "635 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 8,
                'key' => 0
            ),
            "636 PC" => array(
                'cyan' => 45,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 0
            ),
            "637 PC" => array(
                'cyan' => 55,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 0
            ),
            "638 PC" => array(
                'cyan' => 83,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 0
            ),
            "639 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 5
            ),
            "640 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 22
            ),
            "641 PC" => array(
                'cyan' => 100,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 30
            ),
            "642 PC" => array(
                'cyan' => 16,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 2
            ),
            "643 PC" => array(
                'cyan' => 25,
                'magenta' => 7,
                'yellow' => 0,
                'key' => 4
            ),
            "644 PC" => array(
                'cyan' => 42,
                'magenta' => 15,
                'yellow' => 0,
                'key' => 6
            ),
            "645 PC" => array(
                'cyan' => 55,
                'magenta' => 24,
                'yellow' => 0,
                'key' => 9
            ),
            "646 PC" => array(
                'cyan' => 65,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 11
            ),
            "647 PC" => array(
                'cyan' => 100,
                'magenta' => 56,
                'yellow' => 0,
                'key' => 23
            ),
            "648 PC" => array(
                'cyan' => 100,
                'magenta' => 62,
                'yellow' => 0,
                'key' => 52
            ),
            "649 PC" => array(
                'cyan' => 10,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 1
            ),
            "650 PC" => array(
                'cyan' => 24,
                'magenta' => 9,
                'yellow' => 0,
                'key' => 2
            ),
            "651 PC" => array(
                'cyan' => 38,
                'magenta' => 18,
                'yellow' => 0,
                'key' => 6
            ),
            "652 PC" => array(
                'cyan' => 50,
                'magenta' => 25,
                'yellow' => 0,
                'key' => 10
            ),
            "653 PC" => array(
                'cyan' => 100,
                'magenta' => 62,
                'yellow' => 0,
                'key' => 20
            ),
            "654 PC" => array(
                'cyan' => 100,
                'magenta' => 67,
                'yellow' => 0,
                'key' => 38
            ),
            "655 PC" => array(
                'cyan' => 100,
                'magenta' => 68,
                'yellow' => 0,
                'key' => 52
            ),
            "656 PC" => array(
                'cyan' => 14,
                'magenta' => 3,
                'yellow' => 0,
                'key' => 0
            ),
            "657 PC" => array(
                'cyan' => 24,
                'magenta' => 7,
                'yellow' => 0,
                'key' => 0
            ),
            "658 PC" => array(
                'cyan' => 30,
                'magenta' => 15,
                'yellow' => 0,
                'key' => 0
            ),
            "659 PC" => array(
                'cyan' => 55,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 0
            ),
            "660 PC" => array(
                'cyan' => 90,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 0
            ),
            "661 PC" => array(
                'cyan' => 100,
                'magenta' => 69,
                'yellow' => 0,
                'key' => 9
            ),
            "662 PC" => array(
                'cyan' => 100,
                'magenta' => 71,
                'yellow' => 0,
                'key' => 18
            ),
            "663 PC" => array(
                'cyan' => 7,
                'magenta' => 6,
                'yellow' => 0,
                'key' => 0
            ),
            "664 PC" => array(
                'cyan' => 11,
                'magenta' => 9,
                'yellow' => 0,
                'key' => 0
            ),
            "665 PC" => array(
                'cyan' => 20,
                'magenta' => 17,
                'yellow' => 0,
                'key' => 2
            ),
            "666 PC" => array(
                'cyan' => 31,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 7
            ),
            "667 PC" => array(
                'cyan' => 52,
                'magenta' => 49,
                'yellow' => 0,
                'key' => 14
            ),
            "668 PC" => array(
                'cyan' => 65,
                'magenta' => 64,
                'yellow' => 0,
                'key' => 30
            ),
            "669 PC" => array(
                'cyan' => 76,
                'magenta' => 78,
                'yellow' => 0,
                'key' => 47
            ),
            "670 PC" => array(
                'cyan' => 0,
                'magenta' => 13,
                'yellow' => 0,
                'key' => 0
            ),
            "671 PC" => array(
                'cyan' => 1,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 0
            ),
            "672 PC" => array(
                'cyan' => 3,
                'magenta' => 34,
                'yellow' => 0,
                'key' => 0
            ),
            "673 PC" => array(
                'cyan' => 6,
                'magenta' => 49,
                'yellow' => 0,
                'key' => 0
            ),
            "674 PC" => array(
                'cyan' => 9,
                'magenta' => 67,
                'yellow' => 0,
                'key' => 0
            ),
            "675 PC" => array(
                'cyan' => 17,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 3
            ),
            "676 PC" => array(
                'cyan' => 6,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 22
            ),
            "677 PC" => array(
                'cyan' => 2,
                'magenta' => 13,
                'yellow' => 0,
                'key' => 0
            ),
            "678 PC" => array(
                'cyan' => 3,
                'magenta' => 21,
                'yellow' => 0,
                'key' => 0
            ),
            "679 PC" => array(
                'cyan' => 5,
                'magenta' => 27,
                'yellow' => 0,
                'key' => 0
            ),
            "680 PC" => array(
                'cyan' => 10,
                'magenta' => 43,
                'yellow' => 0,
                'key' => 2
            ),
            "681 PC" => array(
                'cyan' => 21,
                'magenta' => 61,
                'yellow' => 0,
                'key' => 4
            ),
            "682 PC" => array(
                'cyan' => 25,
                'magenta' => 79,
                'yellow' => 0,
                'key' => 12
            ),
            "683 PC" => array(
                'cyan' => 11,
                'magenta' => 100,
                'yellow' => 0,
                'key' => 43
            ),
            "684 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 0,
                'key' => 2
            ),
            "685 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 0,
                'key' => 3
            ),
            "686 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 0,
                'key' => 5
            ),
            "687 PC" => array(
                'cyan' => 2,
                'magenta' => 44,
                'yellow' => 0,
                'key' => 12
            ),
            "688 PC" => array(
                'cyan' => 5,
                'magenta' => 57,
                'yellow' => 0,
                'key' => 19
            ),
            "689 PC" => array(
                'cyan' => 7,
                'magenta' => 77,
                'yellow' => 0,
                'key' => 34
            ),
            "690 PC" => array(
                'cyan' => 0,
                'magenta' => 97,
                'yellow' => 0,
                'key' => 59
            ),
            "691 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 8,
                'key' => 1
            ),
            "692 PC" => array(
                'cyan' => 0,
                'magenta' => 23,
                'yellow' => 10,
                'key' => 2
            ),
            "693 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 12,
                'key' => 6
            ),
            "694 PC" => array(
                'cyan' => 0,
                'magenta' => 36,
                'yellow' => 21,
                'key' => 10
            ),
            "695 PC" => array(
                'cyan' => 0,
                'magenta' => 50,
                'yellow' => 28,
                'key' => 20
            ),
            "696 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 36,
                'key' => 32
            ),
            "697 PC" => array(
                'cyan' => 0,
                'magenta' => 68,
                'yellow' => 47,
                'key' => 42
            ),
            "698 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 8,
                'key' => 0
            ),
            "699 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 10,
                'key' => 0
            ),
            "700 PC" => array(
                'cyan' => 0,
                'magenta' => 36,
                'yellow' => 14,
                'key' => 0
            ),
            "701 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 20,
                'key' => 0
            ),
            "702 PC" => array(
                'cyan' => 0,
                'magenta' => 69,
                'yellow' => 34,
                'key' => 5
            ),
            "703 PC" => array(
                'cyan' => 0,
                'magenta' => 83,
                'yellow' => 54,
                'key' => 16
            ),
            "704 PC" => array(
                'cyan' => 0,
                'magenta' => 90,
                'yellow' => 72,
                'key' => 29
            ),
            "705 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 6,
                'key' => 0
            ),
            "706 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 10,
                'key' => 0
            ),
            "707 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 14,
                'key' => 0
            ),
            "708 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 22,
                'key' => 0
            ),
            "709 PC" => array(
                'cyan' => 0,
                'magenta' => 66,
                'yellow' => 38,
                'key' => 0
            ),
            "710 PC" => array(
                'cyan' => 0,
                'magenta' => 79,
                'yellow' => 58,
                'key' => 0
            ),
            "711 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 80,
                'key' => 2
            ),
            "712 PC" => array(
                'cyan' => 0,
                'magenta' => 14,
                'yellow' => 31,
                'key' => 0
            ),
            "713 PC" => array(
                'cyan' => 0,
                'magenta' => 19,
                'yellow' => 41,
                'key' => 0
            ),
            "714 PC" => array(
                'cyan' => 0,
                'magenta' => 27,
                'yellow' => 55,
                'key' => 0
            ),
            "715 PC" => array(
                'cyan' => 0,
                'magenta' => 36,
                'yellow' => 71,
                'key' => 0
            ),
            "716 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 91,
                'key' => 0
            ),
            "717 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 2
            ),
            "718 PC" => array(
                'cyan' => 0,
                'magenta' => 56,
                'yellow' => 100,
                'key' => 8
            ),
            "719 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 25,
                'key' => 0
            ),
            "720 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 36,
                'key' => 1
            ),
            "721 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 52,
                'key' => 3
            ),
            "722 PC" => array(
                'cyan' => 0,
                'magenta' => 36,
                'yellow' => 76,
                'key' => 9
            ),
            "723 PC" => array(
                'cyan' => 0,
                'magenta' => 43,
                'yellow' => 97,
                'key' => 17
            ),
            "724 PC" => array(
                'cyan' => 0,
                'magenta' => 51,
                'yellow' => 100,
                'key' => 36
            ),
            "725 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 48
            ),
            "726 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 23,
                'key' => 2
            ),
            "727 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 34,
                'key' => 5
            ),
            "728 PC" => array(
                'cyan' => 0,
                'magenta' => 21,
                'yellow' => 48,
                'key' => 10
            ),
            "729 PC" => array(
                'cyan' => 0,
                'magenta' => 31,
                'yellow' => 62,
                'key' => 18
            ),
            "730 PC" => array(
                'cyan' => 0,
                'magenta' => 38,
                'yellow' => 78,
                'key' => 29
            ),
            "731 PC" => array(
                'cyan' => 0,
                'magenta' => 52,
                'yellow' => 100,
                'key' => 54
            ),
            "732 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 100,
                'key' => 64
            ),
            "7401 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 18,
                'key' => 0
            ),
            "7402 PC" => array(
                'cyan' => 0,
                'magenta' => 6,
                'yellow' => 30,
                'key' => 0
            ),
            "7403 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 50,
                'key' => 0
            ),
            "7404 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 79,
                'key' => 0
            ),
            "7405 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 99,
                'key' => 0
            ),
            "7406 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 100,
                'key' => 0
            ),
            "7407 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 85,
                'key' => 11
            ),
            "7408 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 95,
                'key' => 0
            ),
            "7409 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 95,
                'key' => 0
            ),
            "7410 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 55,
                'key' => 0
            ),
            "7411 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 69,
                'key' => 0
            ),
            "7412 PC" => array(
                'cyan' => 0,
                'magenta' => 42,
                'yellow' => 100,
                'key' => 7
            ),
            "7413 PC" => array(
                'cyan' => 0,
                'magenta' => 53,
                'yellow' => 100,
                'key' => 4
            ),
            "7414 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 100,
                'key' => 11
            ),
            "7415 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 15,
                'key' => 0
            ),
            "7416 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 60,
                'key' => 0
            ),
            "7417 PC" => array(
                'cyan' => 0,
                'magenta' => 75,
                'yellow' => 75,
                'key' => 0
            ),
            "7418 PC" => array(
                'cyan' => 0,
                'magenta' => 70,
                'yellow' => 60,
                'key' => 5
            ),
            "7419 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 45,
                'key' => 18
            ),
            "7420 PC" => array(
                'cyan' => 0,
                'magenta' => 80,
                'yellow' => 42,
                'key' => 20
            ),
            "7421 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 30,
                'key' => 61
            ),
            "7422 PC" => array(
                'cyan' => 0,
                'magenta' => 9,
                'yellow' => 5,
                'key' => 0
            ),
            "7423 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 23,
                'key' => 0
            ),
            "7424 PC" => array(
                'cyan' => 0,
                'magenta' => 75,
                'yellow' => 30,
                'key' => 0
            ),
            "7425 PC" => array(
                'cyan' => 0,
                'magenta' => 90,
                'yellow' => 30,
                'key' => 7
            ),
            "7426 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 45,
                'key' => 18
            ),
            "7427 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 65,
                'key' => 28
            ),
            "7428 PC" => array(
                'cyan' => 0,
                'magenta' => 80,
                'yellow' => 45,
                'key' => 55
            ),
            "7429 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 3,
                'key' => 0
            ),
            "7430 PC" => array(
                'cyan' => 2,
                'magenta' => 31,
                'yellow' => 0,
                'key' => 0
            ),
            "7431 PC" => array(
                'cyan' => 0,
                'magenta' => 38,
                'yellow' => 2,
                'key' => 5
            ),
            "7432 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 3,
                'key' => 10
            ),
            "7433 PC" => array(
                'cyan' => 0,
                'magenta' => 75,
                'yellow' => 15,
                'key' => 15
            ),
            "7434 PC" => array(
                'cyan' => 0,
                'magenta' => 80,
                'yellow' => 15,
                'key' => 20
            ),
            "7435 PC" => array(
                'cyan' => 0,
                'magenta' => 100,
                'yellow' => 10,
                'key' => 35
            ),
            "7436 PC" => array(
                'cyan' => 3,
                'magenta' => 8,
                'yellow' => 0,
                'key' => 0
            ),
            "7437 PC" => array(
                'cyan' => 6,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 0
            ),
            "7438 PC" => array(
                'cyan' => 15,
                'magenta' => 35,
                'yellow' => 0,
                'key' => 0
            ),
            "7439 PC" => array(
                'cyan' => 20,
                'magenta' => 35,
                'yellow' => 0,
                'key' => 0
            ),
            "7440 PC" => array(
                'cyan' => 30,
                'magenta' => 40,
                'yellow' => 0,
                'key' => 0
            ),
            "7441 PC" => array(
                'cyan' => 36,
                'magenta' => 50,
                'yellow' => 0,
                'key' => 0
            ),
            "7442 PC" => array(
                'cyan' => 50,
                'magenta' => 70,
                'yellow' => 0,
                'key' => 0
            ),
            "7443 PC" => array(
                'cyan' => 6,
                'magenta' => 5,
                'yellow' => 0,
                'key' => 0
            ),
            "7444 PC" => array(
                'cyan' => 20,
                'magenta' => 17,
                'yellow' => 0,
                'key' => 0
            ),
            "7445 PC" => array(
                'cyan' => 30,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 3
            ),
            "7446 PC" => array(
                'cyan' => 43,
                'magenta' => 38,
                'yellow' => 0,
                'key' => 0
            ),
            "7447 PC" => array(
                'cyan' => 60,
                'magenta' => 58,
                'yellow' => 0,
                'key' => 19
            ),
            "7448 PC" => array(
                'cyan' => 32,
                'magenta' => 42,
                'yellow' => 0,
                'key' => 55
            ),
            "7449 PC" => array(
                'cyan' => 72,
                'magenta' => 100,
                'yellow' => 77,
                'key' => 40
            ),
            "7450 PC" => array(
                'cyan' => 20,
                'magenta' => 10,
                'yellow' => 0,
                'key' => 0
            ),
            "7451 PC" => array(
                'cyan' => 40,
                'magenta' => 21,
                'yellow' => 0,
                'key' => 0
            ),
            "7452 PC" => array(
                'cyan' => 50,
                'magenta' => 32,
                'yellow' => 0,
                'key' => 0
            ),
            "7453 PC" => array(
                'cyan' => 50,
                'magenta' => 26,
                'yellow' => 0,
                'key' => 0
            ),
            "7454 PC" => array(
                'cyan' => 50,
                'magenta' => 24,
                'yellow' => 0,
                'key' => 10
            ),
            "7455 PC" => array(
                'cyan' => 80,
                'magenta' => 53,
                'yellow' => 0,
                'key' => 0
            ),
            "7456 PC" => array(
                'cyan' => 55,
                'magenta' => 35,
                'yellow' => 0,
                'key' => 7
            ),
            "7457 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 2,
                'key' => 0
            ),
            "7458 PC" => array(
                'cyan' => 40,
                'magenta' => 0,
                'yellow' => 5,
                'key' => 6
            ),
            "7459 PC" => array(
                'cyan' => 57,
                'magenta' => 0,
                'yellow' => 6,
                'key' => 13
            ),
            "7460 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 5
            ),
            "7461 PC" => array(
                'cyan' => 78,
                'magenta' => 28,
                'yellow' => 0,
                'key' => 0
            ),
            "7462 PC" => array(
                'cyan' => 100,
                'magenta' => 50,
                'yellow' => 0,
                'key' => 10
            ),
            "7463 PC" => array(
                'cyan' => 100,
                'magenta' => 43,
                'yellow' => 0,
                'key' => 65
            ),
            "7464 PC" => array(
                'cyan' => 25,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 0
            ),
            "7465 PC" => array(
                'cyan' => 50,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 0
            ),
            "7466 PC" => array(
                'cyan' => 70,
                'magenta' => 0,
                'yellow' => 23,
                'key' => 0
            ),
            "7467 PC" => array(
                'cyan' => 95,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 0
            ),
            "7468 PC" => array(
                'cyan' => 100,
                'magenta' => 10,
                'yellow' => 0,
                'key' => 28
            ),
            "7469 PC" => array(
                'cyan' => 100,
                'magenta' => 20,
                'yellow' => 0,
                'key' => 40
            ),
            "7470 PC" => array(
                'cyan' => 80,
                'magenta' => 15,
                'yellow' => 0,
                'key' => 45
            ),
            "7471 PC" => array(
                'cyan' => 28,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 0
            ),
            "7472 PC" => array(
                'cyan' => 52,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 0
            ),
            "7473 PC" => array(
                'cyan' => 70,
                'magenta' => 0,
                'yellow' => 38,
                'key' => 8
            ),
            "7474 PC" => array(
                'cyan' => 90,
                'magenta' => 0,
                'yellow' => 28,
                'key' => 22
            ),
            "7475 PC" => array(
                'cyan' => 50,
                'magenta' => 0,
                'yellow' => 25,
                'key' => 30
            ),
            "7476 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 43,
                'key' => 60
            ),
            "7477 PC" => array(
                'cyan' => 80,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 68
            ),
            "7478 PC" => array(
                'cyan' => 18,
                'magenta' => 0,
                'yellow' => 14,
                'key' => 0
            ),
            "7479 PC" => array(
                'cyan' => 55,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 0
            ),
            "7480 PC" => array(
                'cyan' => 60,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 0
            ),
            "7481 PC" => array(
                'cyan' => 60,
                'magenta' => 0,
                'yellow' => 55,
                'key' => 0
            ),
            "7482 PC" => array(
                'cyan' => 80,
                'magenta' => 0,
                'yellow' => 75,
                'key' => 0
            ),
            "7483 PC" => array(
                'cyan' => 85,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 55
            ),
            "7484 PC" => array(
                'cyan' => 100,
                'magenta' => 0,
                'yellow' => 85,
                'key' => 50
            ),
            "7485 PC" => array(
                'cyan' => 6,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 0
            ),
            "7486 PC" => array(
                'cyan' => 20,
                'magenta' => 0,
                'yellow' => 30,
                'key' => 0
            ),
            "7487 PC" => array(
                'cyan' => 30,
                'magenta' => 0,
                'yellow' => 45,
                'key' => 0
            ),
            "7488 PC" => array(
                'cyan' => 43,
                'magenta' => 0,
                'yellow' => 60,
                'key' => 0
            ),
            "7489 PC" => array(
                'cyan' => 60,
                'magenta' => 0,
                'yellow' => 80,
                'key' => 7
            ),
            "7490 PC" => array(
                'cyan' => 45,
                'magenta' => 0,
                'yellow' => 80,
                'key' => 35
            ),
            "7491 PC" => array(
                'cyan' => 32,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 40
            ),
            "7492 PC" => array(
                'cyan' => 12,
                'magenta' => 0,
                'yellow' => 50,
                'key' => 7
            ),
            "7493 PC" => array(
                'cyan' => 14,
                'magenta' => 0,
                'yellow' => 36,
                'key' => 10
            ),
            "7494 PC" => array(
                'cyan' => 25,
                'magenta' => 0,
                'yellow' => 40,
                'key' => 15
            ),
            "7495 PC" => array(
                'cyan' => 25,
                'magenta' => 0,
                'yellow' => 80,
                'key' => 30
            ),
            "7496 PC" => array(
                'cyan' => 40,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 38
            ),
            "7497 PC" => array(
                'cyan' => 40,
                'magenta' => 30,
                'yellow' => 70,
                'key' => 25
            ),
            "7498 PC" => array(
                'cyan' => 25,
                'magenta' => 0,
                'yellow' => 100,
                'key' => 80
            ),
            "7499 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 15,
                'key' => 0
            ),
            "7500 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 15,
                'key' => 3
            ),
            "7501 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 20,
                'key' => 6
            ),
            "7502 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 35,
                'key' => 10
            ),
            "7503 PC" => array(
                'cyan' => 0,
                'magenta' => 12,
                'yellow' => 35,
                'key' => 25
            ),
            "7504 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 45,
                'key' => 40
            ),
            "7505 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 70,
                'key' => 55
            ),
            "7506 PC" => array(
                'cyan' => 0,
                'magenta' => 5,
                'yellow' => 15,
                'key' => 0
            ),
            "7507 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 30,
                'key' => 0
            ),
            "7508 PC" => array(
                'cyan' => 0,
                'magenta' => 15,
                'yellow' => 40,
                'key' => 4
            ),
            "7509 PC" => array(
                'cyan' => 0,
                'magenta' => 20,
                'yellow' => 50,
                'key' => 5
            ),
            "7510 PC" => array(
                'cyan' => 0,
                'magenta' => 30,
                'yellow' => 72,
                'key' => 11
            ),
            "7511 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 100,
                'key' => 25
            ),
            "7512 PC" => array(
                'cyan' => 0,
                'magenta' => 46,
                'yellow' => 100,
                'key' => 33
            ),
            "7513 PC" => array(
                'cyan' => 0,
                'magenta' => 18,
                'yellow' => 28,
                'key' => 3
            ),
            "7514 PC" => array(
                'cyan' => 0,
                'magenta' => 24,
                'yellow' => 38,
                'key' => 5
            ),
            "7515 PC" => array(
                'cyan' => 0,
                'magenta' => 35,
                'yellow' => 50,
                'key' => 12
            ),
            "7516 PC" => array(
                'cyan' => 0,
                'magenta' => 52,
                'yellow' => 100,
                'key' => 35
            ),
            "7517 PC" => array(
                'cyan' => 0,
                'magenta' => 60,
                'yellow' => 100,
                'key' => 44
            ),
            "7518 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 55,
                'key' => 60
            ),
            "7519 PC" => array(
                'cyan' => 50,
                'magenta' => 60,
                'yellow' => 100,
                'key' => 48
            ),
            "7520 PC" => array(
                'cyan' => 0,
                'magenta' => 16,
                'yellow' => 19,
                'key' => 0
            ),
            "7521 PC" => array(
                'cyan' => 0,
                'magenta' => 25,
                'yellow' => 20,
                'key' => 10
            ),
            "7522 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 30,
                'key' => 16
            ),
            "7523 PC" => array(
                'cyan' => 0,
                'magenta' => 40,
                'yellow' => 35,
                'key' => 20
            ),
            "7524 PC" => array(
                'cyan' => 0,
                'magenta' => 55,
                'yellow' => 60,
                'key' => 27
            ),
            "7525 PC" => array(
                'cyan' => 0,
                'magenta' => 45,
                'yellow' => 50,
                'key' => 30
            ),
            "7526 PC" => array(
                'cyan' => 0,
                'magenta' => 65,
                'yellow' => 100,
                'key' => 35
            ),
            "7527 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 6,
                'key' => 7
            ),
            "7528 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 10,
                'key' => 10
            ),
            "7529 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 12,
                'key' => 17
            ),
            "7530 PC" => array(
                'cyan' => 0,
                'magenta' => 8,
                'yellow' => 21,
                'key' => 32
            ),
            "7531 PC" => array(
                'cyan' => 0,
                'magenta' => 10,
                'yellow' => 27,
                'key' => 50
            ),
            "7532 PC" => array(
                'cyan' => 0,
                'magenta' => 17,
                'yellow' => 50,
                'key' => 65
            ),
            "7533 PC" => array(
                'cyan' => 0,
                'magenta' => 22,
                'yellow' => 85,
                'key' => 85
            ),
            "7534 PC" => array(
                'cyan' => 0,
                'magenta' => 2,
                'yellow' => 8,
                'key' => 10
            ),
            "7535 PC" => array(
                'cyan' => 0,
                'magenta' => 3,
                'yellow' => 15,
                'key' => 20
            ),
            "7536 PC" => array(
                'cyan' => 0,
                'magenta' => 4,
                'yellow' => 22,
                'key' => 32
            ),
            "7537 PC" => array(
                'cyan' => 3,
                'magenta' => 0,
                'yellow' => 10,
                'key' => 20
            ),
            "7538 PC" => array(
                'cyan' => 9,
                'magenta' => 0,
                'yellow' => 13,
                'key' => 30
            ),
            "7539 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 9,
                'key' => 36
            ),
            "7540 PC" => array(
                'cyan' => 0,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 72
            ),
            "7541 PC" => array(
                'cyan' => 2,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 5
            ),
            "7542 PC" => array(
                'cyan' => 10,
                'magenta' => 0,
                'yellow' => 3,
                'key' => 16
            ),
            "7543 PC" => array(
                'cyan' => 7,
                'magenta' => 0,
                'yellow' => 0,
                'key' => 30
            ),
            "7544 PC" => array(
                'cyan' => 10,
                'magenta' => 1,
                'yellow' => 0,
                'key' => 40
            ),
            "7545 PC" => array(
                'cyan' => 23,
                'magenta' => 2,
                'yellow' => 0,
                'key' => 63
            ),
            "7546 PC" => array(
                'cyan' => 33,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 72
            ),
            "7547 PC" => array(
                'cyan' => 35,
                'magenta' => 4,
                'yellow' => 0,
                'key' => 94
            )
        );
        return $pantone_pallete_pc;

    }

}
