<?php

namespace Framework\Helpers;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Twig\Extra\Intl\IntlExtension;
use \Twig\Extension\DebugExtension;

class TwigHelper
{
    private static $twig;

    public static function render(string $file, array $params = [], $isAdmin = false)
    {
        $loader = new FilesystemLoader(TEMPLATESDIR);
        $cachePath = CACHEDIR;
        if (ENV == "dev") {
            $cachePath = false;
            $debug = true;
        }

        self::$twig = new Environment($loader, [
            'cache' => $cachePath,
            'debug' => $debug ?? false
        ]);
        self::$twig->addExtension(new DebugExtension());
        // self::$twig->addExtension(new IntlExtension());

        // if($isAdmin){ $file = "admin/{$file}"; };
        echo self::$twig->render($file.".html.twig", $params);
    }
}
