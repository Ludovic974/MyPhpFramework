<?php

namespace Framework\App\Controllers;

use Framework\Router\Route;

class HomeController extends BaseController
{
    #[
        Route("/"),
        Route("/home")
    ]
    public function index()
    {
        echo "home index";
    }
    
    public function show(int $id)
    {
        echo "home show: {$id}";
    }
}
