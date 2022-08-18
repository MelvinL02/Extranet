<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if($_SESSION["id"])
      $bienvenue=" ".
      $_SESSION["prenomNom"];

      if(isset($_POST['send'])){
         try {
           include("connexion.php");
         } catch(Exception $e){
       
           die('Erreur : '.$e->getMessage());
         }
       
       $sql = "UPDATE users SET username = :username  
                 WHERE id = :id";
             
       $stmt = $pdo->prepare($sql);                                  
       $stmt->bindParam(':username', $_POST['username'], PDO::PARAM_STR);     
       $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
       $stmt->execute();
       
       // vérifier si la requête d'insertion a réussi
       if($stmt){
       echo 'Les données ont bien été insérés';
       }else{
       echo "Une erreur est survenue !";
       }
       
      }elseif(isset($_POST['send_1'])){
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

        $sql = "UPDATE users SET password = :password  
        WHERE id = :id";
  
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);     
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $stmt->execute();
         
        // vérifier si la requête d'insertion a réussi
         if($stmt){
            echo 'Les données ont bien été insérés';
          }else{
            echo "Une erreur est survenue !";
          }
        
      }elseif(isset($_POST['send_2'])){
         try {
            include("connexion.php");
          } catch(Exception $e){
        
            die('Erreur : '.$e->getMessage());
         }

        $sql = "UPDATE users SET nom = :nom  
        WHERE id = :id";
  
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':nom', $_POST['nom'], PDO::PARAM_STR);     
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $stmt->execute();
         
        // vérifier si la requête d'insertion a réussi
         if($stmt){
            echo 'Les données ont bien été insérés';
          }else{
            echo "Une erreur est survenue !";
          }

      }elseif(isset($_POST['send_3'])){
         try {
            include("connexion.php");
          } catch(Exception $e){
        
            die('Erreur : '.$e->getMessage());
         }

        $sql = "UPDATE users SET prenom = :prenom  
        WHERE id = :id";
  
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':nom', $_POST['prenom'], PDO::PARAM_STR);     
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $stmt->execute();
         
        // vérifier si la requête d'insertion a réussi
         if($stmt){
            echo 'Les données ont bien été insérés';
          }else{
            echo "Une erreur est survenue !";
          }
        
      }elseif(isset($_POST['send_4'])){
         try {
            include("connexion.php");
          } catch(Exception $e){
        
            die('Erreur : '.$e->getMessage());
         }

        $sql = "UPDATE users SET question = :question, reponse = :reponse  
        WHERE id = :id";
  
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':question', $_POST['question'], PDO::PARAM_STR); 
        $stmt->bindParam(':reponse', $_POST['reponse'], PDO::PARAM_STR);     
        $stmt->bindParam(':id', $_POST['id'], PDO::PARAM_INT);   
        $stmt->execute();

         // vérifier si la requête d'insertion a réussi
         if($stmt){
           echo 'Les données ont bien été insérés';
         }else{
           echo "Une erreur est survenue !";
         }
       }
?>
            

