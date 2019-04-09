<?php

namespace controller;

use model\BoatManager;

class BoatController
{
    protected static $instance;
    protected $boatManager;

    protected function __construct()
    {
        $this->boatManager = BoatManager::getInstance();
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

    public function getOwnerBoat($idUser)
    {
        $data = $this->boatManager->getOwnerBoat($idUser);
        return $data;
    }
}
