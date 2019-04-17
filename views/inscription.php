<?php
ob_start();
$title = "S'inscrire";
$contentNav = "Espace d'inscription";
include ('navigations/visitorNav.php');
?>
<div id="connectionBlock">
    <fieldset>
        <legend><span>Inscrivez vous !</span></legend>
        <form method="POST">
            <label>Nom :<input type="text" name="NewName" placeholder="Ex : Marteel" required></label>
            <label>Prénom :<input type="text" name="NewFirstName" placeholder="Ex : Oberyn" required></label>
            <label>Mots de passe :<span id="help" style="margin-left: 30px;"></span><input class="pass" type="password"
                                                                                           name="NewPassword" required>
            </label>
            <label>N° de téléphone <input type="tel" name="PhoneNumber" placeholder="Ex : 06-45-85-78-96"
                                          pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required></label>
            <input type="submit" name="connect" value="Créer un compte">
        </form>
        <a style="text-decoration: none; color: red" href="index.php">Se connecter</a>
    </fieldset>
</div>
<?php
$content = ob_get_clean();
require('templates/templateForm.php');
?>
