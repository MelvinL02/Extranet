<?php
   session_start();
   include("connexion.php");

   if($_SESSION["id"])
   $bienvenue=" ".
   $_SESSION["id"];

?>

<!DOCTYPE html>
<html>
  <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="style.css" />
   <title>Le-Groupement-Banque-Assurance-Français</title>
  </head>
 
<?php include_once('header.php'); ?> 
  
 <body>

  <div id="container">

  <form action="password_update.php" method="post">
  <h1>Changements du mot de passe</h1>

  <div class = "left">
  <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>"></p>
 
  <br><p><label for="password">Mot de passe</label>
  <input type="password" id="password" name="password"></p>

  <br><p><label for="password">Confirmer Mot de passe</label>
  <input type="password" id="repassword" name="repassword"></p>
 
  <div class = "center">
  <button type="submit" name="valider" value="VALIDER">Confirmer</button>
  </div>
  </form>
  </div>

<?php include_once('footer.php'); ?>

 </body>
</html>
