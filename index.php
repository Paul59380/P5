<?php
session_start();
require('vendor/autoload.php');

use controller\FluvialTripController;
use controller\UserController;
use model\User;

$fluvialTripController = FluvialTripController::getInstance();
$userController = UserController::getInstance();

if (!isset($_GET['action'])) {
    require('views/connection.php');
    if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['password'])) {
        if ($userController->existUser($_POST['name'], $_POST['firstName'])) {
            $user = new User($userController->getUser($_POST['name'], $_POST['firstName']));
            if (password_verify($_POST['password'], $user->getPass())) {
                $_SESSION = [
                    "name" => $user->getName(),
                    "firstName" => $user->getFirstname(),
                    "id" => $user->getId(),
                    "role" => $user->getId_role()
                ];
                header('Location:index.php?action=homeUser&idUser=' . $_SESSION['id']);
            } else {
                echo "Mot de pass incorrect";
                unset($user);
            }
        } else {
            echo "Compte inexistant";
        }
    }
} elseif ($_GET['action'] == "inscription") {
    require('views/inscription.php');
    if (!empty($_POST['NewName']) && !empty($_POST['NewFirstName']) && !empty($_POST['NewPassword']) && !empty($_POST['PhoneNumber'])) {
        if (!$userController->existUser($_POST['NewName'], $_POST['NewFirstName'])) {
            $userController->addUser($_POST['NewName'], $_POST['NewFirstName'],$_POST['PhoneNumber'], password_hash($_POST['NewPassword'],PASSWORD_DEFAULT));
            $user = new User($userController->getUser($_POST['NewName'], $_POST['NewFirstName']));
            $_SESSION = [
                "name" => $user->getName(),
                "firstName" => $user->getFirstname(),
                "id" => $user->getId(),
                "role" => $user->getId_role()
            ];
            header('Location:index.php?action=homeUser&idUser=' . $_SESSION['id']);
        } else {
            echo "Ce compte existe déjà";
        }
    }
} elseif ($_GET['action'] == "deconnexion") {
    session_destroy();
    header('Location:index.php');
} elseif ($_GET['action'] == 'homeUser' && isset($_GET['idUser'])) {
    if (isset($_GET['idTrip'])) {
        $getTrip = $fluvialTripController->getFluvialTrip($_GET['idTrip']);
    }
    $trips = $fluvialTripController->getListFluvialTrips();
    require('views/userHome.php');
}
