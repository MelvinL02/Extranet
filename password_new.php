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
<html>
 <head>
   <meta charset="utf-8" />
   <link rel="stylesheet" href="login.css" />
   <title>Le-Groupement-Banque-Assurance-Français</title>
 </head>

<?php include_once('header.php'); ?> 

 <body>

 <div id="container">
  
 <!-- Zone d'idendification -->
    <form name="fo" method="post" action="">
    <h1>Changement du mot de passe</h1>

    <div class = "left">
    <label><b>Nom d'utilisateur</b></label>
    <input type="text" name="username" required placeholder="Utilisateur" /><br /></div>
    
    <div class = "center">
    <button type="submit" name="valider" value="VALIDER">Confirmer</button>
    </div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    </form>
    </div>

<?php include_once('footer.php'); ?>

  </body>
</html>

