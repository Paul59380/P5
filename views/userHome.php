<?php
ob_start(); ?>

<div id="navigationPublic">
    <nav class="publicNavigation">
        <ul>
            <li style="color: white; font-size: 30px">Votre espace personnel</li>
            <li><i style="color: white" class="fas fa-anchor fa-2x"></i></li>
        </ul>
    </nav>
</div>
<div id="ContentMapAndTrip">
    <div id="map">
    </div>
    <div id="Trip">
        <?php
        foreach ($trips as $trip) {
            ?>
            <p>
            <span style="font-size: 20px; font-style: italic"> <?= strtoupper($trip->getDeparture_city()) .
                ' <i class="far fa-arrow-alt-circle-right fa-1x"></i> ' . strtoupper($trip->getFinishing_city()) ?>
            </span> <br/>
            <span>Le : <?= $trip->getDate_transport() ?></span> <br/>
            <span>Charge à transporter : <?=$trip->getWeight()  ?></span>
            </p>
            <?php
            echo '<a href="index.php?action=homeUser&d_city='.urldecode($trip->getDeparture_city()).'&d_lat='.$trip->getLat_departure().'&d_lon='.$trip->getLon_departure().'&f_city='.$trip->getFinishing_city().'&f_lat='.$trip->getLat_finishing().'&f_lon='.$trip->getLon_finishing().'">Voir</a>';
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
