<?php
ob_start();
$title = "Acceuil";
if ($_SESSION['role'] == 1) {
    header('Location:index.php?action=admin');
} //TODO change redirection for Administrator
include('navigations/userNav.php');
?>
<p style="font-size: 35px; text-align: center; margin-top: 50px">Bienvenue sur notre <span
            style="color: coral">site</span></p>
<br/>
<div id="ligne_point">
    <div class="ligne_1">
        <hr>
    </div>
    <div class="cercle">
        <div class="point"></div>
    </div>
    <div class="ligne_2">
        <hr>
    </div>
</div>

<div id="slider">
    <ul class="slides">
        <li class="slide"><img src="public/images/slider8.jpg" alt="peniche"></li>
        <li class="slide"><img src="public/images/slider2.jpg" alt="peniche"></li>
        <li class="slide"><img src="public/images/slider3.jpg" alt="peniche"></li>
        <li class="slide"><img src="public/images/slider4.jpg" alt="peniche"></li>
        <li class="slide"><img src="public/images/slider7.jpg" alt="peniche"></li>
        <li class="slide"><img src="public/images/slider8.jpg" alt="peniche"></li>
    </ul>
</div>

<div id="welcome">
    <p>
        <span>Ex turba</span> vero imae sortis et paupertinae in tabernis aliqui pernoctant vinariis, non nulli velariis
        umbraculorum theatralium latent, quae <span>Campanam </span>imitatus lasciviam Catulus in aedilitate sua
        suspendit omnium primus; aut pugnaciter aleis certant <span>turpi sono fragosis</span> naribus introrsum reducto
        spiritu concrepantes; aut quod est studiorum omnium maximum ab ortu lucis ad vesperam sole fatiscunt vel
        pluviis, per minutias aurigarum equorumque praecipua <span>vel delicta</span> scrutantes.
    </p>
    <p>
        <span>Pandente itaque</span> viam fatorum sorte tristissima, qua praestitutum erat eum vita et imperio spoliari,
        itineribus interiectis permutatione iumentorum emensis venit <span>Petobionem</span> oppidum Noricorum, ubi
        reseratae sunt insidiarum latebrae omnes, et Barbatio repente apparuit comes, qui sub eo domesticis praefuit,
        cum Apodemio agente in rebus milites ducens, quos beneficiis suis oppigneratos <span>elegerat</span> imperator
        certus nec praemiis nec miseratione <span>ulla posse</span> deflecti.

    </p>
</div>


<p style="font-size: 35px; text-align: center; margin-top: 70px">Escpace <span style="color: coral">personnel</span></p>
<br/>
<div id="ligne_point">
    <div class="ligne_1">
        <hr>
    </div>
    <div class="cercle">
        <div class="point"></div>
    </div>
    <div class="ligne_2">
        <hr>
    </div>
</div>

<div class="findBoat">
    <div class="screenFindBoat">
        <img src="public/images/map.png" alt="map et transport">
    </div>
    <div class="textFindBoat">
        <h3 style="color: coral">Accès aux transports en temps réel</h3>
        <p>Dans le menu l'icône <i class="fas fa-search-location fa-2x"></i> vous permettra d'accèder à la liste des
            transports mis à jour par nos affréteurs </p>
        <p>Sous chaque transport listé un bouton <span>Voir</span> sera présent. <br/> Ce bouton fera apparaître la
            ville de départ et la destination finale du transport à effectuer</p>
        <p>Vous aurez la possibilité d'ajouter un voyage à vos favoris en cliquant sur l'icône <i
                    class="fas fa-star fa-2x"></i> présente sous la description du voyage</p>
    </div>
</div>

<div class="findBoat">
    <div class="textFindBoat">
        <h3 style="color: coral">Vos Transport favoris</h3>
        <p>Après avoir cliqué sur l'icône <i class="fas fa-star fa-2x"></i> vous trouvez en bas de page la section <span>"Vos transports favoris"</span> </p>
        <p>Cliquez sur les deux flèches rouge pour déplier la liste de vos transport favoris <br/><br/>
            Une icône <i style="color: red" class="far fa-trash-alt fa-2x"></i> vous permettra de supprimer des transports de votre liste.<br/>
        Pour replier la liste de transport cliquez sur les deux flèches rouge présent en dessous du titre <span>"Vos transports favoris"</span></p>
    </div>
    <div class="screenFindBoat">
        <img src="public/images/fav.png" alt="map et transport">
    </div>
</div>

<div class="findBoat">
    <div class="screenFindBoat">
        <img src="public/images/addBoat.png" alt="map et transport">
    </div>

    <div class="textFindBoat">
        <h3 style="color: coral">Ajouter un bateau</h3>
        <p>Dans le menu l'icône <i class="fas fa-plus fa-2x"></i> vous permettra d'accèder à la page d'ajout de bateau </p>
        <p>Un formulaire corncernant les details du bateau sera présent.<br/>
            <span>Remplissez</span> le formulaire et cliquez sue le bouton <span>"Ajouter le bateau</span></p>
        <p>Un cadran sera présent au dessus du formulaire, celui-ci indiquera la liste de vos bateaux si vous en possédé. <br/>
            L'icône <i style="color: red" class="far fa-trash-alt fa-2x"></i> présente à côté de la description d'un bateau vous permettra la suppression d'un bateau à tout moment </p>
    </div>
</div>
<?php
$content = ob_get_clean();
require('templates/template.php');
?>
