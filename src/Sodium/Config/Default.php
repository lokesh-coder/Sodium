<?php

/*
 * This file is part of  Sodium.
 *
 * copyright (c) 2013 Vylson Silwr
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$config = array();

$config['Version'] = '1.0.1';
$config['Name'] = 'Default';
$config['Environment'] = 'Production';
$config['Profiler'] = 'Off';


$config['Load_Models']['Seed\Hex'] = 'Seed\Hex';
$config['Load_Models']['Seed\Name'] = 'Seed\Name';
$config['Load_Models']['Seed\Crayon'] = 'Seed\Crayon';
$config['Load_Models']['Seed\Pantone'] = 'Seed\Pantone';
$config['Load_Models']['Seed\Basic'] = 'Seed\Basic';

$config['Load_Models']['Colorspace\Rgb'] = 'Colorspace\Rgb';
$config['Load_Models']['Colorspace\Hsl'] = 'Colorspace\Hsl';
$config['Load_Models']['Colorspace\Hsv'] = 'Colorspace\Hsv';
$config['Load_Models']['Colorspace\Cmy'] = 'Colorspace\Cmy';
$config['Load_Models']['Colorspace\Cmyk'] = 'Colorspace\Cmyk';
$config['Load_Models']['Colorspace\Xyz'] = 'Colorspace\Xyz';
$config['Load_Models']['Colorspace\Yxy'] = 'Colorspace\Yxy';
$config['Load_Models']['Colorspace\Lab'] = 'Colorspace\Lab';
$config['Load_Models']['Colorspace\Luv'] = 'Colorspace\Luv';
$config['Load_Models']['Colorspace\Lch'] = 'Colorspace\Lch';
$config['Load_Models']['Colorspace\Hlab'] = 'Colorspace\HunterLab';

$config['Load_Models']['Aggregate\Image'] = 'Aggregate\Image';
$config['Load_Models']['Aggregate\Css'] = 'Aggregate\Css';
$config['Load_Models']['Aggregate\Psd'] = 'Aggregate\Psd';
$config['Load_Models']['Aggregate\Ico'] = 'Aggregate\Ico';

$config['Load_Models']['Api\Webpage'] = 'Api\Webpage';
$config['Load_Models']['Api\ColorLovers'] = 'Api\ColorLovers';
$config['Load_Models']['Api\Kuler'] = 'Api\Kuler';


$config['Input_Formats'][] = 'SimpleArrayObject';
$config['Input_Formats'][] = 'Json';
$config['Input_Formats'][] = 'SodiumObject';

$config['Seed\Basic']['Db_Path'] = 'Model/Seed/Basic/Db/';

$config['Color_Storage']['Auto'] = 'Off';
$config['Color_Storage']['Standard'] = 'Off';
$config['Color_Storage']['Default_Model'] = 'Model\Colorspace\Rgb';

$config['Prefix']['Plugin'] = 'Plugin';
$config['Prefix']['Formula'] = 'apply';
$config['Prefix']['Image'] = 'Image';
$config['Prefix']['Toolbox'] = 'Tool';

$config['Path']['Root'] = '';
$config['Path']['Plugin'] = 'Plugin/';
$config['Path']['Formula'] = 'Formula/';
$config['Path']['Toolbox'] = 'Toolbox/';
$config['Path']['Image'] = 'Image/';
$config['Path']['Images'] = 'Snapshots/';
$config['Path']['Fonts'] = 'File/Font/';
$config['Path']['Aco'] = 'File/Aco/';
$config['Path']['Ase'] = 'File/Ase/';
$config['Path']['Gif'] = 'File/Gif/';

$config['Image']['Default_Adapter'] = 'GD';
$config['Image']['Default_Font'] = 'Bradhit.ttf';
$config['Image']['Grid_Path'] = 'File/Image/Grid/';
$config['Image']['Single_Path'] = 'File/Image/Single/';
$config['Image']['Pallate_Path'] = 'File/Image/Pallate/';
$config['Image']['Screensnap_Path'] = 'File/Image/Screensnap/';
$config['Image']['Default_Path'] = 'File/Image/Default/';
$config['Image']['Grid_Size'] = '400x400';
$config['Image']['Pallate_Size'] = '100x500';
$config['Image']['Single_Size'] = '150x170';

$config['Formula']['Default_Degree'] = 10;
$config['Formula']['Default_Limit'] = 6;

$config['Predefined_Colors'][] = '#456789';

return $config;