<?php
ob_start();
$title = "Gestion des voyages";
include('navigations/adminNav.php');
?>

<p style="font-size: 35px; text-align: center">Modifier un <span style="color: coral">voyage</span></p>
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
    <div style="margin-left: 10%" id="Trip">
            <h1>
            <span> <?= strtoupper($trip->getDeparture_city()) .
                ' <i style="color:coral;" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($trip->getFinishing_city()) ?> </span> <br/>
            </h1>

                <h2>Le : <span style="color: coral"><?= $trip->getDate_transport() ?></span>  <br/>
                Charge à transporter : <span style="color: coral"><?= $trip->getWeight() ?></span>  Tonnes <br/>
                Prix/ T HT : <span style="color:coral;"><?= $trip->getPrice_ton() ?></span>  €</h2>

        <h2>
            Prix Total Hors Taxes : <span style="color: coral"><?= $trip->getWeight()*$trip->getPrice_ton() ?></span> €
        </h2>

    </div>
<fieldset style="margin: auto" id="addTrip">
    <legend>Ajouter un transport</legend>
    <form action="index.php?action=update&idTrip=<?= $_GET['idTrip'] ?>" method="POST">
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
        <label>Prix de la tonne :<input type="number" step="0.01" placeholder="Ex : 1,25" name="price_ton" value="<?= $trip->getPrice_ton() ?>" required></label>
        <label>Poid total : <input type="number" placeholder="Ex : 1900" name="weight" value="<?= $trip->getWeight() ?>" required></label>
        <label>Date du transport <input type="date" name="date_transport" placeholder="Format : DD/MM/AAAA" value="<?= $trip->getDate_transport() ?>"
                                        required></label>
        <input type="submit" name="send_trip" value="Créer le voyage">
    </form>
</fieldset>
</div>
<?php
$content = ob_get_clean();
require('templates/template.php');
?>
