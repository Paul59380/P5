<?php
ob_start();
$title = "Acceuil Admin";
include('navigations/adminNav.php');
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

<p style="font-size: 35px; text-align: center; margin-top: 70px">Escpace <span style="color: coral">personnel</span>
</p>
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

<div class="chevron" title="déplier la liste">
    <button class="show">
        <i class="fas fa-chevron-down fa-3x"></i>
        <i class="fas fa-chevron-down fa-2x"></i>
    </button>
</div>
<div class="chevronUp" title="replier la liste">
    <button class="show2">
        <i class="fas fa-chevron-up fa-2x"></i>
        <i class="fas fa-chevron-up fa-3x"></i>
    </button>
</div>

<div id="home">
    <div class="findBoat">
        <div class="screenFindBoat">
            <img src="public/images/addCity.png" alt="map et transport">
        </div>
        <div style="margin-top: -20px; width: 30%" class="textFindBoat">
            <h3 style="color: coral">Ajouter une ville</h3>
            <p>Dans le menu l'icône <i class="fas fa-plus fa-2x"></i> vous permettra d'accèder à la partie administrateur pour la gestion des voyages </p>
            <p>Vous trouverez en haut de page un bouton <span>Ajouter une ville</span>. <br/> Ce bouton fera apparaître la
                un formulaire pour l'ajout d'un ville avec ses coordonées GPS, celle-ci permettrons la localisation par marqueurs sur la carte pour tout les bateliers consultant les transports disponibles</p>
            <p>Après l'ajout d'une ville vous trouverez dans le formulaire de création de transport deux liste déroulante avec les villes précédement ajouté</p>
        </div>
    </div>

    <div class="findBoat">
        <div style="margin-top: 130px" class="textFindBoat">
            <h3 style="color: coral">Créer un voyage</h3>
            <p>Sous la section <span>Ajouter une ville</span> un formulaire de création de voyage sera présent dans la section <span>Créer un voyage</span> </p>
            <p>Selectionner la ville de départ et d'arriver et complétez l'ensemble du formulaire. <br/><br/>
                Cliquez sur le bouton <span>Créer le voyage </span> et il apparaîtra dans la liste de voyage située sur la droite.<br/>
                Les coordonées GPS seront automatiquement affecter aux villes selectionner dans le formulaire.
            </p>
        </div>
        <div class="screenFindBoat">
            <img src="public/images/createTrip.png" alt="map et transport">
        </div>
    </div>

    <div class="findBoat">
        <div  class="screenFindBoat">
            <img src="public/images/updateTrip.png" alt="map et transport">
        </div>

        <div style="margin-top: 120px" class="textFindBoat">
            <h3 style="color: coral">Modifier/Supprimer un transport</h3>
            <p>Dans la page d'ajout de voyage une liste de voyage sera dispnible.<br/>Pour chaque voyage vous trouverez ci-dessous les icônes suivantes : <i style="color:green;" class="far fa-edit"></i> ,  <i style="color:red;" class="fas fa-trash-restore"></i> </p>
            <p>L'icône  <i style="color:red;" class="fas fa-trash-restore"></i> vous permettra en un clique de supprimer un voyage existant <br/>
            <p>L'icône  <i style="color:red;" class="fas fa-trash-restore"></i> vous redirigera vers une page contant un formulaire qui sera remplira automatique avec les données correspondant au voyage à modifier. <br/>
            <p>Pour changer les informations du voyage (date, poids, prix/Tonne), remplacez les anciennes valeurs par les nouvelles et cliquez sur <span>Modifier le voyage</span></p>
        </div>
    </div>

    <div class="findBoat">
        <div class="textFindBoat">
            <h3 style="color: coral">Rechercher un bateau pour un transport</h3>
            <p>Dans le menu l'icône <i class="fas fa-search-location"></i> vous permettra d'accèder à la page de recherche de
                bateaux </p>
            <p>Une liste contenant tout les voyages référencer sera présente<br/>
                Cliquez sur le bouton <span>Rechercher</span>correspondant au voyage pour lequel un bateau correspondant doit être rechercher <br/>
        </div>

        <div class="screenFindBoat">
            <img src="public/images/searchBoat.png" alt="map et transport">
        </div>
    </div>

    <div class="findBoat">
        <div class="screenFindBoat">
            <img src="public/images/foundBoat.png" alt="map et transport">
        </div>
        <div style="width: 20%" class="textFindBoat">
            <h3 style="color: coral">Consultez la liste de bateau</h3>

            <p>Vous serez rediriger vers une page contenant les <span>informations</span> du voyage selectionner et à sa droite une liste de bateaux correspondants <span>aux critères</span> de voyage mis en place à la création du voyage</p>
            <p>Vous accèderez ainsi ,en un clique, à <span>toutes les informations</span> des propriétaires de bataux pouvant effectuer ce voyage </p>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
require('templates/template.php');
?>
