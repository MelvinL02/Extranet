<?php
   session_start();
   include("connexion.php");

   if($_SESSION["id"])
   $bienvenue=" ".
   $_SESSION["id"];
   $erreur = "";

?>

<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="styles.css" />
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

    <form name="fo" method="post" action="">
    <h1>Mot de passe oublié</h1>

    <div class = "left">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>"></div>
    
    <div class = "left">
    <b><label for="password">Mot de passe :</label></b>
    <input type="password" id="password" name="password" placeholder="Mot de passe"></br></div>
    
    <div class = "left">
    <br><b><label for="password">Confirmer le mot de passe :</label></b>
    <input type="password" id="repassword" name="repassword" placeholder="Confirmer le mot de passe"></div>
    
    <div class = "center">
    <input type="submit" name="valider" value="Confirmer"/>
    </div>

    <div class="erreur">
    <?php echo $erreur ?></div>
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