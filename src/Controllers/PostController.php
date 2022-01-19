<?php

namespace Framework\App\Controllers;

use Framework\App\Repositories\PostRepositories;
use Framework\Router\Route;

class PostController extends BaseController
{

    public function __construct()
    {
        $this->setRepo(new PostRepositories);
        $this->setMultiple("blog")->setSingle("single/post");
    }

    #[
        Route("/blog"),
    ]
    public function index()
    {
        parent::index();
    }
    
    #[
        Route("/article/{id}"),
        Route("/post/{id}")
    ]
    public function show(int|string $id)
    {
        echo "blog show: {$id}";
    }
}
