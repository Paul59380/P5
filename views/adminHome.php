<?php
ob_start();
include ('adminNav.php');
?>

<?php
$content = ob_get_clean();
require('template.php');
?>
