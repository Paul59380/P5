<?php

namespace controller;

use model\UserManager;

class UserController
{
    protected static $instance;
    protected $userManager;

    protected function __construct()
    {
        $this->userManager = UserManager::getInstance();
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getListUsers()
    {
        return $this->userManager->getListUsers();
    }

    public function addUser($name, $firstName, $phone, $pass)
    {
        return $this->userManager->addUser($name, $firstName, $phone, $pass);
    }

    public function existUser($info, $firstName)
    {
        return $this->userManager->existUser($info, $firstName);
    }

    /**
     * @param $id
     * @param $name
     * @param $firstName
     * @throws \Exception
     */
    public function deleteUser($id, $name, $firstName)
    {
        return $this->userManager->deleteUser($id, $name, $firstName);
    }

    public function getUser($name)
    {
        return $this->userManager->getUser($name);
    }
}
