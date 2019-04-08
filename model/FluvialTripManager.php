<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:21
 */

namespace model;

class FluvialTripManager
{
    protected static $instance;
    protected $db;

    protected function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
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
    }

    public function getFluvialTrip($id)
    {
    }

    public function addFluvialTrip($cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight)
    {
    }

    public function deleteFluvialTrip($id)
    {
    }

    public function updateFluvialTrip($cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight)
    {
    }
}
