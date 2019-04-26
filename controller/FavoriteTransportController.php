<?php

namespace controller;

use model\FavoriteTransportManager;

class FavoriteTransportController
{
    protected static $instance;
    protected $favoriteTransportManager;

    protected function __construct()
    {
        $this->favoriteTransportManager = FavoriteTransportManager::getInstance();
    }

    protected function __clone()
    {
    }

    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function addFavoriteTrip($idTrip, $idSessionUser)
    {
        return $this->favoriteTransportManager->addFavoriteTrip($idTrip, $idSessionUser);
    }

    public function getFavoriteTrip($idUser)
    {
        return $this->favoriteTransportManager->getFavoriteTrip($idUser);
    }

    public function deleteFavoriteTrip($id)
    {
        return $this->favoriteTransportManager->deleteFavoriteTrip($id);
    }
}
