<?php
ob_start();
$title = "Trouver un bateau";
include('navigations/adminNav.php');
?>
<p style="font-size: 35px; text-align: center; margin-top: 150px">Rechercher un <span style="color: coral">bateau</span>
</p>
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


<div id="TripSearch">
    <?php
    foreach ($trips as $trip) {
        ?>
        <p>
            <span style="font-size: 20px; font-style: italic"> <?= htmlspecialchars(strtoupper($trip->getDeparture_city())) .
                ' <i style="color:coral;" class="far fa-arrow-alt-circle-right fa-1x"></i> ' . htmlspecialchars(strtoupper($trip->getFinishing_city())) ?>
            </span> <br/>
            <span>Le : <?= htmlspecialchars($trip->getDate_transport()) ?></span> <br/>
            <span>Charge à transporter : <?= htmlspecialchars($trip->getWeight()) ?></span>
        </p>
        <?php
        echo '<a class="return" href="index.php?action=adminSearchBoat&capacity=' . htmlspecialchars($trip->getWeight()) . '&idTrip=' . htmlspecialchars($trip->getId()) . '">Rechercher</a> <br/>';
        ?>
        <br/>
        <?php
    }
    ?>
</div>
<?php
$content = ob_get_clean();
require('templates/template.php');
?>
