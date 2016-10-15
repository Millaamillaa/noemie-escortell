<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 
?>
    <p class="realtitle"> RÉALISATIONS </p> <br>
    <!-- image banderole -->
    <img class="align" src="img/prestation-soulignage-titre.png" alt="vignette"> 

    <div class="blocgris"> 
<?php  
    $res = $db->prepare('SELECT * FROM achievements ORDER BY date_add ASC');
    $res->execute();

    // Retourne toutes les entrées de la table "achievements" sous forme de tableau array()
    $realisations = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos realisations
foreach($realisations as $real){
	// $real contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
	echo '<div class="col-xs-12 col-sm-9 col-md-6 col-lg-4">';
	echo '<h2t class="textbloc4">'.$real['title'].'</h2>';
	echo '<br>';
    echo '<p>'.$real['url'].'<p>'; //ajouter un href
    echo '<br>';
    echo '<img class="lineimage" src="img/p3-barre-orange.png" alt="separation">';
    echo '<img class="lineimage" src="img/'.$real['image'].'">';
    echo '<br>';
    echo '<p class="lisacss">'.substr($real['content'],0, 500).'...</p>';
    echo '<br>';
	echo '<p class="datetxt"> Date du projet '.date('d/m/Y', strtotime($real['date_add'])).'</p>';
	echo '<br>';

	// En récupérant l'id de la realisation, je peux le passer en GET afin d'avoir un seul et même fichier pour lire chaque realisation individuellement 
	echo '<p><a class="csslisa" href="read-realisation.php?id='.$real['id'].'"> Voir cette réalisation </a>';
	
	echo '</div>';
}

include_once 'inc/footer.php';
?>
   </div>
 