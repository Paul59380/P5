<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 14:39
 */

namespace model;

use PDO;

class BoatManager
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

    public function getListBoats($capacity)
    {
        $boats = [];

        $q = $this->db->prepare('SELECT * FROM boat WHERE capacity = :capacity');
        $q->execute(array(
            ":capacity" => $capacity
        ));
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $boats[] = new Boat($data);
        }

        return $boats;
    }

    public function getOwnerBoat($idUser)
    {
        $boats = [];
        $q = $this->db->prepare('SELECT * FROM boat WHERE id_user =' . $idUser);
        $q->execute();
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $boats[] = new Boat($data);
        }

        return $boats;
    }

    public function chooseBoats($capacity)
    {
        $boats = [];

        $q = $this->db->prepare('SELECT * FROM  boat WHERE capacity = :capacity');
        $q->execute(array(
            ":capacity" => $capacity
        ));
        while ($data = $q->fetch(PDO::FETCH_ASSOC)) {
            $boats[] = new Boat($data);
        }

        return $boats;
    }

    public function deleteBoat($id)
    {
        $q = $this->db->prepare('DELETE FROM boat WHERE id =' . $id);
        $q->execute();
    }

    public function getBoatByName($name)
    {
        $q = $this->db->prepare('SELECT * FROM boat WHERE name = :name');
        $q->execute(array(":name" => $name));

        return new Boat($q->fetch(PDO::FETCH_ASSOC));
    }

    public function addBoat($idUser, $name, $capacity)
    {
        $q = $this->db->prepare('INSERT INTO boat (id_user, name, capacity) VALUE (:idUser, :name, :capacity)');
        $q->execute(array(
            ":idUser" => $idUser,
            ":name" => $name,
            ":capacity" => $capacity
        ));
    }

    public function updateBoat($id, $newName, $capacity)
    {
        $q = $this->db->prepare('UPDATE boat SET name = :name, capacity = :capacity WHERE id =' . $id);
        $q->execute(array(
            ":name" => $newName,
            ":capacity" => $capacity
        ));
    }

    protected function __clone()
    {
    }
}
