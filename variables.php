<?php
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }

   $referer = $_SERVER['HTTP_REFERER'];

   if($_SESSION["id"])
      $bienvenue="".
      $_SESSION["prenomNom"];
   if($_SESSION["id"])
      $username="".
      $_SESSION["username"];
   if($_SESSION["id"])
      $nom="".
      $_SESSION["nom"];
   if($_SESSION["id"])
      $prenom="".
      $_SESSION["prenom"];
      $erreur = "";
?>