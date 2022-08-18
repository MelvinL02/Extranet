<?php
   session_start();
   include("connexion.php");
   
   @$nom=$_POST["nom"];
   @$prenom=$_POST["prenom"];
   @$username=$_POST["username"];
   @$password=$_POST["password"];
   @$repassword=$_POST["repassword"];
   @$question=$_POST["question"];
   @$reponse=$_POST["reponse"];
   @$valider=$_POST["valider"];
   $erreur="";
   if(isset($valider)){
      if(empty($nom)) $erreur="Veuillez remplir le champ nom !";
      elseif(empty($prenom)) $erreur="Veuillez remplir le champ prénom !";
      elseif(empty($username)) $erreur="Veuillez remplir le champ utilisateur !";
      elseif(empty($question)) $erreur="Veuillez remplir le champ question !";
      elseif(empty($reponse)) $erreur="Veuillez remplir le champ reponse !";
      elseif(empty($password)) $erreur="Veuillez remplir le champ mot de passe !";
      elseif($password!=$repassword) $erreur="Mots de passe non identiques !";
      else{
         $stmt=$pdo->prepare("SELECT * from users WHERE username=? limit 1");
         $executeIsOk = $stmt->execute(array($username));
         $tab=$stmt->fetchAll();
         if(count($tab)>0)
            $erreur="L'utilisateur existe déjà!";
         else{
            $ins=$pdo->prepare("INSERT into users(nom,prenom,username,password,question,reponse) values(?,?,?,?,?,?)");
         if($ins->execute(array($nom,$prenom,$username,sha1($password),$question,$reponse)));
         
         if($executeIsOk){
      
            $message = 'Le login a été crée !';
            header("location:login.php");
         } 
         else{
        
            $message = "Echec de l'inscription";
        
           }
         }   
      }
   }
?>

<!DOCTYPE html>
<html>
 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="login.css" />
   <title>Le-Groupement-Banque-Assurance-Français</title>
 </head>

<?php include_once('header.php'); ?> 

 <body>
   
 <div id="container">
    
    <form name="fo" method="post" action="">
    <h1>Inscription</h1>

    <div class = "left">
      <input type="text" name="nom" placeholder="Nom" /><br />
      <input type="text" name="prenom" placeholder="Prénom" /><br />
      <input type="text" name="username" placeholder="Utilisateur" /><br />
      <input type="password" name="password" placeholder="Mot de passe" /><br />
      <input type="password" name="repassword" placeholder="Confirmer Mot de passe" /><br />
      <input type="text" name="question" placeholder="Question secrète" /><br />
      <input type="text" name="reponse" placeholder="Réponse à la question secrète" /><br /></div>
    
    <div class="erreur"><?php echo $erreur ?></div>
    
    <div class = "center">
      <input type="submit" name="valider" value="S'authentifier" /></div>
    </form>
 </div>

<?php include_once('footer.php'); ?>
 
 </body>
</html>