<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:57
 */

namespace model;

class UserManager
{
    protected static $instance;
    protected $db;

    protected function __construct()
    {
        $this->db = PDOFactory::connectedAtDataBase();
    }

    public function __clone()
    {
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    public function getListUsers()
    {

    }

    public function getUser($id)
    {
        $q = $this->db->prepare('SELECT * FROM user WHERE id ='.$id);
        $q->execute();
        $data = $q->fetch(\PDO::FETCH_ASSOC);
        return $data;
    }

    public function addUser($idRole, $name, $firstName, $pass, $phone)
    {

    }

    public function existUser($name, $firstName, $pass)
    {

    }

    public function deleteUser($name)
    {

    }
}
