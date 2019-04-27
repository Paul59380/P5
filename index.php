<?php

session_start();
require('vendor/autoload.php');
use controller\ControllerIndex;

$controller = new ControllerIndex();

if (!isset($_GET['action'])) {
    try{
        $controller->displayConnectForm();
    } catch (Exception $e){
        echo '<p style="font-size: 25px; text-align: center; color: red;">' . $e->getMessage() . '</p>';
    }
} elseif ($_GET['action'] == "inscription") {
    try{
        $controller->displayInscriptionForm();
    } catch (Exception $e) {
        echo '<p style="font-size: 25px; text-align: center; color: red;">' . $e->getMessage() . '</p>';
    }
} elseif ($_GET['action'] == "deconnexion") {
    $controller->disconnection();
} elseif ($_GET['action'] == "homeUser" && isset($_GET['idUser'])) {
    $controller->displayHomeUser();
} elseif ($_GET['action'] == 'Trips' && isset($_GET['idUser'])) {
    $controller->displayUserTrips();
} elseif ($_GET['action'] == "admin") {
    $controller->displayHomeAdmin();
} elseif ($_GET['action'] == "adminAddTrip") {
    $controller->displayFormAddTrip();
} elseif ($_GET['action'] == "addTrip") {
    $controller->adminAddTrip();
} elseif ($_GET['action'] == "addCities") {
    $controller->addCity();
} elseif ($_GET['action'] == "searchBoat") {
    $controller->displaySearchBoat();
} elseif ($_GET['action'] == "adminSearchBoat") {
    $controller->searchBoat();
} elseif ($_GET['action'] == "addBoat" && isset($_GET['idUser'])) {
    $controller->displayOwnerBoat();
} elseif ($_GET['action'] == "sendNewBoat") {
    $controller->addBoat();
} elseif ($_GET['action'] == "addFavoriteTrip") {
    $controller->addFavoriteTrip();
} elseif ($_GET['action'] == "deleteFavoriteTrip") {
    $controller->deleteFavoriteTrip();
} elseif ($_GET['action'] == "deleteBoat") {
    $controller->deleteBoat();
} elseif ($_GET['action'] == "updateTrip") {
    $controller->displayUpdateTrip();
} elseif ($_GET['action'] == "update") {
    $controller->updateTrip();
} elseif ($_GET['action'] == "deleteTrip") {
    $controller->deleteTrip();
} elseif ($_GET['action'] == "updatePosition") {
    $controller->updatePosition($_GET['idUser'], $_POST['city_position'], $_POST['lat_position'], $_POST['lon_position']);
}
