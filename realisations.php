<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 
?>

<h1 class="text-center"> Mes réalisations </h1>

<?php  
    $res = $db->prepare('SELECT * FROM achievements ORDER BY date_add ASC');
    $res->execute();

    // Retourne toutes les entrées de la table "achievements" sous forme de tableau array()
    $realisations = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos realisations
foreach($realisations as $real){
	// $real contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
	echo '<div class="css de lisa">';
	echo '<h2>'.$real['title'].'</h2>';
	echo '<br>';
    echo '<p>'.$real['url'].'<p>'; //ajouter un href
    echo '<br>';
    echo '<img class="lisacss" src="img/'.$real['image'].'">';
    echo '<br>';
    echo '<p class="lisacss">'.substr($real['content'],0, 500).'...</p>';
    echo '<br>';
	echo '<p class="datetxt"> Published the '.date('d/m/Y', strtotime($real['date_add'])).'</p>';
	echo '<br>';

	// En récupérant l'id de la realisation, je peux le passer en GET afin d'avoir un seul et même fichier pour lire chaque realisation individuellement 
	echo '<p><a class="csslisa" href="read-realisation.php?id='.$real['id'].'"> Voir cette réalisation </a>';
	
	echo '</div>';
}
include_once 'inc/footer.php';
?>
