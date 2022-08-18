<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if($_SESSION["id"])
      $bienvenue="".
      $_SESSION["prenomNom"];
   if($_SESSION["id"])
      $username="".
      $_SESSION["username"];
   if($_SESSION["id"])
      $nom="".
      $_SESSION["nom"];
   if($_SESSION["id"])
      $prenom="".
      $_SESSION["prenom"];

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
   <div class="sucess">
   <h2><?php echo $bienvenue?></h2>
   [ <a href="session.php">Accueil</a> ]
   <br>[ <a href="deconnexion.php">Se déconnecter</a> ]
   </div>

  <div id="account">
  <h1><?php echo $bienvenue?></h1>

 <section class="form">
        <h2><u>Changer mon nom d'utilisateur</u></h2>
        <form action="user_update.php"  method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
            <p><b><label for="username">Nom d'utilisateur : </label><br />
            <input type="text" name="username" id="username" value="<?php echo $username?>" /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
            <input type="submit" name="send" value="Valider">
        </form>
    </section>

    <section class="form">
        <h2><u>Changer mon mot de passe</u></h2>
        <form action="user_update.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
            <p><b><label for="password">Mon nouveau mot de passe : </label><br />
            <input type="password" name="password" id="password" required /></p></b>
            <p class="error"></p>
            <p><b><label for="repassword">Confirmation du nouveau mot de passe : </label><br />
            <input type="password" name="repassword" id="repassword" required /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
            <input type="submit" name="send_1" value="Valider">
        </form>
    </section>

    <section class="form">
        <h2><u>Changer mon nom</u></h2>
        <form action="user_update.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
            <p><b><label for="nom">Nom : </label><br />
            <input type="text" name="nom" id="nom" value="<?php echo $nom?>"  /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
            <input type="submit" name="send_2" value="Valider">
        </form>
    </section>

    <section class="form">
        <h2><u>Changer mon prénom</u></h2>
        <form action="user_update.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
            <p><b><label for="prenom">Prénom : </label><br />
            <input type="text" name="prenom" id="prenom" value="<?php echo $prenom?>"  /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
            <input type="submit" name="send_3" value="Valider">
        </form>
    </section>

    <section class="form">
        <h2><u>Changer ma question secrète et ma réponse</u></h2>
        <form action="user_update.php" method="post" novalidate>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
            <p><b><label for="question">Ma nouvelle question secrète : </label><br />
            <input type="text" name="question" id="question" value="" required /></p></b>
            <p class="error"></p>
            <p><b><label for="reponse">Ma nouvelle réponse secrète : </label><br />
            <input type="text" name="reponse" id="reponse" value="" required /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
            <input type="submit" name="send_4" value="Valider">
        </form>
    </section>
 </div>

<?php include_once('footer.php'); ?>

 </body>
</html>
