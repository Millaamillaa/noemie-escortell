<?php
include_once 'inc/header.php';
require_once 'inc/connect.php';

	/* On vérifie que l'ID de la réalisation existe et n'est pas vide
	Si l'id n'est pas de type numérique, on force la valeur à 1
	*/
	if(isset($_GET['id']) && !empty($_GET['id'])){
		$idRealisation = $_GET['id']; 
		if(!is_numeric($idRealisation)){
			$idRealisation = 1;
		}
	}

	if(!empty($_GET)){
		if(isset($idRealisation)){
		// Prépare et execute la requète SQL pour récuperer notre realisation de manière dynamique
		$res = $db->prepare('SELECT * FROM achievements WHERE id = :idRealisation');
		$res->bindParam(':idRealisation', $idRealisation, PDO::PARAM_INT);
		$res->execute();

		// $realisation contient ma realisation extrait de la db
		$real = $res->fetch(PDO::FETCH_ASSOC);

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
	} else {
			echo 'Réalisation introuvable !';
		}
	}

include_once 'inc/footer.php';
?>