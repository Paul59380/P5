<?php
/**
 * Created by PhpStorm.
 * User: paulg
 * Date: 08/04/2019
 * Time: 14:31
 */

namespace model;

class PDOFactory
{
    public static function connectedAtDataBase()
    {
        $db = new \PDO('mysql:host=localhost;dbname=fluvial_p5;charset=utf8', 'root', '');
        $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

        return $db;
    }
}
