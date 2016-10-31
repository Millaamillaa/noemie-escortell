<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 
?>
    <p class="realtitle"> RÉALISATIONS </p> <br>
    <!-- image banderole -->
    <img class="align" src="img/prestation-soulignage-titre.png" alt="vignette"> 

    <div class="container">
        <div class="row">
<?php  
    $res = $db->prepare('SELECT * FROM achievements ORDER BY date_add ASC');
    $res->execute();

    // Retourne toutes les entrées de la table "achievements" sous forme de tableau array()
    $realisations = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos realisations
foreach($realisations as $real){
	// $real contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
	echo '<div class="actua col-xs-12 col-sm-9 col-md-6 col-lg-4">';
	echo '<h2 class="textbloc4">'.$real['title'].'</h2>';
    echo '<p>'.$real['url'].'<p>'; //ajouter un href
    echo '<div class="bloc_orange"> </div>';
    echo '<img class="lineimage" src="img/'.$real['image'].'"  width="100%">';
    echo '<p class="textreal">'.substr($real['content'],0, 500).'...</p>';
	echo '<p class="datetxt"> Date du projet '.date('d/m/Y', strtotime($real['date_add'])).'</p>';

	// En récupérant l'id de la realisation, je peux le passer en GET afin d'avoir un seul et même fichier pour lire chaque realisation individuellement 
	echo '<p><a class="csslisa" href="read-realisation.php?id='.$real['id'].'"> Voir cette réalisation </a>';
	
	echo '</div>';
}
?>
    </div>
    </div>
<?php 
include_once 'inc/footer.php';
?>


 