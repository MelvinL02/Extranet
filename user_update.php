<?php
   session_start();
   include("variables.php");
   
   if(isset($_POST['send'])){
    $username=$_POST["username"];
  
   try {
   include("connexion.php");
   } catch(Exception $e){
   die('Erreur : '.$e->getMessage());
   }
      
   if(empty($username)) header("location:user_form.php");
   else{
    
    $sql = "UPDATE users SET username = :username WHERE id = :id";
    $stmt = $pdo->prepare($sql);                                  
    $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);     
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $stmt->execute();
       
    // vérifier si la requête d'insertion a réussi
   if($stmt){
    echo "Vos données ont été mises à jour.";
    header("Location: $referer");
  
   }else{
    echo "Une erreur est survenue !";
       }
      }
     }
  
   if(isset($_POST['send_1'])){
    $password = sha1($_POST["password"]);
    $data = $_POST;
   if ($data['password'] !== $data['repassword']) {
   die('Les entrées ne correspondent pas !');   
   }

   try {
    include("connexion.php");
    } catch(Exception $e){
    die('Erreur : '.$e->getMessage());
    }

   if(empty($password)) header("location:user_form.php");
   else{

    $sql = "UPDATE users SET password = :password WHERE id = :id";
    $stmt = $pdo->prepare($sql);                                  
    $stmt->bindParam(':password', $password, PDO::PARAM_STR);     
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $stmt->execute();
      
    // vérifier si la requête d'insertion a réussi
   if($stmt){
    echo "Vos données ont été mises à jour.";
    header("Location: $referer");
       
   }else{
    echo "Une erreur est survenue !";
       }
      }
     }
     
   if(isset($_POST['send_2'])){
    $nom=$_POST["nom"];

   try {
     include("connexion.php");
     } catch(Exception $e){
     die('Erreur : '.$e->getMessage());
     }

   if(empty($nom)) header("location:user_form.php");
   else{

    $sql = "UPDATE users SET nom = :nom WHERE id = :id";
    $stmt = $pdo->prepare($sql);                                  
    $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);     
    $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
    $stmt->execute();
      
    // vérifier si la requête d'insertion a réussi
   if($stmt){
    echo "Vos données ont été mises à jour.";
    header("Location: $referer");
   
   }else{
    echo "Une erreur est survenue !";
    }
   }
  }

  if(isset($_POST['send_3'])){
   $prenom=$_POST["prenom"];

  try {
   include("connexion.php");
   } catch(Exception $e){
   die('Erreur : '.$e->getMessage());
   }
  
  if(empty($prenom)) header("location:user_form.php");
  else{

   $sql = "UPDATE users SET prenom = :prenom WHERE id = :id";
   $stmt = $pdo->prepare($sql);                                  
   $stmt->bindParam(':nom', $_POST['prenom'], PDO::PARAM_STR);     
   $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
   $stmt->execute();
      
   // vérifier si la requête d'insertion a réussi
   if($stmt){
    echo "Vos données ont été mises à jour.";
    header("Location: $referer");
    
   }else{
    echo "Une erreur est survenue !";
    }
   }
  }
     
  if(isset($_POST['send_4'])){
   $question=$_POST["question"];
   $reponse=$_POST["reponse"];

  try {
   include("connexion.php");
   } catch(Exception $e){
   die('Erreur : '.$e->getMessage());
   }

  if(empty($question)) header("location:user_form.php");
  elseif(empty($reponse)) header("location:user_form.php");
  else{

   $sql = "UPDATE users SET question = :question, reponse = :reponse WHERE id = :id";
   $stmt = $pdo->prepare($sql);                                  
   $stmt->bindParam(':question', $_POST['question'], PDO::PARAM_STR); 
   $stmt->bindParam(':reponse', $_POST['reponse'], PDO::PARAM_STR);     
   $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
   $stmt->execute();

   // vérifier si la requête d'insertion a réussi
  if($stmt){
   echo "Vos données ont été mises à jour.";
   header("Location: $referer");
  }else{
   echo "Une erreur est survenue !";
   } 
  }
 }
?>



            

