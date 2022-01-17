<?php

namespace Framework\App\Controllers;

class BaseController
{
    protected function index()
    {
        echo "index";
    }

    protected function show(int $id)
    {
        echo "show: {$id}";
    }
}
