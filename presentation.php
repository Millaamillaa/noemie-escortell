<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 


    $res = $db->prepare('SELECT * FROM about');
    $res->execute();

    // Retourne toutes les entrées de la table "about" sous forme de tableau array()
    $about = $res->fetchAll(PDO::FETCH_ASSOC);

// var_dump($realisation); // Permet de sortir en brut nos about
foreach($about as $apropos){
	// $apropos contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
    echo '<img class="id" src="img/'.$apropos['image'].'">';
    echo '<div class="titleaboutme">'.$apropos['title'].'</div>';
    echo '<img class="align" src="img/prestation-soulignage-titre.png" alt="vignette">';
    echo '<br><p class="textaboutme">'.$apropos['content'].'</p>';           
	echo '</div>'; 
}

include_once 'inc/footer.php';
?>