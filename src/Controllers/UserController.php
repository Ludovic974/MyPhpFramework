<?php

namespace Framework\App\Controllers;

use Framework\App\Repositories\UserRepositories;
use Framework\Helpers\Location;
use Framework\Router\Route;

class UserController extends BaseController
{

    public function __construct()
    {
        $this->setRepo(new UserRepositories);
    }

    #[
        Route("/login"),
        Route("/se-connecter"),
    ]
    public function loginView()
    {
        return $this->view("auth/login", [
            "entities" => $this->getRepo()->all(),
        ]);
    }

    #[
        Route("/login", "POST"),
        Route("/se-connecter", "POST"),
    ]
    public function loginAction()
    {
        if (isset($_POST["user_name"]) && isset($_POST["user_pass"])) {
            /** @var UserRepositories $repo */
            $repo = $this->getRepo();
            if ($repo->loginUser($_POST)) Location::redirect("/home");
        }
    }
    
    #[
        Route("/register"),
        Route("/s-enregistrer")
    ]
    public function registerAction()
    {
        return $this->view("auth/register");
    }

    #[
        Route("/logout"),
        Route("/se-deconnecter"),
    ]
    public function logoutAction()
    {
        if (!isset($_SESSION["user"])) {
            Location::redirect("/");
        } else {
            unset($_SESSION["user"]);
            Location::redirect("/se-connecter");
        }
    }
}
