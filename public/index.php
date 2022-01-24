<?php

use Framework\App\Controllers\Admin\AdminProductController;
use Framework\App\Controllers\Admin\DashboardController;
use Framework\Router\Router;
use Framework\App\Controllers\HomeController;
use Framework\App\Controllers\PostController;
use Framework\App\Controllers\ProductController;
use Framework\App\Controllers\UserController;
use Framework\Helpers\Functions;

require_once "../vendor/autoload.php";
require_once "../config/config.php";

$url = $_GET["q"];
$router = new Router($url);

$isApi = str_starts_with($url, "api");
$isAdmin = str_starts_with($url, "admin");

if (!session_id()) session_start();

$controllers = [
    HomeController::class,
    PostController::class,
    ProductController::class,
    UserController::class
];

if (isset($_SESSION["user"])) {
    $AdminControllers = [
        DashboardController::class,
        AdminProductController::class,
    ];
    $controllers = array_merge($controllers, $AdminControllers);
}

try {
    foreach ($controllers as $controller) {
        Functions::registerController($router, $controller);
    }
} catch (\Throwable $th) {
    dump($th);
}
