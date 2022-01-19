<?php

namespace Framework\App\Repositories;

use Framework\App\Models\Product;
use Framework\Helpers\Database;

class ProductRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
        Database::setModel(Product::class);
        $this->setTable("products");
    }
}
