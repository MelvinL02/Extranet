<?php
   session_start();
   include("connexion.php");

   @$username = $_POST["username"];
   @$password = sha1($_POST["password"]);
   @$valider = $_POST["valider"];
   $erreur = "";
   if(isset($valider)){
      if(empty($username)) $erreur="Veuillez remplir le champ username !";
      elseif(empty($password)) $erreur="Veuillez remplir le champ mot de passe !";
      $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
      $stmt->execute(array($username,$password));
      $tab = $stmt->fetchAll();
      if(count($tab)>0){
         $_SESSION["id"]=(strtoupper($tab[0]["id"]));
         $_SESSION["username"]=ucfirst(strtolower($tab[0]["username"]));
         $_SESSION["nom"]=ucfirst(strtolower($tab[0]["nom"]));
         $_SESSION["prenom"]=ucfirst(strtolower($tab[0]["prenom"]));
         $_SESSION["prenomNom"]=ucfirst(strtolower($tab[0]["prenom"])).
         " ".($tab[0]["nom"]);
         $_SESSION["autoriser"]="oui";
         header("location:session.php");
      }
      else
         $erreur="Mauvais utilisateur ou mot de passe!";
   }
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
        <title>Le-Groupement-Banque-Assurance-Français</title>
    </head>
    
  <body>
        <header id="login">
         <a href="login.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français" /></a> 
         <h2>Le Groupement Banque-Assurance Français</h2>
         <hr class="baliseHeader" />
        </header>

    <div id="container">

 <!-- Zone de connexion -->

    <form name="" method="post" action="">
    <h1>Connectez-vous</h1>
    
    <div class = "left">
    <label><b>Nom d'utilisateur :</b></label>
    <input type="text" name="username" placeholder="Utilisateur" /><br /></div>
    
    <div class = "left">
    <label><b>Mot de passe :</b></label>
    <input type="password" name="password" placeholder="Mot de passe" /><br /></div>
    
    <div class = "center">
    <input type="submit" name="valider" value="LOGIN" /></div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    
    <p class="box-register1">Vous êtes nouveau ici ? <a href="inscription.php">S'inscrire</a></p>
    <p class="box-register2">Mot de passe oublié ? <a href="password_new.php">Créer un nouveau mot de passe</a></p></div>
    </form>
    </div>

  <footer>
   <hr class="baliseFooter" />
   <span class="vertical-line"></span> 
   <a href="https://openclassrooms.com" title="Vous ne le regretterez pas !" style="color:white" >Mentions légales</a>
   <span class="vertical-line"></span>
   <a href="https://openclassrooms.com" title="Vous ne le regretterez pas !" style="color:white" >Contact</a>
   <span class="vertical-line"></span>  
  </footer>
  </body>
</html>