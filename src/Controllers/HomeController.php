<?php

namespace Framework\App\Controllers;

use Framework\App\Repositories\HomeRepositories;
use Framework\Router\Route;

class HomeController extends BaseController
{

    public function __construct()
    {
        $this->setRepo(new HomeRepositories);
        $this->setMultiple("home");
    }

    #[
        Route("/"),
        Route("/home")
    ]
    public function index()
    {
        parent::index();
    }
}
