<?php
session_start();
include_once('inc/header.php');
if(isset($_SESSION['user']) && !empty($_SESSION['user'])){
    // Ici, l'utilisateur est connecté
    include_once('inc/banner.php');
    ?>
    <div class="hello">
        <h2>Chat de l'<span class="grey">A</span><span class="green">F</span><span class="red">P</span><span class="green">S</span> -<span class="grey"> D</span>inan</h2>
        <div class="hello-user">
            <p >Bonjour <span class="hello-name">  <?= $_SESSION['user']['pseudo'] ?></span></p>
            <a class="btn btn-deco" href="deconnexion.php">Déconnexion</a>
        </div>
    </div>

<?php 
include_once('inc/discussions.php');
}else{
    // Ici l'utilisateur n'est pas connecté
    ?>
    <div class="connexion-container">
        <a class="btn btn-co mr-2" href="connexion.php">Connexion</a> 
        <div>
            <p>Vous êtes membre de l'asso? <br> Demandez-nous un accès:</p>
            <a class="reveal-how-to" href="mailto:afpsdinan22@gmail.com"> &#x1F4E7; afpsdinan22@gmail.com</a>
            <span class="myTooltip">Précisez dans votre mail votre prénom, votre nom de famille et l'adresse mail que vous utiliserez pour vous connecter.</span>
        </div>

    </div>

<?php
}
?>

<?php
include_once('inc/headerbottom.php');
include_once('inc/footer.php');
