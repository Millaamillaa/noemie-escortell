<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; ?>

<!-- // ici il faudra faire l'insertion du cv en php
//     $res = $db->prepare('SELECT * FROM cv');
//     $res->execute();
//     // Retourne toutes les entrées de la table "cv" sous forme de tableau array()
//     $result = $res->fetchAll(PDO::FETCH_ASSOC);

// // var_dump($result); // Permet de sortir en brut nos données
// 	foreach($result as $resume){
		
// 		// $resume contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
// 	    echo '<img class="" src="img/'.$resume['image'].'">';
// 	} -->

<div class="btnloadcv"> 
<p class="textcv">Pour télécharger ou imprimer mon CV</p>
<a target="_blank" href="img/cv.pdf"><button type="button" class="btn btn-warning">	Lien CV </button></a>
</div>
<div class="lecv"></div>
<div class="lecv2"></div>

<?php
include_once 'inc/footer.php';
?>