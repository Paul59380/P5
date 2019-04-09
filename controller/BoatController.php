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

    public function getListBoat()
    {
        $boats = $this->boatManager->getListBoats();

        return $boats;
    }

    public function chooseBoat($capacity)
    {
        $data = $this->boatManager->chooseBoats($capacity);

        return $data;
    }

    public function deleteBoat($id)
    {
        return $this->boatManager->deleteBoat($id);
    }

    public function addBoat($idUser, $name, $capacity)
    {
        return $this->boatManager->addBoat($idUser, $name, $capacity);
    }

    public function updateBoat($id, $newName, $capacity)
    {
        return $this->boatManager->updateBoat($id, $newName, $capacity);
    }
}
