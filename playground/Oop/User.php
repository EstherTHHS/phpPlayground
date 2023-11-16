<?php

namespace Oop;

class User
{
    private $userId;
    private $userName;
    private $email;

    protected $role;

    public function __construct($userId, $userName, $email)
    {
        $this->userId = $userId;
        $this->userName = $userName;
        $this->email = $email;
    }

    public function getUserName()
    {
        return $this->userName;
    }

    public function setUserName($userName)
    {
        $this->userName = $userName;
    }
}