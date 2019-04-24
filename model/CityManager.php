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

    public function getListCities()
    {
        $cities = [];
        $q = $this->db->query('SELECT * FROM city');
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $cities[] = new City($data);
        }

        return $cities;
    }

    /**
     * @param $id
     * @return City
     * @throws \Exception
     */
    public function getCity($id)
    {
        if ($this->existCity($id)) {
            $q = $this->db->prepare('SELECT * FROM city WHERE id = :id');
            $q->execute(array(
                ":id" => $id
            ));

            return new City($q->fetch(PDO::FETCH_ASSOC));
        } else {
            throw new \Exception("Erreur : Cette ville n'as pas été àjouté à la liste de ville disponible");
        }
    }

    public function existCity($info)
    {
        if (is_int($info)) {
            return (bool)$this->db->query('SELECT * FROM city WHERE id =' . $info)->fetchColumn();
        } else {
            $q = $this->db->prepare('SELECT * FROM city WHERE name = :name');
            $q->execute(array(
                ':name' => $info
            ));

            return (bool)$q->fetchColumn();
        }
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

    protected function __clone()
    {
    }
}
