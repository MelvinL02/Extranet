<?php
   session_start();
   include("connexion.php");
   include("variables.php");

   // Insertion et suppression des likes

   if(isset($_GET['t'],$_GET['id']) AND !empty($_GET['t']) AND !empty($_GET['id'])) {
   $getid = (int) $_GET['id'];
   $gett = (int) $_GET['t'];
   $sessionid = $_SESSION["id_user"];
   $check = $pdo->prepare('SELECT id_user FROM users WHERE id_user = ?');
   $check->execute(array($getid));
   if($check->rowCount() == 1) {
      if($gett == 1) {
         $check_like = $pdo->prepare('SELECT id FROM likes WHERE id_article = ? AND id_membre = ?');
         $check_like->execute(array($getid,$sessionid));
         $del = $pdo->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
         $del->execute(array($getid,$sessionid));
         if($check_like->rowCount() == 1) {
            $del = $pdo->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
         } else {
            $ins = $pdo->prepare('INSERT INTO likes (id_article, id_membre) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
         }

   // Insertion et suppression des dislikes
         
      } elseif($gett == 2) {
         $check_like = $pdo->prepare('SELECT id FROM dislikes WHERE id_article = ? AND id_membre = ?');
         $check_like->execute(array($getid,$sessionid));
         $del = $pdo->prepare('DELETE FROM likes WHERE id_article = ? AND id_membre = ?');
         $del->execute(array($getid,$sessionid));
         if($check_like->rowCount() == 1) {
            $del = $pdo->prepare('DELETE FROM dislikes WHERE id_article = ? AND id_membre = ?');
            $del->execute(array($getid,$sessionid));
         } else {
            $ins = $pdo->prepare('INSERT INTO dislikes (id_article, id_membre) VALUES (?, ?)');
            $ins->execute(array($getid, $sessionid));
         }
      }
      header("Location: $referer");
   } else {
      exit ('Erreur fatale.');
   }
} else {
   exit ('Erreur fatale.');
}