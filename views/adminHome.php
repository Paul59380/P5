<?php
ob_start();
$title = "Acceuil Admin";
include('navigations/adminNav.php');
?>

<?php
$content = ob_get_clean();
require('templates/template.php');
?>
