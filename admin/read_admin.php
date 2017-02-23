<?php
include_once 'inc/header.php';
require_once 'inc/connect.php';
require_once 'inc/function.php';
logged_only();
?>
	<p class="realtitle"> RÉALISATIONS </p> <br>
 
<?php  
    $res = $db->prepare('SELECT * FROM achievements ORDER BY date_add DESC');
    $res->execute();

    // Retourne toutes les entrées de la table "achievements" sous forme de tableau array()
    $realisations = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos realisations
foreach($realisations as $real){
	// $real contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
	echo '<div class="col-xs-12 col-sm-9 col-md-6 col-lg-4">';
	echo '<h2 class="textbloc4">'.$real['title'].'</h2>';
	echo '<br>';
    echo '<p>'.$real['url'].'<p>'; //ajouter un href
    echo '<br>';
    echo '<img class="lineimage" src="../img/'.$real['image'].'" width="100%">';
    echo '<br>';
    echo '<p class="lisacss">'.$real['content'].'</p>';
    echo '<br>';
	echo '<p class="datetxt"> Date du projet '.date('d/m/Y', strtotime($real['date_add'])).'</p>'; 
	echo '<br>';  

	// En récupérant l'id de la realisation, je peux le passer en GET afin d'avoir un seul et même fichier pour lire chaque realisation individuellement 
	echo '<p><a class="csslisa" href="edit_realisation.php?id='.$real['id'].'"> Modifier cette réalisation </a>';
	echo '<p><a class="csslisa" href="delete_realisation.php?id='.$real['id'].'"> Supprimer cette réalisation </a>';
	
	echo '</div>';
}

include_once 'inc/footer.php';
?>