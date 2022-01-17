<?php

use Framework\Helpers\Database;
use Framework\App\Controllers\HomeController;
use Framework\Router\Route;

require_once "../vendor/autoload.php";
require_once "../config/config.php";

$url = $_GET["q"];

$db = new Database(DBNAME, DBHOST, DBUSER, DBPASS, DBCHARSET);

function registerController(string $controller)
{
    $class = new ReflectionClass($controller);
    $routeAttributes = $class->getAttributes(Route::class);
    $prefix = '';
    if (!empty($routeAttributes)) {
        $prefix = $routeAttributes[0]->newInstance()->getPath();
    }
    foreach ($class->getMethods() as $method) {
        $routeAttributes = $method->getAttributes(Route::class);
        if (empty($routeAttributes)) continue;
        foreach ($routeAttributes as $routeAttribute) {
            // dump($routeAttribute);
            /** @var Route $route */
            $route = $routeAttribute->newInstance();
            $path = $prefix . $route->getPath();
            $action = [new $controller, $method->getName()];
            /**
             * ! si url correspond a l'action du controller
             */

            // return call_user_func_array($action, []);
        }
    }
    
    // dump($attributes);
}

registerController(HomeController::class);
