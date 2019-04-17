<?php
ob_start();
$title = "Se connecter";
$contentNav = "Espace de connexion";
include ('navigations/visitorNav.php');
?>
    <div id="connectionBlock">
        <fieldset>
            <legend><span>Déjà inscrit ?</span></legend>
            <form id="connectForm" method="POST">
                <label>Nom :<input type="text" name="name"></label>
                <label>Prénom :<input type="text" name="firstName"></label>
                <label>Mots de passe :<input type="password" name="password"></label>
                <input type="submit" name="connect" value="Se connecter">
            </form>
            <a style="text-decoration: none; color: red" href="index.php?action=inscription">Créer un compte</a>
        </fieldset>
    </div>
<?php
$content = ob_get_clean();
require('templates/templateForm.php');
?>
