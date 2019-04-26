<?php

namespace model;

class Position
{
    protected $id;
    protected $id_user;
    protected $city_position;
    protected $lat_position;
    protected $lon_position;

    public function __construct($data)
    {
        $this->hydrate($data);
    }

    public function hydrate(array $data)
    {
        foreach ($data as $key => $value)
        {
            $method = 'set'. ucfirst($key);
            $this->$method($value);
        }
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }
    /**
     * @return mixed
     */
    public function getIdUser()
    {
        return $this->id_user;
    }

    /**
     * @param mixed $id_user
     */
    public function setId_user($id_user)
    {
        $this->id_user = $id_user;
    }

    /**
     * @return mixed
     */
    public function getCity_position()
    {
        return $this->city_position;
    }

    /**
     * @param mixed $city_position
     */
    public function setCity_position($city_position)
    {
        $this->city_position = $city_position;
    }

    /**
     * @return mixed
     */
    public function getLat_position()
    {
        return $this->lat_position;
    }

    /**
     * @param mixed $lat_position
     */
    public function setLat_position($lat_position)
    {
        $this->lat_position = $lat_position;
    }

    /**
     * @return mixed
     */
    public function getLon_position()
    {
        return $this->lon_position;
    }

    /**
     * @param mixed $lon_position
     */
    public function setLon_position($lon_position)
    {
        $this->lon_position = $lon_position;
    }
}
