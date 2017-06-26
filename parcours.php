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

<iframe class="cv" src="img/cv.pdf" ></iframe>
<center><object class="cvmobile" data="cv.pdf" type="application/pdf">
  lien alternatif : <a href="img/cv.pdf" target="_blank">affichage cv</a>
</object>
</center>
<br>
<?php
include_once 'inc/footer.php';
?>