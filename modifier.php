<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   
    //ouverture d'une connexion à la bdd agenda
    $objetPdo = new PDO('mysql:host=localhost;dbname=extranet_gbaf','root','root');

    //préparation de la requête
    $pdoStat = $objetPdo->prepare('UPDATE users set nom=:nom, prenom=:prenom, username=:username, 
    password=:password, question=:question, reponse=:reponse WHERE id=:num LIMIT 1');

    $pdoStat->bindValue(':num', $_POST['numContact'], PDO::PARAM_INT);
    $pdoStat->bindValue(':nom', $_POST['firstName'], PDO::PARAM_STR);
    $pdoStat->bindValue(':prenom', $_POST['lastName'], PDO::PARAM_STR);
    $pdoStat->bindValue(':username', $_POST['username'], PDO::PARAM_STR);
    $pdoStat->bindValue(':password', $_POST['password'], PDO::PARAM_STR);
    $pdoStat->bindValue(':question', $_POST['question'], PDO::PARAM_STR);
    $pdoStat->bindValue(':reponse', $_POST['reponse'], PDO::PARAM_STR);


    //éxécution de la requête préparée
    $executeIsOk = $pdoStat->execute();

    if($executeIsOk){
      
   $message = 'Le contact a été mis à jour dans la bdd';
   header("location:session.php");

    } 
    else{

    $message = 'Echec insertion';

    }
?>