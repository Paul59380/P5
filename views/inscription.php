<div id="navigationPublic">
    <nav class="publicNavigation">
        <ul>
            <li style="color: white; font-size: 30px">Espace d'inscription</li>
            <li><i style="color: white" class="fas fa-anchor fa-2x"></i></li>
        </ul>
    </nav>
</div>

<div id="connectionBlock">
    <fieldset>
        <legend><span>Inscrivez vous !</span></legend>
        <form action="index.php?action=home" method="POST">
            <label>Nom :<input type="text" name="name"></label>
            <label>Prénom :<input type="text" name="firstName"></label>
            <label>Mots de passe :<input type="password" name="password"></label>
            <input type="submit" name="connect" value="Créer un compte">
        </form>
        <a style="text-decoration: none; color: red" href="index.php">Se connecter</a>
    </fieldset>
</div>

