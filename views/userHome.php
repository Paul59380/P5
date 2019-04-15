<?php
ob_start();
if($_SESSION['role'] == 1) {
    header('Location:index.php?action=Admin');
} //TODO change redirection for Administrator
?>

<div id="navigationPublic">
    <nav class="publicNavigation">
        <ul>
            <li style="color: black; font-size: 30px">Bienvenue
                <br/> <?= $_SESSION['name'] . '  ' . $_SESSION['firstName'] ?></li>
            <li><a href="index.php?action=deconnexion"><i style="color: black" class="fas fa-anchor fa-2x"></i></a></li>
        </ul>
    </nav>
</div>

<p id="titleTransport">Transports Disponibles</p>
<div id="ContentMapAndTrip">
    <div id="map">
    </div>
    <?php
    if (isset($_GET['idTrip'])) {
        ?>
        <div id="infoTrip">
            <h1><?=
                strtoupper($getTrip->getDeparture_city()) .
                ' <i id="displayTrip" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($getTrip->getFinishing_city()) ?></h1>
            <br/>
            <h2>Prévu le : <span style="color: coral"><?= $getTrip->getDate_transport() ?></span></h2>
            <h2>Charge à transporter : <span style="color: coral;"><?= $getTrip->getWeight() ?> </span>Tonnes</h2>
            <h2>Prix de la tonne : <span style="color: coral;"><?= $getTrip->getPrice_ton() ?> </span>€/T HT</h2>
            <h2>Capacité minimum requise : <span style="color: coral;"><?= $getTrip->getWeight() ?> </span>Tonnes
            </h2>
            <h2>Voyage payé : <span
                        style="color: coral;"><?= $getTrip->getWeight() * $getTrip->getPrice_ton() ?> </span>€
            </h2>
            <br/><br/>
            <a href="#"><i id="star" class="fas fa-star fa-2x"></i></a>
        </div>

        <?php
    }
    ?>
    <div id="Trip">
        <?php
        foreach ($trips as $trip) {
            ?>
            <p>
            <span style="font-size: 20px; font-style: italic"> <?= strtoupper($trip->getDeparture_city()) .
                ' <i style="color:coral;" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($trip->getFinishing_city()) ?>
            </span> <br/>
                <span>Le : <?= $trip->getDate_transport() ?></span> <br/>
                <span>Charge à transporter : <?= $trip->getWeight() ?></span>
            </p>
            <?php
            echo '<a href="index.php?action=homeUser&idUser=' . $_SESSION['id'] . '&d_city=' . urldecode($trip->getDeparture_city()) . '&d_lat=' . $trip->getLat_departure() . '&d_lon=' . $trip->getLon_departure() . '&f_city=' . $trip->getFinishing_city() . '&f_lat=' . $trip->getLat_finishing() . '&f_lon=' . $trip->getLon_finishing() . '&idTrip=' . $trip->getId() . '">Voir</a> <br/>';
            ?>
            <br/>
            <?php
        }
        ?>
    </div>
</div>
<?php
$content = ob_get_clean();
require('userTemplate.php');
?>
