<?php
ob_start();
?>

<div id="navigationAdmin">
    <nav class="adminNavigationOne">
        <ul>
            <li style="color: black; font-size: 30px"> <span style="color: coral; margin-left: 15px">
                <?= $_SESSION['name'] . '  </span> &nbsp; ' . $_SESSION['firstName'] ?></li>
            <li><a href="index.php?action=deconnexion"><i style="color: black" class="fas fa-anchor fa-2x"></i></a></li>
        </ul>
    </nav>
    <nav class="adminNavigationTwo">
        <ul>
            <li style="margin-right: 20px;"><a style="color: black;" href="#"><i
                            class="fas fa-search-location fa-2x"></i></a></li>
            <li><a href="index.php?action=adminAddTrip" style="color: black;"><i class="fas fa-plus fa-2x"></i></a></li>
        </ul>
    </nav>
</div>
<?php
$content = ob_get_clean();
require('userTemplate.php');
?>
