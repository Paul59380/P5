<title>Se connecter</title>

<div id="navigationPublic">
    <nav class="publicNavigation">
        <ul>
            <li style="color: white; font-size: 30px">Espace de connexion</li>
            <li><i style="color: white" class="fas fa-anchor fa-2x"></i></li>
        </ul>
    </nav>
</div>

<div id="connectionBlock">
    <fieldset>
        <legend><span>Déjà inscrit ?</span></legend>
        <form action="index.php?action=home" method="POST">
            <label>Nom :<input type="text" name="name"></label>
            <label>Prénom :<input type="text" name="firstName"></label>
            <label>Mots de passe :<input type="password" name="password"></label>
            <input type="submit" name="connect" value="Se connecter">
        </form>
        <a style="text-decoration: none; color: red" href="index.php?action=inscription">Créer un compte</a>
    </fieldset>
</div>

