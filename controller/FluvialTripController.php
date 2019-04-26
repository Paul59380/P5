<?php

namespace controller;

use model\FluvialTripManager;

class FluvialTripController
{
    protected static $instance;
    protected $fluvialTripManager;

    protected function __construct()
    {
        $this->fluvialTripManager = FluvialTripManager::getInstance();
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

    public function getListFluvialTrips()
    {
        return $this->fluvialTripManager->getListFluvialTrips();
    }

    public function getFluvialTrip($id)
    {
        return $this->fluvialTripManager->getFluvialTrip($id);
    }

    public function addFluvialTrip($cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date)
    {
        return $this->fluvialTripManager->addFluvialTrip($cityStart, $cityStartLat, $cityStartLon
            , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date);
    }

    public function deleteFluvialTrip($id)
    {
        return $this->fluvialTripManager->deleteFluvialTrip($id);
    }

    public function updateFluvialTrip($id, $cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date)
    {
        return $this->fluvialTripManager->updateFluvialTrip($id, $cityStart, $cityStartLat, $cityStartLon
            , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date);
    }
}
