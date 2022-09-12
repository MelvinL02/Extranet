<?php
session_start();
include "connexion.php";

// Formulaire de connexion à l'index du site

@$username = $_POST["username"];
@$password = sha1($_POST["password"]);
@$valider = $_POST["valider"];
$erreur = "";
if (isset($valider)) {
    if (empty($username)) {
        $erreur = "Veuillez remplir le champ username !";
    } elseif (empty($password)) {
        $erreur = "Veuillez remplir le champ mot de passe !";
    }
    $stmt = $pdo->prepare(
        "SELECT * FROM users WHERE username = ? AND password = ?"
    );
    $stmt->execute([$username, $password]);
    $tab = $stmt->fetchAll();
    if (count($tab) > 0) {
        $_SESSION["id_user"] = strtoupper($tab[0]["id_user"]);
        $_SESSION["username"] = ucfirst(strtolower($tab[0]["username"]));
        $_SESSION["nom"] = ucfirst(strtolower($tab[0]["nom"]));
        $_SESSION["prenom"] = ucfirst(strtolower($tab[0]["prenom"]));
        $_SESSION["prenomNom"] =
            ucfirst(strtolower($tab[0]["prenom"])) . " " . $tab[0]["nom"];
        $_SESSION["autoriser"] = "oui";
        header("location:session.php");
    } else {
        $erreur = "Mauvais utilisateur ou mot de passe!";
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
	<!-- En-tête de page -->
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=0.86">
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
				<!-- Formulaire de création de l'utilisateur -->
				<form name="form" method="post">		
					<h1>Connexion</h1>
					<div class="left">
						<label><b>Nom d'utilisateur :</b></label>
						<input type="text" name="username" placeholder="Utilisateur">
					</div>
					<div class="left">
						<label><b>Mot de passe :</b></label>
						<input type="password" name="password" placeholder="Mot de passe">
					</div>
					<div class="center">
						<input type="submit" name="valider" value="LOGIN">
					</div>
					<div class="erreur">
						<?php echo $erreur ?>
					</div>
					<p class="box-register1">
						Vous êtes nouveau ici ? 
						<a href="inscription.php">S'inscrire</a>
					</p>
					<p class="box-register2">
						Mot de passe oublié ? 
						<a href="password_new.php">Créer un nouveau mot de passe</a>
					</p>
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