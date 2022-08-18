<?php
  session_start();
  include("connexion.php");
  
  $password = sha1($_POST["password"]);
  $data = $_POST;

  if(empty($data['id']) ||
     empty($data['password']) ||
     empty($data['repassword'])) {
    
     die('Merci de remplir tous les champs !');
    }

  if ($data['password'] !== $data['repassword']) {
    die('Les entrées ne correspondent pas !');   
  }

    //préparation de la requête
    $pdoStat = $pdo->prepare('UPDATE users set password=:password WHERE id=:num LIMIT 1');

    $pdoStat->bindValue(':num', $_POST['id'], PDO::PARAM_INT);
    $pdoStat->bindValue(':password', $password, PDO::PARAM_STR);

    //éxécution de la requête préparée
    $executeIsOk = $pdoStat->execute();

  if($executeIsOk){
      
   $message = 'Le mot de passe a été mis à jour dans la bdd';
   header("location:login.php");

  } 
  else{

   $message = 'Echec de la modification';

  }
?>