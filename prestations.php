<?php 
include_once 'inc/header.php';
?>

<!-- bloc 1--> 
    <section id="prestation">
        <p class="bigtitlepresta"> PRESTATIONS </p>
        <img src="img/prestation-soulignage-titre.png" alt="vignette"> <!-- image banderole -->
        <div class="sizemiddle">
            <div class="container">
                <div class="row">
                    <!-- picto 1 --> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="mespicto">
                        	<img class="prestapicto" src="img/prestation-picto-1.png" alt="vignette"> <!-- picto 1 -->
                            <p class="titlepresta"> COOPÉRATION TERRITORIALE ET <br> COOPERATION INTERNATIONALE </p>
                            <p class="textpresta"> Convaincue de la nécessité aujourd'hui pour ... </p>
                            <a href="sous-cooperation.php"><img class="boutonplus" src="img/btn-ensavoirplus.png"></a> <!-- en savoir plus image -->
                        </div>
                    </div>
                    <!-- picto 2 --> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="mespicto">
                        	<img class="prestapicto" src="img/prestation-picto-2.png" alt="vignette"> <!-- picto 2 -->
                            <p class="titlepresta"> PROJETS DÉVELOPPEMENT <br> TERRITORIAL </p>
                            <p class="textpresta"> Mon réseau de partenaires et mes  ... </p>
                            <a href="sous-projet.php"><img class="boutonplus" src="img/btn-ensavoirplus.png"></a> <!-- en savoir plus image -->
                        </div>
                    </div>
                    <!-- picto 3--> 
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-4">
                        <div class="mes picto">
                        	<img class="prestapicto" src="img/prestation-picto-3.png" alt="vignette"> <!-- picto  3-->
                            <p class="titlepresta"> COÛT DES PRESTATIONS <br> ET DEVIS </p> 
                            <p class="textpresta"> Mon réseau de partenaires et mes ... </p>
                            <a href="sous-coutpresta.php"><img class="boutonplus" src="img/btn-ensavoirplus.png"></a> <!-- en savoir plus image -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php  
include_once 'inc/footer.php';
?>