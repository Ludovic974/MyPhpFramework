<?php

namespace Framework\App\Repositories;

use Framework\App\Models\User;
use Framework\Helpers\Database;
use Framework\Helpers\Location;

class UserRepositories extends BaseRepositories
{

    const USERNOTFOUND = "00404";

    public function __construct()
    {
        parent::__construct();
        Database::setModel(User::class);
        $this->setTable("users");
    }

    public function loginUser(array $postData)
    {
        $userName = $postData["user_name"];
        $userPass = $postData["user_pass"];

        $userNameColumn = "user_name";

        if (str_contains("@", $userName)) {
            $userNameColumn = "user_mail";
        }

        /**
         * ! Erreur personnalisé a mettre en place : Nom d'utilisateur/email ok mais mdp incorrect
         * ! Mettre le password en MD5 ou autre
         */
        $this->setQuery("SELECT * FROM {$this->getTable()} WHERE {$userNameColumn}=:{$userNameColumn} AND user_pass=:user_pass");
        $user = $this->getDb()->runQuery($this->getQuery(), Database::SELECT_ONE, [
            $userNameColumn => $userName,
            "user_pass" => $userPass
        ]);
        if (!$user) Location::redirect("/se-connecter", "?formulaire_erreur=" . UserRepositories::USERNOTFOUND);
        return $_SESSION["user"] = $user;
    }
}
