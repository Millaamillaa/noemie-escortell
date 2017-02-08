<?php 

session_start();
setcookie('remember', NULL, -1);

unset($_SESSION['auth']);

$_SESSION['flash']['success'] = 'Vous etes maintenant déconnecté';

header('location: login.php');