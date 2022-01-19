<?php

namespace Framework\App\Repositories;

use Framework\App\Models\Post;
use Framework\Helpers\Database;

class PostRepositories extends BaseRepositories
{
    public function __construct()
    {
        parent::__construct();
        Database::setModel(Post::class);
        $this->setTable("posts");
    }
}
