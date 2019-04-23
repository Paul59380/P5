<?php
namespace controller;
use Exception;
use model\User;

class ControllerIndex
{
    protected $fluvialTripController;
    protected $userController;
    protected $cityController;
    protected $boatController;
    protected $favoriteController;

    public function __construct()
    {
        $this->fluvialTripController = FluvialTripController::getInstance();
        $this->userController = UserController::getInstance();
        $this->cityController = CityController::getInstance();
        $this->boatController = BoatController::getInstance();
        $this->favoriteController = FavoriteTransportController::getInstance();
    }

    public function displayConnectForm(){
        require('views/connection.php');
        if (!empty($_POST['name']) && !empty($_POST['firstName']) && !empty($_POST['password'])) {
            if ($this->userController->existUser($_POST['name'], $_POST['firstName'])) {
                $user = new User($this->userController->getUser($_POST['name'], $_POST['firstName']));
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
    }

    public function displayInscriptionForm()
    {
        require('views/inscription.php');
        if (!empty($_POST['NewName']) && !empty($_POST['NewFirstName']) && !empty($_POST['NewPassword']) && !empty($_POST['PhoneNumber'])) {
            if (!$this->userController->existUser($_POST['NewName'], $_POST['NewFirstName'])) {
                $this->userController->addUser($_POST['NewName'], $_POST['NewFirstName'],$_POST['PhoneNumber'], password_hash($_POST['NewPassword'],PASSWORD_DEFAULT));
                $user = new User($this->userController->getUser($_POST['NewName'], $_POST['NewFirstName']));
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
    }

    public function displayHomeUser()
    {
        require('views/userHome.php');
    }

    public function displayHomeAdmin()
    {
        require('views/adminHome.php');
    }

    public function displayUserTrips()
    {
        if (isset($_GET['idTrip'])) {
            $getTrip = $this->fluvialTripController->getFluvialTrip($_GET['idTrip']);
        }
        $trips = $this->fluvialTripController->getListFluvialTrips();
        $favoriteTrips = $this->favoriteController->getFavoriteTrip($_GET['idUser']);
        require('views/userTrip.php');
    }

    public function displayFormAddTrip()
    {
        $trips = $this->fluvialTripController->getListFluvialTrips();
        $cities = $this->cityController->getListCities();
        require('views/adminAddTrip.php');
    }


    public function adminAddTrip()
    {
        try{
            $depart = (int)$_POST['departure_city'];
            $finish = (int)$_POST['finishing_city'];
            $departure = $this->cityController->getCity($depart);
            $finishing = $this->cityController->getCity($finish);

            $this->fluvialTripController->addFluvialTrip($departure->getName(),$departure->getLat(),$departure->getLon(),$finishing->getName(),$finishing->getLat(),$finishing->getLon(),$_POST['price_ton'],$_POST['weight'], $_POST['date_transport']);
            header('Location:index.php?action=adminAddTrip');
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    public function addCity()
    {
        $this->cityController->addCity($_POST['city'], $_POST['lat'], $_POST['lon']);
        header('Location:index.php?action=adminAddTrip');
    }

    public function displaySearchBoat()
    {
        $trips = $this->fluvialTripController->getListFluvialTrips();
        require('views/adminSearch.php');
    }

    public function searchBoat()
    {
        $trip = $this->fluvialTripController->getFluvialTrip($_GET['idTrip']);
        $boats = $this->boatController->getListBoat($_GET['capacity']);
        require('views/adminBoat.php');
    }

    public function displayOwnerBoat()
    {
        $boats = $this->boatController->getOwnerBoat($_GET['idUser']);
        require('views/userBoat.php');
    }

    public function addBoat()
    {
        $this->boatController->addBoat($_GET['idUser'], $_POST['name'], $_POST['capacity']);
        header('Location:index.php?action=addBoat&idUser='.$_GET['idUser']);
    }

    public function addFavoriteTrip()
    {
        $this->favoriteController->addFavoriteTrip($_GET['idTrip'], $_GET['idUser']);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }

    public function deleteFavoriteTrip()
    {
        $this->favoriteController->deleteFavoriteTrip($_GET['idFavorite']);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }

    public function deleteBoat()
    {
        $this->boatController->deleteBoat($_GET['idBoat']);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }

    public function displayUpdateTrip()
    {
        $trip = $this->fluvialTripController->getFluvialTrip($_GET['idTrip']);
        $cities = $this->cityController->getListCities();
        require('views/adminUpdateTrip.php');
    }

    public function updateTrip()
    {
        $depart = (int)$_POST['departure_city'];
        $finish = (int)$_POST['finishing_city'];
        $departure = $this->cityController->getCity($depart);
        $finishing = $this->cityController->getCity($finish);

        $this->fluvialTripController->updateFluvialTrip($_GET['idTrip'], $departure->getName(), $departure->getLat(), $departure->getLon(), $finishing->getName(), $finishing->getLat(), $finishing->getLon(), $_POST['price_ton'], $_POST['weight'], $_POST['date_transport']);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }

    public function deleteTrip()
    {
        $this->fluvialTripController->deleteFluvialTrip($_GET['idTrip']);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }

    public function disconnection()
    {
        session_destroy();
        header('Location:index.php');
    }
}
