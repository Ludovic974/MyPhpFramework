<?php

namespace Framework\App\Models;

class User extends Model
{
    private int $id;
    private string $user_name;
    private string $user_mail;
    private string $user_pass;
    private int $user_role_id;

    public function getId()
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->user_name;
    }

    public function getMail(): string
    {
        return $this->user_mail;
    }

    public function getPassword()
    {
        return $this->user_pass;
    }

    public function getRoleId()
    {
        return $this->user_role_id;
    }
}
