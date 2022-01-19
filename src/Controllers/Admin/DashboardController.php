<?php

namespace Framework\App\Controllers\Admin;

use Framework\Router\Route;
use Framework\App\Controllers\BaseController;

#[
    Route("admin"),
]
class DashboardController extends BaseController
{
    public function __construct()
    {
        $this->setMultiple("admin/base-admin")->setSingle("admin/base-admin");
    }

    #[
        Route("/"),
        Route("/dashboard")
    ]
    public function index()
    {
        return $this->view($this->getMultiple());
    }
}
