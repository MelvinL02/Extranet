<?php
   session_start();
   if($_SESSION["autoriser"]!="oui"){
      header("location:login.php");
      exit();
   }
   if(date("H")<18)
      $bienvenue="Bonjour et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";
   else
      $bienvenue="Bonsoir et bienvenue ".
      $_SESSION["prenomNom"].
      " dans votre espace personnel";

    //ouverture d'une connexion à la bdd agenda
    $objetPdo = new PDO('mysql:host=localhost;dbname=extranet_gbaf','root','root');

    //préparation de la requête
    $pdoStat = $objetPdo->prepare('SELECT * FROM users WHERE id = :num');

    $pdoStat->bindValue(':num',$_GET['numContact'],PDO::PARAM_INT);

    $excuteIsOk = $pdoStat->execute();

    $contact = $pdoStat->fetch();
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
   <br>[ <a href="deconnexion.php">Se déconnecter</a> ]
   </div>
 
 <div id="container">
 <form action="modifier.php" method="post">
 <h1>Identifiants</h1>

 <div class = "left">
 <input type="hidden" name="numContact" value="<?= $contact['id']; ?>"></p>
 
 <br><p><label for="nom">Nom</label>
 <input type="text" id="nom" name="firstName" value="<?= $contact['nom']; ?>"></p>
 
 <br><p><label for="prenom">Prenom</label>
 <input type="text" id="prenom" name="lastName" value="<?= $contact['prenom']; ?>"></p>
 
 <br><p><label for="username">Utilisateur</label>
 <input type="text" id="username" name="username" value="<?= $contact['username']; ?>"></p>
 
 <br><p><label for="password">Mot de passe</label>
 <input type="password" id="password" name="password" value="<?= $contact['password']; ?>"></p>
 
 <br><p><label for="question">Question secrète</label>
 <input type="text" id="question" name="question" value="<?= $contact['question']; ?>"></p>
 
 <br><p><label for="reponse">Réponse à la question secrète</label>
 <input type="text" id="reponse" name="reponse" value="<?= $contact['reponse']; ?>">
 </p></div>
 
 <div class = "center">
 <br><p><input type="submit" value="Modifier"></p></div>

 </form>
<div>

<?php include_once('footer.php'); ?>

</body>
</html>
