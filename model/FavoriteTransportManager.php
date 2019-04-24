<?php

namespace model;

use PDO;

class FavoriteTransportManager
{
    protected static $instance;
    protected $db;

    protected function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function __clone()
    {
    }

    public function addFavoriteTrip($idTrip, $idSessionUser)
    {
        $q = $this->db->query("SELECT * FROM fluvial_trip WHERE id =" . $idTrip);
        $data = $q->fetch(PDO::FETCH_ASSOC);

        $addTrip = $this->db->prepare('INSERT INTO favorite_transport(id_user, departure_city, lat_departure, lon_departure, finishing_city, lat_finishing, lon_finishing, price_ton, weight, date_transport) VALUE (:id_user, :d_city, :d_lat, :d_lon, :f_city, :f_lat, :f_lon, :price_ton, :weight, :date_trans)');
        $addTrip->execute(array(
            ":id_user" => $idSessionUser,
            ":d_city" => $data['departure_city'],
            ":d_lat" => $data['lat_departure'],
            ":d_lon" => $data['lon_departure'],
            ":f_city" => $data['finishing_city'],
            ":f_lat" => $data['lat_finishing'],
            ":f_lon" => $data['lon_finishing'],
            ":price_ton" => $data['price_ton'],
            ":weight" => $data['weight'],
            ":date_trans" => $data['date_transport'],
        ));
    }

    public function getFavoriteTrip($idUser)
    {
        $trips = [];
        $q = $this->db->prepare('SELECT * FROM favorite_transport WHERE id_user = :idUser ORDER BY id DESC');
        $q->execute(array(
            ":idUser" => $idUser
        ));
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $trips[] = new FavoriteTransport($data);
        }

        return $trips;
    }

    public function deleteFavoriteTrip($id)
    {
        return $q = $this->db->query('DELETE FROM favorite_transport WHERE id = ' . $id);
    }
}
