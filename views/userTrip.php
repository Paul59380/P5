<?php
ob_start();

if($_SESSION['role'] == 1) {
    header('Location:index.php?action=admin');
} //TODO change redirection for Administrator
include ('userNav.php');
?>

<p style="font-size: 35px; text-align: center; margin-top: 50px">Transports <span style="color: coral">Disponibles</span> </p> <br/>
<div id="ligne_point">
    <div class="ligne_1"> <hr> </div>
    <div class="cercle">
        <div class="point"></div></div>
    <div class="ligne_2"> <hr> </div>
</div>

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
            <a href="index.php?action=addFavoriteTrip&idUser=<?= $_SESSION['id'] ?>&idTrip=<?= $getTrip->getId() ?>"><i id="star" class="fas fa-star fa-1x"></i></a>
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
            echo '<a href="index.php?action=Trips&idUser=' . $_SESSION['id'] . '&d_city=' . urldecode($trip->getDeparture_city()) . '&d_lat=' . $trip->getLat_departure() . '&d_lon=' . $trip->getLon_departure() . '&f_city=' . $trip->getFinishing_city() . '&f_lat=' . $trip->getLat_finishing() . '&f_lon=' . $trip->getLon_finishing() . '&idTrip=' . $trip->getId() . '">Voir</a> <br/>';
            ?>
            <br/>
            <?php
        }
        ?>
    </div>
</div>

<p style="font-size: 35px; text-align: center; margin-top: 50px">Vos transports <span style="color: coral">Favoris</span> </p> <br/>
<div id="ligne_point">
    <div class="ligne_1"> <hr> </div>
    <div class="cercle">
        <div class="point"></div></div>
    <div class="ligne_2"> <hr> </div>
</div>
    <?php
    foreach ($favoriteTrips as $favorite){
        ?>
<fieldset id="favoriteTransport">
    <legend><a href="index.php?action=deleteFavoriteTrip&idFavorite=<?= $favorite->getId() ?>" <a  style="color: red" class="far fa-trash-alt" title="Supprimer ce transport des favoris"></i></a>
    </legend>

    <table style="width: 100%">
            <tr>
                <td>Départ</td>
                <td>Arrivé</td>
                <td>Date</td>
                <td>Prix/T HT</td>
                <td>Poid</td>
                <td>Voyage payé HT</td>
            </tr>
        <tr>
            <td><span><?= $favorite->getDeparture_city() ?></span></td>
            <td><span> <?= $favorite->getFinishing_city() ?></span></td>
            <td><span><?= $favorite->getDate_transport() ?></span></td>
            <td><span><?= $favorite->getPrice_ton() ?> €</span></td>
            <td><span><?= $favorite->getWeight() ?> T</span></td>
            <td><span><?= $favorite->getPrice_ton()*$favorite->getWeight() ?> €</span></td>
        </tr>
    </table>
</fieldset>
        <?php
    }
    ?>

<?php
$content = ob_get_clean();
require('template.php');
?>
