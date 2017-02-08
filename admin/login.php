<?php 

$db = new PDO('mysql:host=localhost;dbname=noemi;charset=utf8', 'root', '');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

require 'inc/header.php'; 

$req = $db->query('SELECT * FROM users');
$user = $req->fetch();

?>

<h2> Se connecter </h2>
<br>

<form action="" method="POST" class="pure-form pure-form-aligned">

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

</form>

<?php require 'inc/footer.php' ?>