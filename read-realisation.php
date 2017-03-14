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

		echo '<img class="pailletteleft" src="img/p1-paillette-gauche.png" alt="Paillette décorative"/> ';
		echo '<div class="container-fluid">';
			echo '<div class="row">';
				echo '<div class="col-md-4">';
					echo '<img class="monimage" src="img/'.$real['image'].'">';
				echo '</div>';
				echo '<div class="col-md-6">';
					echo '<div class="realright">';
						echo '<h2 class="titlereal spacetitle ">'.$real['title'].'</h2>';
					    echo '<p class="texteonereal">'.$real['content'].'</p>';
		    			echo '<p class="linksitereal"> Lien vers <a href=" '.$real['url'].' " target="_blank">
				  Le site du projet </a></p>';
		   				echo '<br>';
		   				echo '<a href="realisations.php" class="btnrealstye btn btn-warning btn-lg active" role="button" aria-pressed="true">Retour aux projets</a>';
		   			echo '</div>';
	   			echo '</div>';
	   		echo '</div>';
	   	echo '</div>';
	   	echo '<img class="pailletteright" src="img/p1-paillette-droite.png" alt="Paillette décorative"/>  ';
	} else {
			echo 'Réalisation introuvable !';
		}
	}

include_once 'inc/footer.php';
?>