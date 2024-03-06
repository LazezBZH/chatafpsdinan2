<?php
session_start();

if(isset($_POST) && !empty($_POST)){
    // On vérifie que tous les champs sont existants et remplis
    if(isset($_POST['title']) && !empty($_POST['title']) && isset($_POST['para']) && !empty($_POST['para']) ){
        // Ici le formulaire est complet
        // On récupère les valeurs des champs
        $title = strip_tags($_POST['title']);
        $para = strip_tags($_POST['para']);

      
        // On se connecte à la base
        require_once('inc/bdd.php');

        // On écrit la requête
        $sql = 'INSERT INTO `news`(`para`, `title`) VALUES (:para, :title);';

        // On prépare la requête
        $query = $db->prepare($sql);

        // On injecte les valeurs
        $query->bindValue(':para', $para, PDO::PARAM_STR);
        $query->bindValue(':title', $title, PDO::PARAM_STR);

        // On exécute la requête
        $query->execute();

        // On redirige vers la page d'accueil
        header('Location: admin.php');

    }else{
        // echo '<span class="error-form">Tous les champs sont obligatoires</span>';
        echo "<script type='text/javascript'>alert('Tous les champs sont obligatoires');</script>";
    }
}
include_once('inc/header.php');
?>
<div class="inscription-container col-12 my-1">
    <h1>Article</h1>
    <form method="post">
        <div class="form-group">
            <label for="title">Titre :</label>
            <input class="form-control" type="text" id="title" name="title">
        </div>
        <div class="form-group">
            <label for="para">Contenu :</label>
            <textarea rows="10" class="form-control" id="para" name="para"></textarea>
        </div>
        <button class="btn btn-art">Enregistrer</button>
     
    </form>
       <a href="/chatafpsdinan2/admin.php" class="btn btn-cancel">Annuler</a>
</div>
<?php
include_once('inc/footer.php');
