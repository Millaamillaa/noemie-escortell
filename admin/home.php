 <?php 
session_start();
require_once 'inc/header.php';
require_once 'inc/connect.php';
require_once 'inc/function.php';

logged();
?>


<center>
<p> Bienvenue sur l'interface d'administration : <?php echo $_SESSION['admin'] ?> !<hr>
Dans les menus ci-dessus vous pourrez effectuer les modifications de vos contenus. <p>
<center>

<?php include_once 'inc/footer.php';?>
