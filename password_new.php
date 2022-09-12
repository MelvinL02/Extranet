<?php
session_start();
include "connexion.php";

// Récupérer l'id_user via l'username et récupérer la question secrète

@$username = $_POST["username"];
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $tab = $stmt->fetchAll();
    if (count($tab) > 0) {
        $_SESSION["id_user"] = ucfirst(strtolower($tab[0]["id_user"]));
        $_SESSION["question"] = ucfirst(strtolower($tab[0]["question"]));
        $_SESSION["autoriser"] = "oui";
        header("location:password_question.php");
    } else {
        $erreur = "Utilisateur incorrect!";
    }
}
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
				<!-- Formulaire de récupération de l'utilisateur -->
				<form name="fo" method="post">
					<h1>Mot de passe oublié</h1>
					<div class = "left">
						<label><b>Nom d'utilisateur :</b></label>
						<input type="text" name="username" required placeholder="Utilisateur" />
						<br />
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