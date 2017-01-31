<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; ?>


<!-- A REFAIRE DANS LE BDD
    $res = $db->prepare('SELECT * FROM about');
    $res->execute();

    // Retourne toutes les entrées de la table "about" sous forme de tableau array()
    $about = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos about
foreach($about as $apropos){
	// $apropos contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
    echo '<img class="id" src="img/'.$apropos['image'].'">';
    echo '<div class="titleaboutme">'.$apropos['title'].'</div>';
    echo '<img class="align" src="img/prestation-soulignage-titre.png" alt="vignette">';
    echo '<br><p class="textaboutme">'.$apropos['content'].'</p>';           
	echo '</div>'; 
} -->
    <div class="presentation">
        <div class="container">
            <div class="row">
                <h1 class="titlepres"> Coopérer -  Innover – Se développer </h1>
                <p class="textpres">Très active dans le monde associatif depuis plus de 15 ans, j’ai toujours eu à cœur d’associer un parcours en coordination de projet à une approche de développement local. Mon intérêt pour les projets innovants, les dynamiques partenariales et l’interculturalité m’a amené à me spécialiser dans les projets européens et de coopération.
                <br><br>
                Depuis 2015, au sein de la Coopérative CO-ACTIONS, je propose un service d’accompagnement des porteurs de projets dans l’ingénierie de projets de coopération que ce soit à l’échelle interrégionale ou européenne. 
                <br><br>
                Le service que je propose se décline en plusieurs phases : 
                diagnostic de la structure,  définition d’une stratégie de coopération 
                appui technique au montage de projet (rédaction, recherche de partenaires, relecture..)
                appui à la coordination de projet et au suivi administratif
                appui à la communication et dissémination des résultats
                <br><br>
                Mon expérience et ma connaissance des appels à projets départementaux et régionaux ainsi que des programmes européens tels que Education-Formation (Erasmus+), Citoyenneté (Europe pour les Citoyens),  Culture (Creative Europe), Jeunesse, me permettent de guider et former mes partenaires qu’ils soient associations, coopératives ou plus largement les acteurs de l’Economie Sociale et Solidaire dans le montage de projets de coopération.
                </p>
            </div>
        </div>
    </div>
<?php
include_once 'inc/footer.php';
?>