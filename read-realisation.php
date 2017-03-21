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
		echo '<div class="onepagereal container">';
			echo '<div class="row">';
				//colone image
				echo '<div class="col-xs-9 col-sm-6 col-md-4 col-lg-4">';
					echo '<img class="monimage" src="img/'.$real['image'].'">';
				echo '<br><br><br></div>';
				//colone texte
				echo '<div class="col-xs-12 col-sm-9 col-md-6 col-lg-6">';
					echo '<div class="texteonereal">';
						echo '<p class="titlereal spacetitle ">'.$real['title'].'</p>';
					    echo '<p class="texteonereal">'.$real['content'].'</p>';
		    			echo '<p class="linksitereal"> Lien vers <a href=" '.$real['url'].' " target="_blank">Le site du projet </a></p>';
		   				echo '<br>';
		   				echo '<a href="realisations.php" role="button" aria-pressed="true"><img class="boutonplus" src="img/btn-retour.png"></a>'; 
		   			echo '</div>';
	   			echo '</div>';
	   			//cloture des container
	   		echo '</div>';
	   	echo '</div>';
	   	echo '<br><br><br>';	   	
	} else {
			echo 'Réalisation introuvable !';
		}
	}

include_once 'inc/footer.php';
?>