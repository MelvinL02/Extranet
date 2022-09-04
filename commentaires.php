<?php
   session_start();
   include("variables.php");
 
  if($_SESSION["id"])
   $actor = $_POST["actor_id"];
   $prenom = $_POST["prenom"];
   $comment = $_POST["comment"];
   $valider = $_POST["valider"];
   $message="";

  if(isset($valider)){
    try {
        include("connexion.php");
      } catch(Exception $e){
    
        die('Erreur : '.$e->getMessage());
      }

  if(empty($comment)) $message="Veuillez remplir le champ commentaire !";
   else{
   $select = $pdo->prepare('SELECT prenom FROM comments WHERE prenom = ?');
   $select->execute([$prenom]);
  
  if ($select->rowCount() > 6) {

      $message = 'Vous avez déjà commenté !'; 
   
  }else{

    $ins = $pdo->prepare("INSERT INTO comments (actor_id,id,prenom,comment) VALUES (?,?,?,?)");
    $executeIsOk = $ins->execute(array($actor, $_SESSION["id"], $prenom, $comment));
    }

  if($executeIsOk){
    
    $message = 'Commentaire envoyé !'; 

 
  }else{

    $message = "Echec de l'envoi";
    }
   }   
  }

  $acteur = 1;
  $sql = ("SELECT * from comments WHERE actor_id = 1 ORDER BY created_at DESC");
  $statement = $pdo->query($sql);
  $comments = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="fr">
   <head>
       <meta charset="utf-8" />
       <link rel="stylesheet" href="styles.css" />
       <title>Le-Groupement-Banque-Assurance-Français</title>
   </head>
   
 <body>
       <header id="header">
     <a href="session.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français" /></a> 
     <div id="user">
        <div class="userImg"><img id="account" src="images/icone_account.png" /></div>
        <div id="userLink">   
          <p><a href="user_form.php"><?php echo htmlspecialchars($bienvenue);?></a></p>
          <p id="deco"><a href="deconnexion.php">Se déconnecter</a></p>
        </div>
     </div>
       </header>
       
  <main>
   <section id="form">
    <form name="fo" action="commentaires.php" method="post">
     <h2><u>Mon commentaire :</u></h2>
     <input type="hidden" name="actor_id" value="<?php echo htmlspecialchars($acteur)?>"/>
     <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>"/>
     <input type="hidden" name="prenom" value="<?php echo htmlspecialchars($_SESSION["prenom"])?>"/>
     <p><textarea name="comment" rows="8" cols="150" placeholder="Votre commentaire"></textarea></p>
     <input type="submit" name="valider" value="Envoyer">
     <div class="erreur">
     <?php echo $message ?></div>
    </form>
   </section>

  <section id="sectionComment">
   <h2>Commentaires</h2>
   <?php foreach ($comments as $comment) : ?>
   <div class="commentaires">
       <div class="head_comment">
           <div>
               <p class="firstname"><b><?= $comment['prenom']?></b></p>
               <p class="date_add">Posté le <?= $comment['created_at'] ?></p>
             </div>
       </div>
       <p class="comment"><?= $comment['comment']; ?></p>
   </div>
   <?php endforeach; ?>
   </section>
  </main>

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




