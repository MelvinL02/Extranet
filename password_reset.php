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
    <h1>Changements du mot de passe</h1>

    <div class = "left">
    <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>"></p>
    
    <br><p><label for="password">Mot de passe</label>
    <input type="password" id="password" name="password"></p>
    
    <br><p><label for="password">Confirmer Mot de passe</label>
    <input type="password" id="repassword" name="repassword"></p>
    
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