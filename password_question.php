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
header("location:password_new.php");
}
else
   $erreur="Réponse incorrecte!";
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
    <form name="fo" method="post" action="" >
    <h1>Changement du mot de passe</h1>
    <br><label><h2>Question secrète :</h2></label>
    <br><h2><?php echo htmlspecialchars($_SESSION["question"]);?></h2>

    <div class = "left">
    <br><label><b>Réponse à la question secrète</b></label>
    <input type="text" name="reponse" required placeholder="Réponse" /><br /></div>
    
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
