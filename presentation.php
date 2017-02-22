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
   <div id="blocpres">
      
<img class="pailletteleft" src="img/p1-paillette-gauche.png" alt="Paillette décorative"/> 
    <div class="presentation">
        <div class="centrage">
            
               <h1 class="titlepres"> ACCOMPAGNEMENT AU MONTAGE DE PROJETS DE COOPÉRATION ET PARTENARIATS EUROPÉENS </h1>
                <p class="textpres">
                Très active dans le monde associatif depuis plus de 15 ans, j’ai toujours eu à cœur d’associer un parcours en coordination de projet à une approche de développement local. Mon intérêt pour les projets innovants, les dynamiques partenariales et l’interculturalité m’a amené à me spécialiser dans <strong> les projets de coopération et partenariats européens. </strong>
                <br><br>
                Depuis 2015, au sein de la Coopérative CO-ACTIONS, je propose un service d’accompagnement des porteurs de projets dans l’ingénierie de projets de coopération que ce soit à l’échelle interrégionale ou européenne. 
                <br><br>
                <strong>Le service</strong> que je propose se décline en plusieurs phases : 
                diagnostic de la structure,  définition d’une stratégie de coopération 
                appui technique au montage de projet (rédaction, recherche de partenaires, relecture..)
                appui à la coordination de projet et au suivi administratif
                appui à la communication et dissémination des résultats
                 <br><br>
                Mon expérience et ma connaissance des appels à projets départementaux et régionaux ainsi que des programmes européens tels que Education-Formation (Erasmus+), Citoyenneté (Europe pour les Citoyens),  Culture (Creative Europe), ou encore Jeunesse, me permettent <strong>de guider et former mes partenaires qu’ils soient associations, entreprises, coopératives ou plus largement les acteurs de <em>l’Economie Sociale et Solidaire</em></strong> dans le montage de projets de coopération.
                <br><br>
                Je suis…
                <br>
                Entrepreneure-salariée-associée au sein de <strong>la coopérative CO-ACTIONS</strong> <a href="http://www.co-actions.com/" target="_blank">
                Le site co-actions</a>
                <br>
                Experte-évaluatrice externe pour <strong>l’Agence Erasmus+</strong> 
                <a href="http://www.erasmusplus-jeunesse.fr/" target="_blank">
                Le site erasmusplus</a> <!-- target blank = ouverture du site dans un autre onglet -->
                </p>
            </div>
        </div>
   
<img class="pailletteright" src="img/p1-paillette-droite.png" alt="Paillette décorative"/> 

 </div>
 <div class="spacebtwrealfooter"></div>
<?php
include_once 'inc/footer.php';
?>