<?php 

require_once 'inc/connect.php';

$error = []; // array
$post = []; // array
$showErrors = false; // Par défaut, on ne veut pas afficher les erreurs
$success = false; 
$msgOk = 'Le contact a bien été rajouté';
$msgError = 'Une erreur malencontreuse s\'est produite';

if(!empty($_POST) && (isset($post))){ //si le formulaire à été soumis
// On recréer le tableau en le nettoyant des espaces vides et balises HTML
  foreach($_POST as $key => $value){
    $post[$key] = trim(strip_tags($value));
    }
    if(empty($post['title'])){
    $error[] = 'il faut donner un titre'; 
    } 
    if(empty($post['image'])){
    $error[] = 'il faut mettre une image';
    }
    if(empty($post['content'])){
    $error[] = 'il faut écrire un texte';
    }

    if(empty($post['link'])){
    $error[] = 'il faut mettre un lien';
    }

    if(count($error) > 0){
    // Ici il y a des erreurs on les affichera plus tard
    $showErrors = true;
    }
    else {
    $res = $db->prepare('INSERT INTO achievements (title, image, content, link) VALUES(:title, :image, :content, :link');

    $res->bindValue(':title', $post['title']);
    $res->bindValue(':image', $post['image']);
    $res->bindValue(':content', $post['content']);
    $res->bindValue(':link', $post['link']);
  
    if($res->execute()){ // Si la requete s'execute correctement
        $success = true;
    }
  }
}
?>

<!doctype html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <title>Ajouter des réalisations</title>
  </head>
  <body>
    <?php 
        if($showErrors){
            echo $msgError .' <br />';
            echo implode(' <br />', $error);

        }
        if($success){
            echo $msgOk;
        }
    ?>  
    <form method="POST">
        <label for="title">Titre</label>
        <input type="text" name="title" id="title" placeholder="Votre titre...">

        <br>
        <label for="image">Image</label>
        <input type="text" name="image" id="image" placeholder="Votre image...">

        <br>
        <label for="link">Lien</label>
        <input type="text" name="link" id="link" placeholder="Votre lien...">

        <br>
        <label for="content">Texte</label>
        <input type="text" name="content" id="content" placeholder="texte">

        <br>
        <input type="submit" value="Envoyer">

      </form>
    </body>

</body>
</html>