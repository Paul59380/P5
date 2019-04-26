<?php

namespace model;

class FavoriteTransport
{
    protected $id;
    protected $id_user;
    protected $departure_city;
    protected $lat_departure;
    protected $lon_departure;
    protected $finishing_city;
    protected $lat_finishing;
    protected $lon_finishing;
    protected $price_ton;
    protected $weight;
    protected $date_transport;

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

    public function setDeparture_city($departure_city)
    {
        $this->departure_city = $departure_city;
    }

    public function getDeparture_city()
    {
        return $this->departure_city;
    }

    public function setLat_departure($lat_departure)
    {
        $this->lat_departure = $lat_departure;
    }

    public function getLat_departure()
    {
        return $this->lat_departure;
    }

    public function setLon_departure($lon_departure)
    {
        $this->lon_departure = $lon_departure;
    }

    public function getLon_departure()
    {
        return $this->lon_departure;
    }

    public function setFinishing_city($finishing_city)
    {
        $this->finishing_city = $finishing_city;
    }

    public function getFinishing_city()
    {
        return $this->finishing_city;
    }

    public function setLat_finishing($lat_finishing)
    {
        $this->lat_finishing = $lat_finishing;
    }

    public function getLat_finishing()
    {
        return $this->lat_finishing;
    }

    public function setLon_finishing($lon_finishing)
    {
        $this->lon_finishing = $lon_finishing;
    }

    public function getLon_finishing()
    {
        return $this->lon_finishing;
    }

    public function setPrice_ton($price_ton)
    {
        $this->price_ton = $price_ton;
    }

    public function getPrice_ton()
    {
        return $this->price_ton;
    }

    public function setWeight($weight)
    {
        $this->weight = $weight;
    }

    public function getWeight()
    {
        return $this->weight;
    }

    public function setDate_transport($date_transport)
    {
        $this->date_transport = $date_transport;
    }

    public function getDate_transport()
    {
        return $this->date_transport;
    }
}

