<?php

// Accès à la session si connecté sinon redirection sur la page de login

if($_SESSION["autoriser"]!="oui"){
   header("location:login.php");
   exit();

// Récupération des informations lors de la création de session   

} else {
$_SESSION["id_user"];
$_SESSION["prenomNom"];
$_SESSION["username"];
$_SESSION["nom"];
$_SESSION["prenom"];
$referer = $_SERVER['HTTP_REFERER'];
$message = "";
$erreur = "";
}
?>