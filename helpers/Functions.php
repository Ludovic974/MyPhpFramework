<?php

namespace Framework\Helpers;

use Framework\Router\Route;
use Framework\Router\Router;

class Functions
{

    
    public static function registerController(Router $router, string $controller)
    {
        $class = new \ReflectionClass($controller);
        $routeAttributes = $class->getAttributes(Route::class);
        $prefix = '';
        if (!empty($routeAttributes)) $prefix = $routeAttributes[0]->newInstance()->getPath();
        foreach ($class->getMethods() as $method) {
            $routeAttributes = $method->getAttributes(Route::class);
            if (empty($routeAttributes)) continue;
            foreach ($routeAttributes as $routeAttribute) {
                /** @var Route $route */
                $route = $routeAttribute->newInstance();
                $httpMethod = $route->getMethod();
                $path = [$prefix, $route->getPath()];
                foreach ($path as $el) {
                    $el = trim($el, "/");
                }
                if ($_SERVER['REQUEST_METHOD'] == $httpMethod) {
                    if ($router->match(trim(join("/", $path), "/"))) {
                        $router->execute($controller, $method->getName());
                        return "found";
                    }
                }
            }
        }
        return false;
    }

    /**
     * Get an excerpt
     *
     * @param string $content The content to be transformed
     * @param int    $length  The number of words
     * @return string
     */
    public static function getExcerpt($content, $length = 120): string
    {
        $excerpt = strip_tags(trim($content));
        $words = str_word_count($excerpt, 2);
        if (count($words) > $length) {
            $words = array_slice($words, 0, $length, true);
            end($words);
            $position = key($words) + strlen(current($words));
            $excerpt = substr($excerpt, 0, $position);
        }
        return $excerpt;
    }

    public static function slugify(string $strToSlugify): string
    {
        $strToSlugify = strip_tags($strToSlugify);
        $strToSlugify = preg_replace('~[^\pL\d]+~u', '-', $strToSlugify);
        setlocale(LC_ALL, 'fr_FR.utf8');
        $strToSlugify = iconv('utf-8', 'us-ascii//TRANSLIT', $strToSlugify);
        $strToSlugify = preg_replace('~[^-\w]+~', '', $strToSlugify);
        $strToSlugify = trim($strToSlugify, '-');
        $strToSlugify = preg_replace('~-+~', '-', $strToSlugify);
        $strToSlugify = strtolower($strToSlugify);
        if (empty($strToSlugify)) return 'n-a';
        return $strToSlugify;
    }
}
