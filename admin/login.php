<?php session_start();
include_once 'inc/header.php'; 
require_once 'inc/function.php';
require_once 'inc/connect.php';

$post = [];

$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

?>

<h2> Se connecter </h2>
<?php 
if(!empty($_POST)){
	// Permet de nettoyer les données du formulaire. Équivalent à notre foreach() habituel
	$post = array_map('strip_tags', $_POST);
	$post = array_map('trim', $post);

	if (isset($_POST) AND !empty($_POST)) {
		if (!empty(htmlspecialchars($_POST['username'])) AND !empty(htmlspecialchars($_POST['password']))) {

				$req = $db->prepare('SELECT * FROM users WHERE username = :username AND password = :password ');
				$req->execute([
					'username' => $_POST['username'],
					'password' => $_POST['password']
					]);
				$user = $req->fetchObject();
					if ($user) {
						$_SESSION['admin'] = $_POST['username'];
						header('location:home.php');
					}
					else{
						$error ='Identifiants incorrects';
					} 
		}
		else{
				$error = 'Veuillez remplir tous les champs!';
			}
		}
	}
	//traitement des erreurs
	if(isset($error)){
		echo '<div class="error">'. $error .'</div>';
	}
 ?>

<?php if(isset($_SESSION['user'])): 
	header('Location: admin.php');?>    
<?php else: ?>

<br>
<form action="login.php" method="POST" class="pure-form pure-form-aligned">

	<div class="pure-control-group">

		<label for="">Pseudo ou email</label>

		<input type="text" name="username" class="from-control" required/> <!--MODIFICATION  fromcontrol ====> formcontrol -->
		<br>
		
	</div>

	<div class="pure-control-group">

		<label for="">Password</a></label>
		<input type="password" name="password" class="from-control" required/>
	</div>

	<div class="pure-control-group">
		
			<input type="checkbox" name="remember" value="1"/> <label>Se souvenir de moi</label>
	
	</div>
	<input type="hidden" name="id_client" value="<?php echo $_SESSION['id'];?>">
<button type="submit" class="pure-button pure-button-primary">Se connecter</button>
 <?php endif; ?>
</form>

<?php require 'inc/footer.php' ?>