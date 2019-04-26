<?php

namespace model;

class PositionManager
{
    protected $db;
    protected static $instance;

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

    public function getPosition($id_user)
    {
        $q = $this->db->prepare('SELECT * FROM position_user WHERE id_user = :id_user');
        $q->execute(array(
            ":id_user" => $id_user
        ));

        $data = $q->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function updatePosition($id, $city, $lat, $lon)
    {
        $q = $this->db->prepare('UPDATE position_user SET city_position = :city, lat_position = :lat , lon_position = :lon WHERE id_user = :id');
        $q->execute(array(
            ":id" => $id,
            ":city" => $city,
            ":lat" => $lat,
            ":lon" => $lon
        ));
    }

    public function addPosition($id_User)
    {
        $q = $this->db->prepare('INSERT INTO position_user (id_user) VALUE (:id_user)');
        $q->execute(array(
            ":id_user" => $id_User
        ));
    }
}
