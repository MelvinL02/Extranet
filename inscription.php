<?php
   session_start();
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
      if(empty($nom)) $erreur="Champ nom vide!";
      elseif(empty($prenom)) $erreur="Champ prénom vide!";
      elseif(empty($username)) $erreur="Champ utilisateur vide!";
      elseif(empty($question)) $erreur="Champ question vide!";
      elseif(empty($reponse)) $erreur="Champ reponse vide!";
      elseif(empty($password)) $erreur="Champ mot de passe vide!";
      elseif($password!=$repassword) $erreur="Mots de passe non identiques!";
      else{
         include("connexion.php");
         $stmt=$pdo->prepare("select id from users where username=? limit 1");
         $stmt->execute(array($username));
         $tab=$stmt->fetchAll();
         if(count($tab)>0)
            $erreur="L'utilisateur existe déjà!";
         else{
            $ins=$pdo->prepare("insert into users(nom,prenom,username,password,question,reponse) values(?,?,?,?,?,?)");
            if($ins->execute(array($nom,$prenom,$username,sha1($password),$question,$reponse)))
               header("location:login.php");
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