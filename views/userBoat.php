<?php
ob_start();

if($_SESSION['role'] == 1) {
    header('Location:index.php?action=admin');
} //TODO change redirection for Administrator
include ('userNav.php');
?>

<p style="font-size: 35px; text-align: center; margin-top: 50px">Ajouter votre <span style="color: coral">bateau</span> </p> <br/>
<div id="ligne_point">
    <div class="ligne_1"> <hr> </div>
    <div class="cercle">
        <div class="point"></div></div>
    <div class="ligne_2"> <hr> </div>
</div>
<fieldset id="addBoat">
    <legend>Mes bateaux</legend>
    <?php
    foreach ($boats as $boat){
        ?>
    <p>Nom : <span style="color: coral;"><?= $boat->getName() ?></span> <i class="fas fa-arrow-circle-right fa-1x"></i> Capacité :<span style="color: coral"> <?= $boat->getCapacity() ?></span></p>
    <?php
    }
    ?>

</fieldset>

<fieldset id="addBoat">
    <legend>Ajouter un bateau</legend>
    <form action="index.php?action=sendNewBoat&idUser=<?= $_SESSION['id'] ?>" method="POST">
        <label>Nom du bateau :<input type="text" name="name" placeholder="Ex : Mississippi"
                                       required></label>
        <label>Capacité (en tonnes) :<input type="number" name="capacity" placeholder="Ex : 1900" required></label>
        <input type="submit" name="send_trip" value="Ajouter le bateau">
    </form>
</fieldset>
<?php
$content = ob_get_clean();
require('template.php');
?>
