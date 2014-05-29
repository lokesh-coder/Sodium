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
 * Autoloads sodium classes
 *
 * @author Lokesh <hello@lokesh.me>
 * @version 1.0.1
 */
class Autoloader
{

    /**
     * application path
     *
     * @var string
     */
    public static $_app_path;

    /**
     * loads classes by spl autoload
     */
    public static function load()
    {

        self::$_app_path = self::_get_dir();
        spl_autoload_register('self::_loader');
    }

    /**
     * returns application installed path
     *
     * @return string
     */
    private static function _get_dir()
    {
        $root = $_SERVER['DOCUMENT_ROOT'];
        $main_dir = __DIR__;
        $installed_dir = str_replace($root, '', $main_dir);
        $installed_dir = trim($installed_dir, DIRECTORY_SEPARATOR);
        $installed_dir = str_replace('Sodium', '', $installed_dir);
        $installed_dir = str_replace(DIRECTORY_SEPARATOR, '/', $installed_dir);
        return $installed_dir;
    }

    /**
     * loads classes
     *
     * @param string $class
     * @throws Exception
     */
    private static function _loader($className)
    {

        $className = ltrim($className, '\\');
        $fileName = '';
        $namespace = '';
        if ($lastNsPos = strrpos($className, '\\')) {
            $namespace = substr($className, 0, $lastNsPos);
            $className = substr($className, $lastNsPos + 1);
            $fileName = str_replace('\\', DIRECTORY_SEPARATOR, $namespace) . DIRECTORY_SEPARATOR;
        }
        $fileName .= str_replace('_', DIRECTORY_SEPARATOR, $className) . '.php';
        if (file_exists(__DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $fileName))
            require_once __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . $fileName;
        elseif (file_exists(__DIR__ . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . $fileName))
            require_once __DIR__ . DIRECTORY_SEPARATOR . 'Library' . DIRECTORY_SEPARATOR . $fileName;
    }

    /**
     * returns path of the file
     *
     * @param string $file filename
     * @throws Exception
     * @return string
     */
    public static function loadFile($file)
    {

        $filename = explode('.', $file);
        $file = $filename[0];
        $path = self::_process($file);

        if (!file_exists(self::$_app_path . $path . '.' . $filename[1]))
            throw new Exception('file ' . $file . '.' . $filename[1] . ' not exists');
        return self::$_app_path . $path . '.' . $filename[1];
    }

    /**
     * logic
     *
     * @param string $file
     * @return string
     */
    private static function _process($file)
    {
        return str_replace('_', '/', $file);
    }

    public static function baseDir()
    {
        return __DIR__;
    }

}
