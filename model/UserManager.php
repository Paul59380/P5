<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:57
 */

namespace model;

use Exception;

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
        $users = [];
        $q = $this->db->query('SELECT * FROM user');
        while ($data = $q->fetch(\PDO::FETCH_ASSOC)) {
            $users[] = new User($data);
        }

        return $users;
    }

    public function getUser($id)
    {
        $q = $this->db->prepare('SELECT * FROM user WHERE id =' . $id);
        $q->execute();
        $data = $q->fetch(\PDO::FETCH_ASSOC);

        return $data;
    }

    public function addUser($name, $firstName, $phone,  $pass)
    {
        $q = $this->db->prepare('INSERT INTO 
        user (id_role, name, firstname, pass, phone) VALUE (:id_role, :name, :first_name, :pass, :phone)');
        $q->execute(array(
            ":id_role" => 2,
            ":name" => $name,
            ":first_name" => $firstName,
            ":phone" => $phone,
            ":pass" => $pass
        ));
    }

    public function existUser($info)
    {
        if (is_int($info)) {
            return (bool)$this->db->query('SELECT * FROM user WHERE id =' . $info)->fetchColumn();
        } else {
            $q = $this->db->prepare('SELECT * FROM user WHERE name = :name');
            $q->execute([':name' => $info]);

            return (bool)$q->fetchColumn();
        }
    }

    /**
     * @param $id
     * @param $name
     * @param $firstName
     * @throws Exception
     */
    public function deleteUser($id, $name, $firstName)
    {
        if ($this->existUser($id)) {
            $q = $this->db->prepare('DELETE FROM user WHERE name = :name AND firstname = :firstName');
            $q->execute(array(
                ":name" => $name,
                ":firstName" => $firstName
            ));
        } else {
            throw new Exception("Le compte à supprimer n'existe pas");
        }
    }
}
