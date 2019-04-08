<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 14:33
 */

namespace model;

class Boat
{
    protected $id;
    protected $id_user;
    protected $name;
    protected $capacity;
    protected $user;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set' .ucfirst($key);
            $this->$method($value);
        }

        $userManager = UserManager::getInstance();
        $this->user = $userManager->getUser($this->id_user);
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    public function getId_user()
    {
        return $this->id_user;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setCapacity($capacity)
    {
        $this->capacity = $capacity;
    }

    public function getCapacity()
    {
        return $this->capacity;
    }
}
