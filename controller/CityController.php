<?php

namespace controller;

use model\CityManager;

class CityController
{
    protected static $instance;
    protected $cityManager;

    protected function __construct()
    {
        $this->cityManager = CityManager::getInstance();
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
