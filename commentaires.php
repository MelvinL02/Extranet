<?php
   session_start();

   if($_SESSION["autoriser"]!="oui"){
    header("location:login.php");
    exit();
 }
 
 if($_SESSION["id"])
   $prenom = $_POST["prenom"];
   $comment = $_POST["comment"];
   $valider = $_POST["valider"];
   $erreur="";

   if(isset($valider)){
    try {
        include("connexion.php");
      } catch(Exception $e){
    
        die('Erreur : '.$e->getMessage());
      }

 if(empty($comment)) $erreur="Veuillez remplir le champ commentaire !";
   else{
   $select = $pdo->prepare('SELECT prenom FROM comments WHERE prenom = ?');
   $select->execute([$prenom]);
  
  if ($select->rowCount() > 0) {

      $message = 'Vous avez déjà commenté !';
      header("location:session.php");} 
   
   else{

    $ins = $pdo->prepare("INSERT INTO comments (id,prenom,comment) VALUES (?,?,?)");
    $executeIsOk = $ins->execute(array($_SESSION["id"],$prenom, $comment));
    }

   if($executeIsOk){
    
    $message = 'Le commentaire à été envoyé !';
    header("location:page_acteur_form&co.php");
   
   } 
   else{

    $message = "Echec de l'inscription";
    }
   }   
  }
?>




