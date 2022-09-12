<?php
session_start();
include "connexion.php";

if ($_SESSION["id_user"]) {
    $bienvenue = "" . $_SESSION["id_user"];
}
$erreur = "";
?>

<!DOCTYPE html>
<html lang="fr">
	<!-- En-tête de page -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1">
		<link rel="stylesheet" href="styles.css">
		<link rel="icon" href="images/fav_icon_gbaf.png">
		<title>Le Groupement Banque Assurance Français</title>
	</head>
	<!-- Corps de la page -->
	<body>
		<!-- Header du site -->
		<header id="login">
			<a href="login.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français"></a>
			<h2>Le Groupement Banque-Assurance Français</h2>
			<hr class="baliseHeader">
		</header>
		<!-- Contenu majoritaire du body -->
		<main>
			<div id="container">
				<!-- Formulaire de changement du MdP -->
				<form action="password_update.php" method="post">
					<h1>Mot de passe oublié</h1>
					<div class = "left">
						<input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
					</div>
					<div class = "left">
						<b><label for="password">Mot de passe :</label></b>
						<input type="password" id="password" name="password" placeholder="Mot de passe">
						</br>
					</div>
					<div class = "left">
						<br>
						<b><label for="password">Confirmer le mot de passe :</label></b>
						<input type="password" id="repassword" name="repassword" placeholder="Confirmer le mot de passe">
					</div>
					<div class = "center">
						<input type="submit" name="valider" value="Confirmer"/>
					</div>
					<div class="erreur">
						<?php echo $erreur ?>
					</div>
				</form>
			</div>
		</main>
		<!-- Bas de page -->
		<footer>
			<span class="vertical-line"></span>
			<a href="#" style="color:white" >Mentions légales</a>
			<span class="vertical-line"></span>
			<a href="#" style="color:white" >Contact</a>
			<span class="vertical-line"></span>
		</footer>
	</body>
</html>
