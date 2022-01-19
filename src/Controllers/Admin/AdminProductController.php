<?php

namespace Framework\App\Controllers\Admin;

use Framework\App\Controllers\ProductController;
use Framework\Router\Route;

#[
    Route("admin/")
]
class AdminProductController extends ProductController
{
    
    public function __construct()
    {
        parent::__construct();
        $this->setMultiple("admin/products");
    }

    #[
        Route("produits"),
        Route("products")
    ]
    public function index()
    {
        parent::index();
    }
}
