<?php
ob_start(); ?>

<div id="navigationPublic">
    <nav class="publicNavigation">
        <ul>
            <li style="color: white; font-size: 30px">Espace d'inscription</li>
            <li><i style="color: white" class="fas fa-anchor fa-2x"></i></li>
        </ul>
    </nav>
</div>

<div id="map">

</div>

<?php
$content = ob_get_clean();
require('userTemplate.php');
?>
