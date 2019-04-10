<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:02
 */

namespace model;

use PDO;

class CityManager
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

    public function getListCities()
    {
        $cities = [];
        $q = $this->db->query('SELECT * FROM city');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $cities[] = new City($data);
        }

        return $cities;
    }

    public function getCity($name)
    {
        $q = $this->db->prepare('SELECT * FROM city WHERE name = :name');
        $q->execute(array(
            ":name" => $name
        ));

        return new City($q->fetch(PDO::FETCH_ASSOC));
    }

    public function deleteCity($name)
    {
        $q = $this->db->prepare('DELETE FROM city WHERE name = :name');
        $q->execute(array(":name" => $name));
    }

    public function addCity($name, $lat, $lon)
    {
        $q = $this->db->prepare('INSERT INTO city (name, lat, lon) VALUE (:name, :lat, :lon)');
        $q->execute(array(
            ":name" => $name,
            ":lat" => $lat,
            ":lon" => $lon
        ));
    }
}
