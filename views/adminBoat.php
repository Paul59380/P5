<?php
ob_start();
include('adminNav.php');
?>
<p style="font-size: 35px; text-align: center; margin-top: 50px">Bateaux trouvés pour <span style="color: coral">ce voyage</span> </p> <br/>
<div id="ligne_point">
    <div class="ligne_1"> <hr> </div>
    <div class="cercle">
        <div class="point"></div></div>
    <div class="ligne_2"> <hr> </div>
</div>
<p>
    <a class="return" href="index.php?action=searchBoat">Retour</a>
</p>
<div id="ContentMapAndTrip">
    <?php
    if (isset($_GET['idTrip'])) {
        ?>
        <div id="infoTrip">
            <p style="font-size: 30px"><?=
                strtoupper($trip->getDeparture_city()) .
                ' <i id="displayTrip" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($trip->getFinishing_city()) ?></p>
            <br/>
            <h2>Prévu le : <span style="color: coral"><?= $trip->getDate_transport() ?></span></h2>
            <h2>Charge à transporter : <span style="color: coral;"><?= $trip->getWeight() ?> </span>Tonnes</h2>
            <h2>Prix de la tonne : <span style="color: coral;"><?= $trip->getPrice_ton() ?> </span>€/T HT</h2>
            <h2>Capacité minimum requise : <span style="color: coral;"><?= $trip->getWeight() ?> </span>Tonnes
            </h2>
            <h2>Voyage payé : <span
                    style="color: coral;"><?= $trip->getWeight() * $trip->getPrice_ton() ?> </span>€
            </h2>
            <br/><br/>
        </div>
        <?php
    }
    ?>
    <div id="userBoat">
        <?php
        foreach ($boats as $boat) {
            ?>
            <div class="boat">
                <p>Propriétaire : <span><?= $boat->getUser()->getName().' '. $boat->getUser()->getFirstName() ?></span></p>
                <p>Nom du Bateau : <span><?= $boat->getName() ?></span></p>
                <p>Capacité du bateau : <span><?= $boat->getCapacity() ?></span> Tonnes</p>
                <p>Numéro de téléphone : <span><?= $boat->getUser()->getPhone() ?></span></p>
            </div> <br/>
        <?php
        }
        ?>
    </div>
</div>

<?php
$content = ob_get_clean();
require('template.php');
?>
