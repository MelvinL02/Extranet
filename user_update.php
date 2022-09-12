<?php
session_start();
include "variables.php";

// Demande d'update et récupération de l'username

if (isset($_POST["send"])) {
    $username = $_POST["username"];

    // Connexion à la BDD

    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    // Si le champ est vide, renvoi sur la page sinon on continue

    if (empty($username)) {
        $erreur = "Veuillez remplir le champ username !";
        header("refresh:5;url=user_form.php");
    } else {
        // Update de l'username

        $sql = "UPDATE users SET username = :username WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $_POST["id_user"], PDO::PARAM_INT);
        $executeIsOk = $stmt->execute();

        // Vérifier si la requête d'insertion a réussi

        if ($executeIsOk) {
            $message = "Vos données ont été mises à jour.";
            header("refresh:5;url=user_form.php");
        } else {
            $erreur = "Une erreur est survenue !";
        }
    }
}

if (isset($_POST["send_1"])) {
    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (strlen($_POST["password"]) >= 5) {
        $password = sha1($_POST["password"]);
        $data = $_POST;
        $passlength = "Choose a password longer then 5 character";
        if ($data["password"] !== $data["repassword"]) {
            header("Location: $referer");
            die("Les entrées ne correspondent pas !");
        }
        $sql = "UPDATE users SET password = :password WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":password", $password, PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $_POST["id_user"], PDO::PARAM_INT);
        $stmt->execute();
        $message = "Vos données ont été mises à jour.";
        header("refresh:5;url=user_form.php");
    } else {
        $erreur = "Votre mot de passe est trop court !";
        header("refresh:5;url=user_form.php");
    }
}

if (isset($_POST["send_2"])) {
    $nom = $_POST["nom"];

    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (empty($nom)) {
        $erreur = "Veuillez remplir le champ nom !";
        header("refresh:5;url=user_form.php");
    } else {
        $sql = "UPDATE users SET nom = :nom WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nom", $_POST["nom"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $_POST["id_user"], PDO::PARAM_INT);
        $executeIsOk = $stmt->execute();

        // Vérifier si la requête d'insertion a réussi

        if ($executeIsOk) {
            $message = "Vos données ont été mises à jour.";
            header("refresh:5;url=user_form.php");
        } else {
            $erreur = "Une erreur est survenue !";
        }
    }
}

if (isset($_POST["send_3"])) {
    $prenom = $_POST["prenom"];

    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (empty($prenom)) {
        $erreur = "Veuillez remplir le champ prenom !";
        header("refresh:5;url=user_form.php");
    } else {
        $sql = "UPDATE users SET prenom = :prenom WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":nom", $_POST["prenom"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $_POST["id_user"], PDO::PARAM_INT);
        $executeIsOk = $stmt->execute();

        // Vérifier si la requête d'insertion a réussi

        if ($executeIsOk) {
            $message = "Vos données ont été mises à jour.";
            header("refresh:5;url=user_form.php");
        } else {
            $erreur = "Une erreur est survenue !";
        }
    }
}

if (isset($_POST["send_4"])) {
    $question = $_POST["question"];
    $reponse = $_POST["reponse"];

    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (empty($question)) {
        $erreur = "Veuillez remplir le champ question !";
        header("refresh:5;url=user_form.php");
    } elseif (empty($reponse)) {
        $erreur = "Veuillez remplir le champ réponse !";
        header("refresh:5;url=user_form.php");
    } else {
        $sql =
            "UPDATE users SET question = :question, reponse = :reponse WHERE id_user = :id_user";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(":question", $_POST["question"], PDO::PARAM_STR);
        $stmt->bindParam(":reponse", $_POST["reponse"], PDO::PARAM_STR);
        $stmt->bindParam(":id_user", $_POST["id_user"], PDO::PARAM_INT);
        $executeIsOk = $stmt->execute();

        // Vérifier si la requête d'insertion a réussi

        if ($executeIsOk) {
            $message = "Vos données ont été mises à jour.";
            header("refresh:5;url=user_form.php");
        } else {
            $erreur = "Une erreur est survenue !";
        }
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
		<header id="header">
			<a href="session.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français"></a>
			<div id="user">
				<div class="userImg">
					<img id="account" alt="Icone de l'utilisateur" src="images/icone_account.png">
				</div>
				<div id="userLink">
					<p>
						<a href="user_form.php"><?php echo htmlspecialchars($_SESSION["prenomNom"])?></a>
					</p>
					<p id="deco">
						<a href="deconnexion.php">Se déconnecter</a>
					</p>
				</div>
			</div>
		</header>

    <main>
		<div id="containeur">
			<br>
			<h1 id=prenomNom><?php echo htmlspecialchars($_SESSION["prenomNom"])?></h1>
			<section id="form">
				<form action="user_update.php"  method="post">
					<div class="erreur">
						<?php echo $message ?>
						<?php echo $erreur ?>
					</div>
				</form>
			</section>
      <!-- Contenu majoritaire du body -->
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




            

