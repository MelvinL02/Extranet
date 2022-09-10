<?php
   session_start();
   include("connexion.php");

   // Formulaire de création de login et insertion en BDD
   
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
<html lang="fr">
   <head>
        <meta charset="utf-8">
        <meta name="viewport" content="initial-scale=1, maximum-scale=1">
        <link rel="stylesheet" href="styles.css">
        <link rel="icon" href="images/fav_icon_gbaf.png">
        <title>Le Groupement Banque Assurance Français</title>
   </head>
    
   <body>
        <header id="login">
         <a href="login.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français"></a> 
         <h2>Le Groupement Banque-Assurance Français</h2>
         <hr class="baliseHeader">  
        </header>

    <main>
    <div id="container">
    <form name="fo" method="post">
    <h1>Inscription</h1>

    <div class = "left">
    <label><b>Nom :</b></label>
    <input type="text" name="nom" placeholder="Nom"></div>

    <div class = "left">
    <label><b>Prénom :</b></label>
    <input type="text" name="prenom" placeholder="Prénom"></div>
    
    <div class = "left">
    <label><b>Nom d'utilisateur :</b></label>
    <input type="text" name="username" placeholder="Utilisateur"></div>
    
    <div class = "left">
    <label><b>Mot de passe :</b></label>
    <input type="password" name="password" placeholder="Mot de passe"></div>

    <div class = "left">
    <label><b>Confirmation mot de passe :</b></label>
    <input type="password" name="repassword" placeholder="Confirmer le Mot de passe"></div>
    
    <div class = "left">
    <label><b>Question secrète :</b></label>
    <input type="text" name="question" placeholder="Question"></div>

    <div class = "left">
    <label><b>Réponse secrète :</b></label>
    <input type="text" name="reponse" placeholder="Réponse"></div>

    <div class = "center">
    <input type="submit" name="valider" value="S'inscrire"></div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    </form>
    </div>
    </main>

    <footer>
        <span class="vertical-line"></span> 
        <a href="#" style="color:white" >Mentions légales</a>
        <span class="vertical-line"></span>
        <a href="#" style="color:white" >Contact</a>
        <span class="vertical-line"></span>
     </footer>
  </body>
</html>