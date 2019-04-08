<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 14:39
 */

namespace model;

class BoatManager
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

    public function getListBoats()
    {
    }

    public function getOwnerBoat($idUser)
    {
        $q = $this->db->prepare('SELECT * FROM boat WHERE id ='.$idUser);
        $q->execute();
        $data = $q->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function chooseBoats($capacity)
    {
    }

    public function deleteBoat($id)
    {
    }

    public function addBoat($idUser, $name, $capacity)
    {
    }

    public function updateBoat($name, $capacity)
    {
    }
}
