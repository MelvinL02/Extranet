<?php
session_start();
include "connexion.php";

$password = sha1($_POST["password"]);
$data = $_POST;
$message = "";
$erreur = "";

// Si les champs sont vides = message d'erreur

if (
    empty($data["id_user"]) ||
    empty($data["password"]) ||
    empty($data["repassword"])
) {
    die("Merci de remplir tous les champs !");
}

if ($data["password"] !== $data["repassword"]) {
    die("Les entrées ne correspondent pas !");
}

// Préparation de la requête

$pdoStat = $pdo->prepare(
    "UPDATE users set password=:password WHERE id_user=:num LIMIT 1"
);

$pdoStat->bindValue(":num", $_POST["id_user"], PDO::PARAM_INT);
$pdoStat->bindValue(":password", $password, PDO::PARAM_STR);

// Exécution de la requête préparée

$executeIsOk = $pdoStat->execute();

if ($executeIsOk) {
    $message = "";
    header("location:login.php");
} else {
    $erreur = "Echec de l'envoi";
}
?>
