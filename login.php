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
<html>
 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="login.css" />
   <title>Le-Groupement-Banque-Assurance-Français</title>
 </head>

<?php include_once('header.php'); ?> 

 <body>

 <div id="container">

 <!-- Zone de connexion -->
    <form name="fo" method="post" action="">
    <h1>Connexion</h1>
    
    <div class = "left">
    <label><b>Nom d'utilisateur</b></label>
    <input type="text" name="username" placeholder="Utilisateur" /><br /></div>
    
    <div class = "left">
    <label><b>Mot de passe</b></label>
    <input type="password" name="password" placeholder="Mot de passe" /><br /></div>
    
    <div class = "center">
    <input type="submit" name="valider" value="LOGIN" /></div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    
    <br>
    <p class="box-register1">Vous êtes nouveau ici ? <a href="inscription.php">S'inscrire</a></p>
    <p class="box-register2">Mot de passe oublié ? <a href="password_reset.php">Créer un nouveau mot de passe</a></p></div>
    </form>
 </div>

<?php include_once('footer.php'); ?>
 
 </body>
</html>