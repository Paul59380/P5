<?php
require ('vendor/autoload.php');

//Routing
$page = 'connection';
if(isset($_GET['action'])) {
    $page = $_GET['action'];
}

//Render template
$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$twig = new Twig_Environment($loader, [
    'cache' => false, // __DIR__ . '/tmp'
]);
// Recupération de données
$fluvialTripController = \controller\FluvialTripController::getInstance();
$fluvialTrips = $fluvialTripController->getListFluvialTrips();

switch ($page) {
    case 'connection':
        echo $twig->render('connection.twig');
        break;
    case 'inscription':
        echo $twig->render('inscription.twig');
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}

