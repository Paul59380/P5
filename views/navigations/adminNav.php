<div id="navigationAdmin">
    <nav class="adminNavigationOne">
        <ul>
            <li style="font-size: 30px"> <span style="color: coral; margin-left: 15px">
                <?= htmlspecialchars($_SESSION['name']) . '  </span> &nbsp; ' . htmlspecialchars($_SESSION['firstName']) ?></li>
<li><a href="index.php?action=admin"><i style="margin-left: 10px; color: black" class="fas fa-anchor fa-2x" title="Acceuil"></i></a></li>
</ul>
</nav>
<nav class="adminNavigationTwo">
    <ul>
        <li style="margin-right: 20px;"><a style="color: black;" href="index.php?action=searchBoat"><i
                    class="fas fa-search-location fa-2x" title="Rechercher un bateau"></i></a></li>
        <li style="margin-right: 20px;"><a href="index.php?action=adminAddTrip" style="color: black;"><i class="fas fa-plus fa-2x" title="Ajouter un voyage"></i></a></li>
        <li><a href="index.php?action=deconnexion" style="color: black;"><i class="fas fa-sign-out-alt fa-2x"  title="Se déconnecter"></i></a></li>
    </ul>
</nav>
</div>
