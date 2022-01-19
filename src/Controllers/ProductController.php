<?php

namespace Framework\App\Controllers;

use Framework\App\Repositories\ProductRepositories;
use Framework\Router\Route;

class ProductController extends BaseController
{

    public function __construct()
    {
        $this->setRepo(new ProductRepositories);
        $this->setMultiple("shop")->setSingle("single/product");
    }

    #[
        Route("/shop"),
        Route("/boutique"),
    ]
    public function index()
    {
        parent::index();
    }
    
    #[
        Route("/produit/{id}"),
        Route("/product/{id}")
    ]
    public function show(int|string $id)
    {
        echo "product show: {$id}";
    }
}
