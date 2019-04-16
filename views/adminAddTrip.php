<?php
ob_start();
?>

<div id="navigationAdmin">
    <nav class="adminNavigationOne">
        <ul>
            <li style="color: black; font-size: 30px"> <span style="color: coral; margin-left: 15px">
                <?= $_SESSION['name'] . '  </span> &nbsp; ' . $_SESSION['firstName'] ?></li>
            <li><a href="index.php?action=deconnexion"><i style="color: black" class="fas fa-anchor fa-2x"></i></a></li>
        </ul>
    </nav>
    <nav class="adminNavigationTwo">
        <ul>
            <li style="margin-right: 20px;"><a style="color: black;" href="#"><i
                            class="fas fa-search-location fa-2x"></i></a></li>
            <li><a href="index.php?action=adminAddTrip" style="color: black;"><i class="fas fa-plus fa-2x"></i></a></li>
        </ul>
    </nav>
</div>
<p style="font-size: 35px; text-align: center">Ajouter une <span style="color: coral">ville</span> </p> <br/>
<div id="ligne_point_2">
    <div class="ligne_nos_projets_1"> <hr> </div>
    <div class="cercle_nos_projets">
        <div class="point_nos_projets"></div></div>
    <div class="ligne_nos_projets_2"> <hr> </div>
</div>
<div id="addCity">
    <form action="index.php?action=addCities"  method="POST">
        <div class="left">
            <label>Nom de la ville :<input type="text" name="city" placeholder="Ex : Dunkerque" required></label>
        </div>
        <div class="center">
            <label>Latitude :<input type="number" step="0.00000000001" placeholder="Ex : 51,0344"  name="lat" required></label>
        </div>
        <div class="right">
            <label>Longitude :<input type="number" step="0.000000000001" placeholder="Ex : 2,37678" name="lon" required></label>
            <input type="submit" name="send_trip" value="Ajouter la ville"><br/>
        </div>
    </form>
</div>

<p style="font-size: 35px; text-align: center; margin-top: 150px">Créer un <span style="color: coral">voyage</span> </p> <br/>
<div id="ligne_point_2">
    <div class="ligne_nos_projets_1"> <hr> </div>
    <div class="cercle_nos_projets">
        <div class="point_nos_projets"></div></div>
    <div class="ligne_nos_projets_2"> <hr> </div>
</div>

<div id="ContentMapAndTrip">
    <fieldset id="addTrip">
        <legend>Ajouter un transport</legend>
        <form action="index.php?action=addTrip"  method="POST">
            <label>Ville de départ :<input type="text" name="departure_city" placeholder="Ex : Dunkerque" required></label>
            <label>Ville d'arriver :<input type="text" name="finishing_city" placeholder="Ex : Amiens" required></label>
            <label>Prix de la tonne :<input type="number" step="0.01" placeholder="Ex : 1,25"  name="price_ton" required></label>
            <label>Poid total : <input type="number" placeholder="Ex : 1900" name="weight" required></label>
            <label>Date du transport <input type="date" name="date_transport" placeholder="Format : DD/MM/AAAA"  required></label>
            <input type="submit" name="send_trip" value="Créer le voyage">
        </form>
    </fieldset>
    <?php
    if (isset($_GET['idTrip'])) {
        ?>
        <div id="infoTripAdmin">
            <h1>
                <?=
                strtoupper($getTrip->getDeparture_city()) .
                ' <i id="displayTrip" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($getTrip->getFinishing_city()) ?>
            </h1>
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
        </div>

        <?php
    }
    ?>
    <div id="Tripadmin">
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