<div id="navigationUser">
    <nav class="adminNavigationOne">
        <ul>
            <li style="color: black; font-size: 30px"> <span style="color: coral; margin-left: 15px">
                <?= $_SESSION['name'] . '  </span> &nbsp; ' . $_SESSION['firstName'] ?></li>
            <li><a href="index.php?action=homeUser&idUser=<?= $_SESSION['id'] ?>"><i style="margin-left: 10px; color: black" class="fas fa-anchor fa-2x" title="Acceuil"></i></a></li>
        </ul>
    </nav>
    <nav class="adminNavigationTwo">
        <ul>
            <li style="margin-right: 20px;"><a style="color: black;" href="index.php?action=Trips&idUser=<?= $_SESSION['id'] ?>">
                    <i class="fas fa-search-location fa-2x" title="Trouver un transport"></i></a></li>
            <li style="margin-right: 20px;"><a href="index.php?action=addBoat&idUser=<?= $_SESSION['id']  ?>" style="color: black;"><i class="fas fa-plus fa-2x" title="Ajouter un bateau"></i></a></li>
            <li><a href="index.php?action=deconnexion" style="color: black;"><i class="fas fa-sign-out-alt fa-2x"  title="Se déconnecter"></i></a></li>
        </ul>
    </nav>
</div>
