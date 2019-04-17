<?php
ob_start();
$title = "Acceuil";
if($_SESSION['role'] == 1) {
    header('Location:index.php?action=admin');
} //TODO change redirection for Administrator
include('navigations/userNav.php');
?>

<?php
$content = ob_get_clean();
require('templates/template.php');
?>
