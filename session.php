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
   $objetPdo=new PDO('mysql:host=localhost;dbname=extranet_gbaf','root','root');

   //préparation de la requête
   $pdoStat = $objetPdo->prepare('SELECT * FROM users');

   //exécution de la requête
   $executeIsOk = $pdoStat->execute();

   $contacts = $pdoStat->fetchAll();
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

<?php foreach ($contacts as $contact): ?>

   [ <a href="form_modification.php?numContact=<?= $contact['id'] ?>">Modifier</a> ]
 
<?php break ?> 
<?php endforeach; ?>

   <br>[ <a href="deconnexion.php">Se déconnecter</a> ]
   </div>

   <h1>Texte de présentation du GBAF et du site</h1>
   <div id="extranet">

    <img src="images/extranet.jpg" alt="" /></div>
    <h1>Texte acteurs et partenaires</h1>
            
   <section>
    <div class="element1">
     <img src="images/formation_co.png" alt="" />
     <h3>H3<br>Contenu textuel ... + lien</h3>
     <button onclick="window.location.href = 'https://openclassrooms.com/';">Lire la suite</button></div>
     
    <div class="element2">
     <img src="images/protectpeople.png" alt="" />
     <h3>H3<br>Contenu textuel ... + lien</h3>
     <button onclick="window.location.href = 'https://openclassrooms.com/';">Lire la suite</button></div>
     
    <div class="element3">
     <img src="images/Dsa_france.png" alt="" />
     <h3>H3<br>Contenu textuel ... + lien</h3>
     <button onclick="window.location.href = 'https://openclassrooms.com/';">Lire la suite</button></div>
     
    <div class="element4">
     <img src="images/CDE.png" alt="" />
     <h3>H3<br>Contenu textuel ... + lien</h3>
     <button onclick="window.location.href = 'https://openclassrooms.com/';">Lire la suite</button></div>
   </section>

<?php include_once('footer.php'); ?>
     
  </body>
</html>

