<?php
require ('vendor/autoload.php');

use controller\FluvialTripController;
use model\FluvialTrip;
use controller\FavoriteTransportController;
use controller\BoatController;
use controller\CityController;
use controller\UserController;

$fluvialTripController = FluvialTripController::getInstance();

if($_GET['action'] == 'homeUser') {
    $trips = $fluvialTripController->getListFluvialTrips();
    require('views/userHome.php');
}
