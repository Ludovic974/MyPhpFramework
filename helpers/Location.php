<?php

namespace Framework\Helpers;

class Location
{
    public static function redirect(string $url = "/", $param = "")
    {
        $url = trim($url, "/ ");
        $path = WEBSITE_URL . $url;
        if (!empty($param)) $path .= "/{$param}";
        return header("Location: {$path}");
    }
}
