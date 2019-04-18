<?php
ob_start();
$title = "Gestion des voyages";
include('navigations/adminNav.php');
?>

<button id="showAddCity">
    Ajouter une ville
</button>

<button id="hideAddCity">
    Replier le formulaire
</button>

<div id="city">
    <p style="font-size: 35px; text-align: center">Ajouter une <span style="color: coral">ville</span></p> <br/>
    <div id="ligne_point">
        <div class="ligne_1">
            <hr>
        </div>
        <div class="cercle">
            <div class="point"></div>
        </div>
        <div class="ligne_2">
            <hr>
        </div>
    </div>
    <div id="addCity">
        <form action="index.php?action=addCities" method="POST">
            <div class="left">
                <label>Nom de la ville :<input type="text" name="city" placeholder="Ex : Dunkerque" required></label>
            </div>
            <div class="center">
                <label>Latitude :<input type="number" step="0.00000000001" placeholder="Ex : 51,0344" name="lat"
                                        required></label>
            </div>
            <div class="right">
                <label>Longitude :<input type="number" step="0.000000000001" placeholder="Ex : 2,37678" name="lon" required></label>
                <input type="submit" name="send_trip" value="Ajouter la ville"><br/>
            </div>
        </form>
    </div>
</div>


<p style="font-size: 35px; text-align: center; margin-top: 150px">Créer un <span style="color: coral">voyage</span></p>
<br/>
<div id="ligne_point">
    <div class="ligne_1">
        <hr>
    </div>
    <div class="cercle">
        <div class="point"></div>
    </div>
    <div class="ligne_2">
        <hr>
    </div>
</div>

<div id="ContentMapAndTrip">
    <fieldset id="addTrip">
        <legend>Ajouter un transport</legend>
    <form action="index.php?action=addTrip" method="POST">
        <label> Ville de départ
            <select name="departure_city">
                <?php
                foreach ($cities as $city) {
                    ?>
                    <option value='<?= $city->getId() ?>'><?= $city->getName() ?></option>
                <?php
                }
                ?>
            </select>
        </label>

        <label> Ville d'arriver
            <select name="finishing_city">
                <?php
                foreach ($cities as $city) {
                    ?>
                    <option value='<?= $city->getId() ?>'><?= $city->getName() ?></option>
                    <?php
                }
                ?>
            </select>
        </label>
        <label>Prix de la tonne :<input type="number" step="0.01" placeholder="Ex : 1,25" name="price_ton" required></label>
        <label>Poid total : <input type="number" placeholder="Ex : 1900" name="weight" required></label>
        <label>Date du transport <input type="date" name="date_transport" placeholder="Format : DD/MM/AAAA"
                                        required></label>
        <input type="submit" name="send_trip" value="Créer le voyage">
    </form>
    </fieldset>

    <div id="Tripadmin">
        <?php
        foreach ($trips as $trip) {
            ?>
            <p>
            <span style="font-size: 20px; font-style: italic"> <?= strtoupper($trip->getDeparture_city()) .
                ' <i style="color:coral;" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($trip->getFinishing_city()) ?>
            </span> <br/>
                <span>Le : <?= $trip->getDate_transport() ?></span> <br/>
                <span>Charge à transporter : <?= $trip->getWeight() ?></span> <br/>
                <a id="updateTrip" href="index.php?action=updateTrip&idTrip=<?= $trip->getId() ?>"><i class="far fa-edit fa-1x"></i></a>
                <a id="deleteTrip" href="index.php?action=deleteTrip&idTrip=<?= $trip->getId() ?>"><i class="fas fa-trash-restore-alt"></i></a>
            </p>
            <br/>
            <?php
        }
        ?>
    </div>
</div>


<?php
$content = ob_get_clean();
require('templates/template.php');
?>
