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
}
