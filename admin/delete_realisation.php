<?php 
include_once 'inc/header.php';
include_once 'inc/function.php';
require_once 'inc/connect.php';
logged_only();

$deleteOk = false;
// Permet de s'assurer qu'un paramètre GET est bien été transmis et qu'il est de de type numérique 
if(isset($_GET['id']) && !empty($_GET['id'])){
	$idRealisation = $_GET['id']; 
	if(!is_numeric($idRealisation)){
		$idRealisation = 1;
	}
}

if(!empty($_GET)){
	foreach($_GET as $key => $value){
		$get[$key] = trim(strip_tags($value));
	}
	$res= $db->prepare('DELETE FROM achievements WHERE id = :idRealisation');
	$res->bindValue(':idRealisation', $get['id'], PDO::PARAM_INT);
	if($res->execute()){
		$deleteOk = true;
	}
}

if($deleteOk): ?>
	<div class="alert alert-success" role="alert"> La réalisation a bien été supprimé. </div>
			
		<div class="form-group">
            <button onclick="window.location.href='read_admin.php'" class="btn btn-primary">Retour aux réalisations</button>
        </div>
<?php 

else:
	echo '<div class="alert alert-danger" role="alert">';
	echo 'Problème lors de la supression, contactez l\'administrateur';
	echo '</div>';
endif;

include_once 'inc/footer.php';?>
