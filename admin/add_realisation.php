<?php 
 
require_once 'inc/connect.php';
include_once 'inc/header.php';

$error = []; // array
$post = []; // array
$showErrors = false; // Par défaut, on ne veut pas afficher les erreurs
$success = false; 
$thepick = false; 
$nomFichier = '';  

// pour les echo dans mon formulaire ne pas perde mes données en cas de rafraîchissement de page
$title = '';
$url = '';
$content = '';

if(!empty($_POST) && (isset($post))){ //si le formulaire à été soumis
// On recréer le tableau en le nettoyant des espaces vides et balises HTML
  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
    }
    if(empty($post['title'])){
    $error[] = 'il faut donner un titre'; 
    } 
    if(empty($post['content'])){
    $error[] = 'il faut écrire un texte';
    }
    if(empty($post['url'])){
    $error[] = 'il faut mettre un lien';
    }
    
    /** Gestion de la date **/
    $date = new DateTime();
    $date_add = $date->createFromFormat('d/m/Y', $post['date_add']);

    /*** Traitement chargement de l'image ***/ 
    $folder = '../img/';  
    /*S'il y a un slash (/) initial, cherchera le dossier à la racine du site web (localhost). Sinon, cherchera dans le dossier courant*/
    if(!empty($_FILES) && isset($_FILES['image'])){

        $nomFichier = $_FILES['image']['name']; // Récupère le nom de mon fichier
        $tmpFichier = $_FILES['image']['tmp_name']; // Stockage temporaire du fichier
        $newFichier = $folder.$nomFichier; // Créer une chaine de caractère contenant le nom du dossier de destination et le nom du fichier final
        if(move_uploaded_file($tmpFichier, $newFichier)){
            $thepick = 'Fichier image envoyé !' ;
        }
        else {
            $error[] = 'Erreur lors de l\'envoi du fichier';
        }      
    }

    if(count($error) > 0){
    // Ici il y a des erreurs on les affichera plus tard
    $showErrors = true;
    $title = $post['title'];
    $content = $post['content'];
    $url = $post['url'];
    }
    else { 
        // Ici je suis sur de ne pas avoir d'erreurs, donc je peux faire du traitement.
        $res = $db->prepare('INSERT INTO achievements (title, image, url, content, date_add) VALUES(:title, :image, :url, :content, :date_add)');
        $res->bindValue(':title', $post['title']);
        $res->bindValue(':image', $nomFichier); //envoi vers le dossier img
        $res->bindValue(':url', $post['url']);
        $res->bindValue(':content', $post['content']);
        $res->bindValue(':date_add', $date_add->format('Y-m-d'));
      
        // retourne un booleen => true si tout est ok, false sinon
        if($res->execute()){ 
        // Si la requete s'execute correctement
            $success = true;
        }
        else {
            // Permettra d'afficher les erreurs éventuelles
            die(print_r($res->errorInfo()));
        }
    }
}
?>

    <h1 class="text-center"> Ajouter des réalisations </h1>

<!-- Si tout est ok, on affiche notre victoire ! -->
<?php 
    if(isset($success) && $success == true):
?>
    <div class="alert alert-success" role="alert">
    Cette réalisation a été bien mise à jour.</div>
        
    <div class="form-group">
        <button onclick="window.location.href='read_admin.php'" class="btn btn-primary">Retour aux réalisation </button>
    </div>

<?php endif;
    // Si on a des erreurs, on les affiche
    if(isset($showErrors) && $showErrors == true){
        // Afficher mes erreurs
        echo '<div class="alert alert-danger"><ul>';
        foreach($error as $err){
            echo '<li>'.$err.'</li>';
        }
        echo '</ul></div>';
    }
?>  
<form method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="title"> Titre </label>
        <input type="text" class="form-control" name="title" id="title" placeholder="Votre titre.." value="<?php echo $title; ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="image"> Image </label>
        <input type="file" name="image" id="image" placeholder="Votre image...">
        <p class="help-block">Charger votre image ici..</p>
    </div>
    <br>
    <div class="form-group">
        <label for="url"> Lien </label>
        <input type="text" class="form-control" name="url" id="url" placeholder="Votre lien ici.." value="<?php echo $url; ?>">
    </div>
    <br>
    <div class="form-group">
        <label for="content"> Texte </label>
        <textarea class="form-control" rows="3" name="content" id="content" placeholder="Votre texte ici..." value="<?php echo $content; ?>"></textarea>
    </div>
    <br>
    <!-- le date picker -->
    <div class="form-group">
        <label for="date_add"> Date </label>
        <input type="text" class="form-control" name="date_add" id="datepicker">
    </div>
    <button type="submit" class="btn btn-default" value="Envoyer"> Envoyer </button>
</form>

<?php include_once 'inc/footer.php';?>