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
   <h2><?php echo htmlspecialchars($bienvenue);?></h2>
   
   [ <a href="session.php">Accueil</a> ]
   <br>[ <a href="user_form.php">Modifier</a> ]
   
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

