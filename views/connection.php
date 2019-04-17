<?php
ob_start(); ?>
    <title>Se connecter</title>

<div id="navigationUser">
    <nav class="adminNavigationOne">
        <ul>
            <li style="color: black; font-size: 30px"> <span style="color: coral; margin-left: 15px">
                Espace de connection</li>
        </ul>
    </nav>
    <nav class="adminNavigationTwo">
        <ul>
            <li><a href="index.php?action=deconnexion"><i style="color: black" class="fas fa-anchor fa-2x" title="Se déconnecter"></i></a></li>
        </ul>
    </nav>
</div>

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
require('templateForm.php');
?>
