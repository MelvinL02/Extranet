<?php
session_start();
include("connexion.php");

@$username = $_POST["username"];
@$valider = $_POST["valider"];
$erreur = "";
if(isset($valider)){
  $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
  $stmt->execute(array($username));
  $tab = $stmt->fetchAll();
  if(count($tab)>0){
    $_SESSION["id"]=ucfirst(strtolower($tab[0]["id"]));
    $_SESSION["question"]=ucfirst(strtolower($tab[0]["question"]));
    $_SESSION["autoriser"]="oui";
    header("location:password_question.php");
   
}
else
$erreur="Utilisateur incorrect!";
}
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="login.css" />
        <title>Le-Groupement-Banque-Assurance-Français</title>
    </head>
    
  <body>
        <header id="header">
         <a href="login.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français" /></a> 
         <h2>Le Groupement Banque-Assurance Français</h2>
         <hr class="balise1" />  
        </header>

    <div id="container">

 <!-- Zone de connexion -->

    <form name="fo" method="post" action="">
    <h1>Changement du mot de passe</h1>

    <div class = "left">
    <label><b>Nom d'utilisateur</b></label>
    <input type="text" name="username" required placeholder="Utilisateur" /><br /></div>
    
    <div class = "center">
    <input type="submit" name="valider" value="Confirmer"/>
    </div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    </form>
    </div>

  <footer>
   <hr class="balise2" />
   <span class="vertical-line"></span> 
   <a href="https://openclassrooms.com" title="Vous ne le regretterez pas !" style="color:white" >Mentions légales</a>
   <span class="vertical-line"></span>
   <a href="https://openclassrooms.com" title="Vous ne le regretterez pas !" style="color:white" >Contact</a>
   <span class="vertical-line"></span>  
  </footer>
  </body>
</html>