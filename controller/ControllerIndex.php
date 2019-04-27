<?php
//use Exception;
namespace controller;

use model\User;
use model\PositionManager;
use Exception;

class ControllerIndex
{
    protected $fluvialTripController;
    protected $userController;
    protected $cityController;
    protected $boatController;
    protected $favoriteController;
    protected $positionManager;
    protected $loader;
    protected $twig;

    public function __construct()
    {
        $this->fluvialTripController = FluvialTripController::getInstance();
        $this->userController = UserController::getInstance();
        $this->cityController = CityController::getInstance();
        $this->boatController = BoatController::getInstance();
        $this->favoriteController = FavoriteTransportController::getInstance();
        $this->positionManager = PositionManager::getInstance();
        $this->loader = new \Twig_Loader_Filesystem(__DIR__ . '/../views');
        $this->twig = new \Twig_Environment($this->loader, [
            'cache' => false
        ]);
    }

    public function displayConnectForm(){
        echo $this->twig->render('connection.php.twig');
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
                    if($_SESSION['role'] == 2){
                        echo '<script>document.location.href="index.php?action=homeUser&idUser= '.$_SESSION['id'].'" </script>';
                    } elseif ( $_SESSION['role'] == 1 ){
                        echo '<script>document.location.href="index.php?action=admin&idUser= '.$_SESSION['id'].'" </script>';
                    }
                } else {
                    throw new Exception("Mot de pass incorrect");
                }
            } else {
                throw new Exception("Compte inexistant");
            }
        }
    }

    public function displayInscriptionForm()
    {
        echo $this->twig->render('inscription.php.twig');
        if (!empty($_POST['NewName']) && !empty($_POST['NewFirstName']) && !empty($_POST['NewPassword']) && !empty($_POST['PhoneNumber']) && isset($_POST['NewMail'])) {
            if (!$this->userController->existUser($_POST['NewName'], $_POST['NewFirstName']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['NewMail'])) {
                $this->userController->addUser($_POST['NewName'], $_POST['NewFirstName'], $_POST['PhoneNumber'], password_hash($_POST['NewPassword'], PASSWORD_DEFAULT), $_POST['NewMail']);
                $user = new User($this->userController->getUser($_POST['NewName'], $_POST['NewFirstName']));
                $this->positionManager->addPosition($user->getId());
                $_SESSION = [
                    "name" => $user->getName(),
                    "firstName" => $user->getFirstname(),
                    "id" => $user->getId(),
                    "role" => $user->getId_role(),
                    "mail" => $user->getMail()
                ];
                if ($_SESSION['role'] == 2) {
                    echo '<script>document.location.href="index.php?action=homeUser&idUser='. $_SESSION['id'] . '" </script>';
                } elseif ($_SESSION['role'] == 1) {
                    echo '<script>document.location.href="index.php?action=admin&idUser='. $_SESSION['id'] . '" </script>';
                }
            } elseif(!preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['NewMail'])) {
                throw new Exception("Adresse mail non valide");
            } else {
                throw new Exception("Ce compte existe déjà");
            }
        }
    }

    public function displayHomeUser()
    {
        echo $this->twig->render('userHome.php.twig', ['session' => [
            'name' => $_SESSION['name'],
            'firstName' => $_SESSION['firstName'],
            'role' => $_SESSION['role'],
            'id' => $_SESSION['id']
        ]]);
    }

    public function displayHomeAdmin()
    {
        echo $this->twig->render('adminHome.php.twig', ['session' => [
            'name' => $_SESSION['name'],
            'firstName' => $_SESSION['firstName'],
            'role' => $_SESSION['role'],
            'id' => $_SESSION['id']
        ]]);
    }

    public function displayUserTrips()
    {
        if (isset($_GET['idTrip'])) {
            $getTrip = $this->fluvialTripController->getFluvialTrip($_GET['idTrip']);
            $trips = $this->fluvialTripController->getListFluvialTrips();
            $favoriteTrips = $this->favoriteController->getFavoriteTrip($_GET['idUser']);
            echo $this->twig->render('userTrip.php.twig', ['getTrip' => $getTrip, 'session' => $_SESSION, 'trips' => $trips, 'favorites' => $favoriteTrips]);
        } else {
            $trips = $this->fluvialTripController->getListFluvialTrips();
            $favoriteTrips = $this->favoriteController->getFavoriteTrip($_GET['idUser']);
            echo $this->twig->render('userTrip.php.twig', ['session' => $_SESSION, 'trips' => $trips, 'favorites' => $favoriteTrips]);
        }
    }

    public function displayFormAddTrip()
    {
        $trips = $this->fluvialTripController->getListFluvialTrips();
        $cities = $this->cityController->getListCities();
        //require('views/adminAddTrip.php.twig');
        echo $this->twig->render('adminAddTrip.php.twig', ['session' => $_SESSION, 'trips' => $trips, 'cities' => $cities]);
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
        echo $this->twig->render('adminSearch.php.twig', ['session' => $_SESSION, 'trips' => $trips]);
    }

    public function searchBoat()
    {
        $trip = $this->fluvialTripController->getFluvialTrip($_GET['idTrip']);
        $boats = $this->boatController->getListBoat($_GET['capacity']);
        echo $this->twig->render('adminBoat.php.twig', ['session' => $_SESSION, 'trip' => $trip, 'boats' => $boats]);
    }

    public function displayOwnerBoat()
    {
        $boats = $this->boatController->getOwnerBoat($_GET['idUser']);
        $position = $this->positionManager->getPosition($_GET['idUser']);
        echo $this->twig->render('userBoat.php.twig', ['session' => $_SESSION ,'boats' => $boats, 'position' => $position]);
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
        echo $this->twig->render('adminUpdateTrip.php.twig', ['session' => $_SESSION, 'trip' => $trip, 'cities' => $cities]);
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

    public function updatePosition($id, $city, $lat, $lon)
    {
        $this->positionManager->updatePosition($id, $city, $lat, $lon);
        header('Location:'. $_SERVER["HTTP_REFERER"]);
    }
}
