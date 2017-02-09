<?php 
require_once 'connect.php';
//SECURISATION BACK OFFICE
function logged_only(){
if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
if (!isset($_SESSION['admin'])) {
    echo '<br>';
    echo "<div class='alert alert-danger' style='color:red; font-size: 60px;'><center><strong>Vous n'avez pas le droit d'accéder a cette page !</strong></center></div>";
    echo '<br>';
    echo '<br>';
    echo '<center><img src="https://media.giphy.com/media/14fs128vvqge3e/giphy.gif"></center>';
  /*  header('Location: ../index.php');*/
    exit();
	}
}
function logged(){
    if (!isset($_SESSION['admin'])) {
        echo '<br>';
        echo "<div class='alert alert-danger' style='color:red; font-size: 60px;'><center><strong>Vous n'avez pas le droit d'accéder a cette page !</strong></center></div>";
        echo '<br>';
        echo '<br>';
        echo '<center><img src="https://media.giphy.com/media/14fs128vvqge3e/giphy.gif"></center>';
      /*  header('Location: ../index.php');*/
        exit();
    }
}
?>
