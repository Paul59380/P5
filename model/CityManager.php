<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 15:02
 */

namespace model;

class CityManager
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

    public function getListCities()
    {
    }

    public function getCity($name)
    {
    }

    public function deleteCity($name)
    {
    }

    public function addCity($name, $lat, $lng)
    {
    }
}
