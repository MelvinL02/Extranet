<?php
session_start();
include "variables.php";

// Insertion des commentaires dans la page acteur concernée

if ($_SESSION["id_user"]) {
    $actor = $_POST["id_actor"];
}
$prenom = $_POST["prenom"];
$comment = $_POST["comment"];
$valider = $_POST["valider"];

if (isset($valider)) {
    try {
        include "connexion.php";
    } catch (Exception $e) {
        die("Erreur : " . $e->getMessage());
    }

    if (empty($comment)) {
        header("Location: $referer");
    } else {
        $select = $pdo->prepare("SELECT prenom FROM comments WHERE prenom = ?");
        $select->execute($prenom);

        if ($select->rowCount() > 8) {
            $erreur = "Vous avez trop commenté !";
        } else {
            $ins = $pdo->prepare(
                "INSERT INTO comments (id_actor,prenom,comment) VALUES (?,?,?)"
            );
            $executeIsOk = $ins->execute([$actor, $prenom, $comment]);
        }

        if ($executeIsOk) {
            $erreur = "Commentaire envoyé !";
            header("Location: $referer");
        } else {
            $erreur = "Echec de l'envoi";
            header("Location: $referer");
        }
    }
}
?>


