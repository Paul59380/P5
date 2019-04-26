<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:45
 */

namespace model;

class User
{
    protected $id;
    protected $id_role;
    protected $name;
    protected $firstname;
    protected $pass;
    protected $phone;
    protected $mail;
    protected $position;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value) {
            $method = 'set' . ucfirst($key);
            $this->$method($value);
        }
        $positionManager = PositionManager::getInstance();
        $this->position = $positionManager->getPosition($this->id);
    }

    public function getMail()
    {
        return $this->mail;
    }

    public function setMail($mail)
    {
        $this->mail = $mail;
    }
    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setFirstname($firstname)
    {
        $this->firstname = $firstname;
    }

    public function getFirstname()
    {
        return $this->firstname;
    }

    public function setId_role($id_role)
    {
        $this->id_role = $id_role;
    }

    public function getId_role()
    {
        return $this->id_role;
    }

    public function setPass($pass)
    {
        $this->pass = $pass;
    }

    public function getPass()
    {
        return $this->pass;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getPhone()
    {
        return $this->phone;
    }

    public function getPosition()
    {
        return $this->position;
    }

    public function setPosition($position)
    {
        $this->position = $position;
    }
}
