<?php
   session_start();
   include("variables.php");
   include("connexion.php");

   // Affichage des commentaires de la page

   $acteur = 1;
   $sql = ("SELECT * from comments WHERE id_actor = 1 ORDER BY created_at DESC");
   $statement = $pdo->query($sql);
   $comments = $statement->fetchAll(PDO::FETCH_ASSOC);

   // Affichage des nombres de like de l'acteur

   if(isset($_GET['id']) AND !empty($_GET['id'])) {
      $get_id = htmlspecialchars($_GET['id']);
      $article = $pdo->prepare('SELECT * FROM users WHERE id_user = ?');
      $article->execute(array($get_id));
      if($article->rowCount() == 1) {
         $article = $article->fetch();
         $id = $article['id_user'];
         $likes = $pdo->prepare('SELECT id FROM likes WHERE id_article = ?');
         $likes->execute(array($id));
         $likes = $likes->rowCount();
         $dislikes = $pdo->prepare('SELECT id FROM dislikes WHERE id_article = ?');
         $dislikes->execute(array($id));
         $dislikes = $dislikes->rowCount();
      } else {
         die('Cet article n\'existe pas !');
      }
   } else {
      die('Erreur');
   }

   // Vérifier si l'utilisateur a liké/disliké l'acteur

   if($_SESSION["id_user"])
      $select = $pdo->prepare ("SELECT u.id_user FROM users u INNER JOIN likes l ON u.id_user = l.id_membre WHERE l.id_article = 1");
      $select->execute(array($_SESSION["id_user"]));
    if($select->rowCount() > 0) {
      $select = $select->fetch();
      $message="Vous avez aimé cet acteur.";
    } else {
      $select = $pdo->prepare ("SELECT u.id_user FROM users u INNER JOIN dislikes d ON u.id_user = d.id_membre WHERE d.id_article = 1");
      $select->execute(array($_SESSION["id_user"]));
    if($select->rowCount() > 0) {
      $select = $select->fetch();
      $message="Vous n'avez pas aimé cet acteur.";
    } else {
      $message="";
    }
   }
?>

<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
    <link rel="icon" href="images/fav_icon_gbaf.png">
    <title>Le Groupement Banque Assurance Français</title>
  </head>
    
  <body>
        <header id="header">
      <a href="session.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français"></a> 
      <div id="user">
         <div class="userImg"><img id="account" alt="Icone de l'utilisateur" src="images/icone_account.png"></div>
         <div id="userLink">   
           <p><a href="user_form.php"><?php echo htmlspecialchars($_SESSION["prenomNom"])?></a></p>
           <p id="deco"><a href="deconnexion.php">Se déconnecter</a></p>
         </div>
      </div>
        </header>
        
   <main>
    <section id="presentation_acteur">
        <figure class="logo_page_acteur">
            <img src="images/formation_co.png" alt="logo de l'acteur">
        </figure>
        <div class="description_page_acteur">
            <h2>Formation&co</h2>
            <p><p>Formation&co est une association française présente sur tout le territoire.</p>
            <p>Nous proposons à des personnes issues de tout milieu de devenir entrepreneur grâce à un crédit et un accompagnement professionnel et personnalisé.</p>
            <p>Notre proposition :</p> 
            <ul>
            <li><span  class="li_content">un financement jusqu’à 30 000€ ;</span></li>
            <li><span  class="li_content">un suivi personnalisé et gratuit ;</span></li>
            <li><span  class="li_content">une lutte acharnée contre les freins sociétaux et les stéréotypes.</span></li>
            </ul>
            
            <p>Le financement est possible, peu importe le métier : coiffeur, banquier, éleveur de chèvres… . Nous collaborons avec des personnes talentueuses et motivées.</p>
            <p>Vous n’avez pas de diplômes ? Ce n’est pas un problème pour nous ! Nos financements s’adressent à tous.</p>
        </div>
        <div class="like">
            <span class="fas fa-thumbs-up fa-lg"><a href="action.php?t=1&id=<?= $id ?>" style="color:green;"> J'aime (<?= $likes ?>)</a></span>
            <span class="fas fa-thumbs-down fa-lg"><a href="action.php?t=2&id=<?= $id ?>" style="color:red;"> Je n'aime pas (<?= $dislikes ?>)</a></span>
        </div>
        <div class="erreur">
            <?php echo $message ?></div>
    </section>

    <section id="form">
     <form name="fo" action="commentaires.php" method="post">
      <h2><u>Mon commentaire :</u></h2>
      <input type="hidden" name="id_actor" value="<?php echo htmlspecialchars($acteur)?>"/>
      <input type="hidden" name="prenom" value="<?php echo htmlspecialchars($_SESSION["prenom"])?>"/>
      <p><textarea name="comment" rows="8" cols="90" placeholder="Votre commentaire"></textarea></p>
      <input type="submit" name="valider" value="Envoyer">
     </form>
    </section>

   <section id="sectionComment">
    <h2>Commentaires</h2>
    <?php foreach ($comments as $comment) : ?>
    <div class="commentaires">
        <div class="head_comment">
            <div>
                <p class="firstname"><b><?php echo htmlspecialchars($comment['prenom'])?></b></p>
                <p class="date_add">Posté le <?php echo htmlspecialchars($comment['created_at'])?></p>
              </div>
        </div>
        <p class="comment"><?php echo htmlspecialchars($comment['comment'])?></p>
    </div>
    <?php endforeach; ?>
    </section>
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
