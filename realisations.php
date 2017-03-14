<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 
?> 

<p class="realtitle"> RÉALISATIONS </p> <br>
<!-- image banderole -->
<img class="align" src="img/prestation-soulignage-titre.png" alt="vignette"> 
<div class="container sizereal">
    <div class="annuletablerow row">
        <?php  
            $res = $db->prepare('SELECT * FROM achievements ORDER BY date_add DESC');
            $res->execute();

            // Retourne toutes les entrées de la table "achievements" sous forme de tableau array()
            $realisations = $res->fetchAll(PDO::FETCH_ASSOC);

        // var_dump($realisation); // Permet de sortir en brut nos realisations
        foreach($realisations as $real){
        	// $real contient chaque entrée de ma table, les colonnes deviennent les clés du tableau
        	echo '<div class="realcolumn col-sm-6 col-md-4 col-xs-9">';
            echo '<div class="titlereal">'.$real['title'].'</div>';
            echo '<figure class="ausurvolreal">';
            echo '<div class="blocrealorange"> </div>';
            echo '<img class="monimg" src="img/'.$real['image'].'" >';
            echo '<figcaption class="survolreal">';
            //echo '<p class="textreal">'.substr($real['content'],0, 500).'...</p>';
            //echo '<p>'.$real['url'].'<p>'; 
            // echo '<p class="datetxt"> '.date('d/m/Y', strtotime($real['date_add'])).'</p>';
            echo '<figcation>';
            echo '</figure>';
        	// En récupérant l'id de la realisation, je peux le passer en GET afin d'avoir un seul et même fichier pour lire chaque realisation individuellement 
            echo '<br><br>';
            echo '<a class="btnrealstye active" role="button" aria-pressed="true" href="read-realisation.php?id='.$real['id'].'"> Voir cette réalisation </a>';	
             echo '<br><br><br>';
        	echo '</div>'; 
        }
        ?>
    </div>
</div>
<div class="spacebtwrealfooter"></div>

<?php 
include_once 'inc/footer.php';
?>


 