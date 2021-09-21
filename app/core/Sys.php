<?php

namespace Page\App\Core;

class  Sys
{
    public static $debug = false;
    public static $base = '/';
    public static function log($var)
    {
        if (self::$debug) {
            echo '<script>console.log(`' . str_replace('`', '\`', var_export($var, true)) . '`)</script>';
        }
    }

    public static function getRoot()
    {
        return dirname(dirname(dirname(__FILE__)));
    }

    public static function randomString($length)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randstring = '';
        for ($i = 0; $i < $length; $i++) {
            $randstring .= $characters[rand(0, strlen($characters) - 1)];
        }
        return $randstring;
    }

    public static function redirect404()
    {

        header("HTTP/1.0 404 Not Found");
        header("Location: " . Sys::$base . "/error/404");
        exit();
    }

    public static function toKeyWordPairs($keyIndex, $wordIndex, $array)
    {
        $pairs = [];
        foreach ($array as $arrayElement) {
            $pairs[$arrayElement[$keyIndex]] = $arrayElement[$wordIndex];
        }
        return $pairs;
    }


    public static function svg($path)
    {
        return file_get_contents(self::getRoot() . $path);
    }
}
