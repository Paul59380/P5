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

    public function getListCities()
    {
        return $this->cityManager->getListCities();
    }

    public function getCity($name)
    {
        return $this->cityManager->getCity($name);
    }

    public function deleteCity($name)
    {
        return $this->cityManager->deleteCity($name);
    }

    public function addCity($name, $lat, $lon)
    {
        return $this->cityManager->addCity($name, $lat, $lon);
    }
}
