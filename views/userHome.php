<?php
ob_start();

if($_SESSION['role'] == 1) {
    header('Location:index.php?action=admin');
} //TODO change redirection for Administrator
include ('userNav.php');
?>

<?php
$content = ob_get_clean();
require('userTemplate.php');
?>
