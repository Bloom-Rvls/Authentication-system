<?php

namespace App;

class User {
    public $id;
    public $username;
    public $userpassword;
    public $role;

    public function __construct(int $id, string $username, string $userpassword, string $role)
    {
        $this->id = $id;
        $this->username = $username;
        $this->userpassword = $userpassword;
        $this->role = $role;
    }
}