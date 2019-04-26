<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 14:54
 */

namespace model;

class City
{
    protected $id;
    protected $name;
    protected $lat;
    protected $lon;

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
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    function getId()
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

    public function setLat($lat)
    {
        $this->lat = $lat;
    }

    public function getLat()
    {
        return $this->lat;
    }

    public function setLon($lon)
    {
        $this->lon = $lon;
    }

    public function getLon()
    {
        return $this->lon;
    }
}
