<?php
require ('vendor/autoload.php');
/*
require('vendor/twig/twig/lib/Twig/Extension/Twig_Extension_Session.php');
$loader = new Twig_Loader_Filesystem(__DIR__ . '/views');
$twig = new Twig_Environment($loader, [
    'cache' => false, // __DIR__ . '/tmp'
]);

 * switch ($page) {
    case 'connection':
        echo $twig->render('connection.php');
        break;
    case 'inscription':
        echo $twig->render('inscription.php');
        break;
    case 'home':
        echo $twig->render('userHome.php', [flash($_POST['name'], $_POST['firstName'])]);
        break;
    default:
        header('HTTP/1.0 404 Not Found');
        echo $twig->render('404.twig');
        break;
}
 */

if($_GET['action'] == 'home') {
    require('views/userHome.php');
}
