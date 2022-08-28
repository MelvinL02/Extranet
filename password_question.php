<?php session_start();
include("connexion.php");

if($_SESSION["question"])
$question=" ".
$_SESSION["id"];
$_SESSION["question"];

@$reponse = $_POST["reponse"];
@$valider = $_POST["valider"];
$erreur = "";

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
        <meta charset="utf-8" />
        <link rel="stylesheet" href="style.css" />
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
    <h1>Changement du mot de passe</h1>
    <br><label><h2>Question secrète :</h2></label>
    <br><h2><?php echo htmlspecialchars($_SESSION["question"]);?></h2>

    <div class = "left">
    <label><b>Réponse à la question secrète</b></label>
    <input type="text" name="reponse" required placeholder="Réponse" /><br /></div>
    
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