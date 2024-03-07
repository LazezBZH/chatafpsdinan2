<?php
// On vérifie la méthode utilisée
if($_SERVER['REQUEST_METHOD'] == 'GET'){
    // On est en GET
    // On vérifie si on a reçu un id
 

        // On se connecte à la base
        require_once('../inc/bdd.php');

        // On écrit la requête
        $sql = 'SELECT `news`.`id`, `news`.`title`, `news`.`para`, `news`.`created_at` FROM `news`  ORDER BY `news`.`id`;';

        // On exécute la requête
        $query = $db->query($sql);

        // On récupère les données
        $news = $query->fetchAll();

        // On encode en JSON
        $newsJson = json_encode($news);

        // On envoie
        echo $newsJson;
    
}else{
    // Mauvaise méthode
    http_response_code(405);
    echo json_encode(['news' => 'Mauvaise méthode']);
}