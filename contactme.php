<?php 
include_once 'inc/header.php';
require_once 'inc/connect.php'; 
?>


    <div class="contact">    
        <!-- Formulaire de contact -->
        <form id="contact" method="post">
            <h2 class="center"><i class="fa fa-paper-plane" aria-hidden="true"></i> Formulaire de contact</h2>
            <br>
            <div class="form-group two-inputs-aside beckille">
                <label for="email" class="mail">Votre email :</label>
                <input name="email" type="email" class="form-control" id="email" placeholder="Email">
            </div>
            <div class="form-group two-inputs-aside">
                <label for="name" class="name">Votre nom :</label>
                <input name="name" type="text" class="form-control" id="name" placeholder="Nom">
            </div>

            <div class="form-group">
                <label for="object" class="">L'objet de votre demande :</label>
                <input name="object" type="text" class="form-control" id="object" placeholder="Objet">
                <label class="content">Votre contenu :</label>
                <textarea name="content" class="form-control" rows="4" cols="3" placeholder="Votre contenu"> </textarea>
            </div>
            <button type="submit" class="btn btn-primary">Envoyer le formulaire</button> 
            &nbsp; <a href="index.php"> Retour Accueil </a>
        </form>
    </div>

<?php  
include_once 'inc/footer.php';
?>
