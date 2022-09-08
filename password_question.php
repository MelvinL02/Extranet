<?php session_start();
include("connexion.php");

if($_SESSION["question"])
$question=" ".
$_SESSION["id_user"];
$_SESSION["question"];

@$reponse = $_POST["reponse"];
@$valider = $_POST["valider"];
$erreur = "";

// Montrer la question secrète et demander la réponse

if(isset($valider)){
$stmt = $pdo->prepare("SELECT * FROM users WHERE reponse = ?");
$stmt->execute(array($reponse));
$tab = $stmt->fetchAll();
if(count($tab)>0){
$_SESSION["autoriser"]="oui";
header("location:password_reset.php");
}
else
   $erreur="Réponse incorrecte!";
}
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="icon" href="images/fav_icon_gbaf.png">
    <title>Le Groupement Banque Assurance Français</title>
  </head>
    
  <body>
        <header id="login">
         <a href="login.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français"></a> 
         <h2>Le Groupement Banque Assurance Français</h2>
         <hr class="baliseHeader">  
        </header>

  <!-- Zone de connexion -->

    <main>
    <div id="container">
    <form name="fo" method="post">
    <h1>Mot de passe oublié</h1>

    <div class="center">
    <b>Question secrète :</b><br>
    <br><?php echo htmlspecialchars($_SESSION["question"]);?>
    </div>

    <div class="left">
    <label><b>Réponse à la question secrète :</b></label>
    <input type="text" name="reponse" required placeholder="Réponse"></div>
    
    <div class="center">
    <input type="submit" name="valider" value="Confirmer">
    </div>

    <div class="erreur">
    <?php echo $erreur ?></div>
    </form>
    </div>
    </main>

   <footer>
        <span class="vertical-line"></span> 
        <a href="#" style="color:white" >Mentions légales</a>
        <span class="vertical-line"></span>
        <a href="#" style="color:white" >Contact</a>
        <span class="vertical-line"></span>
   </footer>
  </body>
</html>