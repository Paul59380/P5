<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:21
 */

namespace model;

use PDO;

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
        $fluvialTrips = [];
        $q = $this->db->query('SELECT * FROM fluvial_trip');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $fluvialTrips[] = new FluvialTrip($data);
        }

        return $fluvialTrips;
    }

    public function getFluvialTrip($id)
    {
        $q = $this->db->prepare('SELECT * FROM fluvial_trip WHERE id = '.$id);
        $q->execute();
        return new FluvialTrip($q->fetch(PDO::FETCH_ASSOC));
    }

    public function addFluvialTrip($cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date)
    {
        $q = $this->db->prepare('INSERT INTO fluvial_trip 
    (departure_city, lat_departure, lon_departure, finishing_city, lat_finishing, lon_finishing, price_ton, weight, date_transport) VALUE 
    (:departure, :d_lat, :d_lon, :finishing, :f_lat, :f_lon, :price_ton, :weight, :date_trans)');
        $q->execute(array(
            ":departure" => $cityStart,
            ":d_lat" => $cityStartLat,
            ":d_lon" => $cityStartLon,
            ":finishing" => $cityFinish,
            ":f_lat" => $cityFinishLat,
            ":f_lon" => $cityFinishLon,
            ":price_ton" => $priceTon,
            ":weight" => $weight,
            ":date_trans" => $date
        ));
    }

    public function deleteFluvialTrip($id)
    {
        $q = $this->db->prepare('DELETE FROM fluvial_trip WHERE id = '.$id);
        $q->execute();
    }

    public function updateFluvialTrip($id, $cityStart, $cityStartLat, $cityStartLon
        , $cityFinish, $cityFinishLat, $cityFinishLon, $priceTon, $weight, $date)
    {
        $q = $this->db->prepare('UPDATE fluvial_trip SET 
                        departure_city = :departureName, lat_departure = :departure_lat ,
                        lon_departure = :departure_lon, finishing_city = :finishingName,
                        lat_finishing = :finishing_lat, lon_finishing = :finishing_lon,
                        price_ton = :price_ton, weight = :weight, date_transport = :date_trans
                        WHERE id =' . $id);
        $q->execute(array(
            ":departureName" => $cityStart,
            ":departure_lat" => $cityStartLat,
            ":departure_lon" => $cityStartLon,
            ":finishingName" => $cityFinish,
            ":finishing_lat" => $cityFinishLat,
            ":finishing_lon" => $cityFinishLon,
            ":price_ton" => $priceTon,
            ":weight" => $weight,
            ":date_trans" => $date,
        ));
    }
}
