<?php

namespace controller;

use model\FluvialTripManager;

class FluvialTripController
{
    protected static $instance;
    protected $fluvialTripManager;

    protected function __construct()
    {
        $this->fluvialTripManager = FluvialTripManager::getInstance();
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
}
