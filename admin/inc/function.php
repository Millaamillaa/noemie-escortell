<?php 

	function debug($variable){
		echo '<pre>'.print_r($variable, true).'</pre>';
	}

	function str_random($length){
		$alphabet = "0123456789azertyuiopqsdfghjkmnbvcxwAZERTYUIOPMLKJHGFDSQNBVCXW";
		return substr(str_shuffle(str_repeat($alphabet, $length)), 0, $length);
	}

	function logged_only(){
		if (session_status() == PHP_SESSION_NONE) {
			session_start(); 
		}
		if (!isset($_SESSION['auth'])) {
			$_SESSION['flash']['danger'] = "Vous n'avez pas le droit d'accéder a cette page !";
			header('location: login.php');
			exit();
	}
}

function reconnect_cookie(){

	if (session_status() == PHP_SESSION_NONE) {
			session_start(); 
		}

	if (isset($_COOKIE['remember']) && !isset($_SESSION['auth'])) {
		require_once 'connect.php';
		if(!isset($bdd)){
			global $bdd;
		}
		$remember_token = $_COOKIE['remember'];
		$parts = explode('==', $remember_token);
		$user_id = $parts[0];
		$req = $bdd->prepare('SELECT * FROM users WHERE id = ?');
		$req->execute([$user_id]);
		$user = $req->fetch();

		if ($user) {
			 $expected = $user_id . '==' . $user->remember_token. sha1($user_id . 'ratonlaveurs');
			 if($expected == $remember_token){
			 	
					session_start();
					$_SESSION['auth'] = $user;
					setcookie('remember',$remember_token, time() +  60 * 60 * 24 * 7);
					
		 }else{
		 	setcookie('remeber', null, -1);
		 }

	}else{
		 	setcookie('remeber', null, -1);
		 }
}

}

function omail($username, $email, $firstname ,$lastname, $token){
		if($_SERVER['HTTP_HOST'] == 'localhost'){ // en local
			$lien = 'http://localhost/php/Jour28_29_04_2016finalisation_site/confirm.php?id=user_id&token='.$token;
		}
		else {
			$lien = 'http://'.$_SERVER['HTTP_HOST'].'/damienm/confirm.php?id=user_id&token='.$token;	
		}


		require_once 'vendor/autoload.php';
		$mail = new PHPMailer;
			//$mail->SMTPDebug = 3;                               // Enable verbose debug output
			$mail->isSMTP();                                      // Set mailer to use SMTP
			$mail->Host = 'smtp.mailgun.org';					  // Specify main and backup SMTP servers
			$mail->SMTPAuth = true;                               // Enable SMTP authentication
			$mail->Username = 'postmaster@wf3.axw.ovh';           // SMTP username
			$mail->Password = 'WF3sessionPhilo2';                 // SMTP password
			$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
			$mail->Port = 587;                                    // TCP port to connect to

			$mail->setFrom('damien.machado33@gmail.com');
			$mail->addAddress($email, $firstname, $lastname);      // Name is optional
			//$mail->addReplyTo('info@example.com', 'Information');
	
			$mail->isHTML(true);                                  // Set email format to HTML

			$mail->Subject = 'Valider votre compte';
			$mail->Body    =  $username.'Afin de valider votre compte merci de cliquer sur ce lien : '.$lien;
			$mail->AltBody = $username. $username.'Afin de valider votre compte merci de cliquer sur ce lien : '.$lien;

			if(!$mail->send()) {
			    echo 'Message could not be sent.';
			    echo 'Mailer Error: ' . $mail->ErrorInfo;
			} else {
			    echo 'Message has been sent';
			}
}



