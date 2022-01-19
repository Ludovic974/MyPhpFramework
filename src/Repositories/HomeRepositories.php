<?php

namespace Framework\App\Repositories;

use Framework\App\Models\Test;
use Framework\Helpers\Database;

class HomeRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
        Database::setModel(Test::class);
        $this->setTable("test");
    }
}
