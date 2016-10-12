<?php
require_once 'inc/connect.php';
include_once 'inc/header.php';

// On instancie nos variables qu'on utilisera plus tard
$post = array();
$error = array();
$displayErr = false;
$formValid = false; 

// pour les echo dans mon formulaire ne pas perde mes données en cas de rafraîchissement de page
$title = '';
$url = '';
$content = '';

// Permet de s'assurer qu'un paramètre GET est bien été transmis et qu'il est de de type numérique 
if(isset($_GET['id']) && !empty($_GET['id'])){
	$idRealisation = $_GET['id']; 
	if(!is_numeric($idRealisation)){
		$idRealisation = 1;
	}
}

// si $idRealisation est défini 
if(isset($idRealisation)){
	// On vérifie que notre formulaire n'est pas vide
	if(!empty($_POST)){
		// On recréer le tableau en le nettoyant des espaces vides en début et fin de chaine
		// et de l'éventuel code HTML / PHP
		foreach($_POST as $key => $value){
			$post[$key] = trim(strip_tags($value));
		}

		if(empty($post['title'])){
		    $error[] = 'il faut donner un titre'; 
		    } 
	    if(empty($post['content'])){
	    	$error[] = 'il faut écrire un texte';
	    }
	    
	     if(empty($post['url'])){
	    	$error[] = 'il faut mettre un lien';
	    }
	}

	if(count($error) > 0){
		$displayErr = true;
	}
	else { 
		// Ici je suis sur de ne pas avoir d'erreurs, donc je peux faire du traitement.
		// (title, image, url, content, date_add) VALUES(title, image, url, content, date_add)
		$res = $db->prepare('UPDATE achievements SET title = :titleReal, image = :imageReal, url = :urlReal, content = :contentReal, date_add = :dateReal WHERE id = :idRealisation');

		// On passe l'id de la Realisation pour ne mettre à jour que la réalisation en cours d'édition (clause WHERE)
		// On sécurise à noveau en ajoutant intval() 
		$res->bindValue(':idRealisation', intval($idRealisation), PDO::PARAM_INT); 
		// On complète les champs
		$res->bindValue(':titleReal', $post['title'], PDO::PARAM_STR);
		$res->bindValue(':imageReal', $post['image'], PDO::PARAM_STR);
		$res->bindValue(':urlReal', $post['url'], PDO::PARAM_STR);
		$res->bindValue(':contentReal', $post['content'], PDO::PARAM_STR);
		$res->bindValue(':dateReal', date('d/m/Y', strtotime($post['date_add'])) ,PDO::PARAM_STR);

		// retourne un booleen => true si tout est ok, false sinon
		if($res->execute()){
			$formValid = true; // Pour afficher le message de réussite si tout est bon
		}
		else {
			// Permettra d'afficher les erreurs éventuelles
			die(print_r($res->errorInfo()));
		}
	}
}
	

	// Prépare et execute la requète SQL pour récuperer notre réalisation de manière dynamique
	$res = $db->prepare('SELECT * FROM achievements WHERE id = :idRealisation');
	$res->bindParam(':idRealisation', $idRealisation, PDO::PARAM_INT);
	$res->execute();

	// $realisation contient ma réalisation extrait de la bdd
	$realisation = $res->fetch(PDO::FETCH_ASSOC);
?>


<h1 class="text-center"> Modifier une réalisation </h1>

<?php 
	if($formValid): // Si tout est ok, on affiche notre victoire ! ?>
		<div class="alert alert-success" role="alert">
		Cette réalisation a été bien mise à jour.</div>
			
		<div class="form-group">
            <button onclick="window.location.href='read_admin.php'" class="btn btn-primary">Retour aux réalisation </button>
        </div>
	<?php endif;

	if($displayErr){ // Si on a des erreurs, on les affiche
		echo '<div class="alert alert-danger" role="alert"></ul>';
	        foreach ($errors as $err) {
	            echo '<li>'. $err . '</li>';
	        }
	    echo '</ul></div>';
	}
?>

<form method="POST">
	<label for="title">Title</label>
	<input type="text" id="title" name="title" placeholder="Votre titre.." value="<?php echo $realisation['title']; ?>">
	<br>
    <div class="form-group">
        <label for="image"> Image </label>
        <input type="file" name="image" id="image" placeholder="Votre image..." value="<?php echo $realisation['image']; ?>">
        <p class="help-block">Charger votre image ici..</p>
    </div>
    <br>
    <div class="form-group">
        <label for="url"> Lien </label>
        <input type="text" class="form-control" name="url" id="url" placeholder="Votre lien ici.." value="<?php echo $realisation['url']; ?> " >
    </div>
    <br>
    <div class="form-group">
        <label for="content"> Texte </label>
        <textarea class="form-control" rows="3" name="content" id="content" placeholder="Votre texte ici..." value="<?php echo $realisation['content']; ?>"></textarea>
    </div>
    <br>
    <!-- le date picker -->
   	<div class="form-group">
        <label for="date_add"> Date</label>
        <input type="text" class="form-control" name="date_add" id="datepicker" placeholder="Votre titre.." value="<?php echo $realisation['date_add']; ?>">
    </div>
	<button type="submit" class="btn btn-default" value="Envoyer"> Envoyer </button>
</form>

<?php include_once 'inc/footer.php';?>
