<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 

    $res = $db->prepare('SELECT * FROM cv');
    $res->execute();
    // Retourne toutes les entrées de la table "cv" sous forme de tableau array()
    $result = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($result); // Permet de sortir en brut nos données
	foreach($result as $resume){
		
		// $resume contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
	    echo '<img class="" src="img/'.$resume['image'].'">';
	}

include_once 'inc/footer.php';
?>