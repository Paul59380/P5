<?php
ob_start(); ?>
    <div id="navigationPublic">
        <nav class="publicNavigation">
            <ul>
                <li style="color: black; font-size: 30px">Espace d'inscription</li>
                <li><i style="color: black" class="fas fa-anchor fa-2x"></i></li>
            </ul>
        </nav>
    </div>

    <div id="connectionBlock">
        <fieldset>
            <legend><span>Inscrivez vous !</span></legend>
            <form  method="POST">
                <label>Nom :<input type="text" name="NewName" required></label>
                <label>Prénom :<input type="text" name="NewFirstName" required></label>
                <label>Mots de passe :<input type="password" name="NewPassword" required></label>
                <label>N° de téléphone <input type="tel" name="PhoneNumber" pattern="[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}" required></label>
                <input type="submit" name="connect" value="Créer un compte">
            </form>
            <a style="text-decoration: none; color: red" href="index.php">Se connecter</a>
        </fieldset>
    </div>
<?php
$content = ob_get_clean();
require('userTemplate.php');
?>
