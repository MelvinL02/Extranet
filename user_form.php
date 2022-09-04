<?php
   session_start();
   include("variables.php");
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
    
    <div id="containeur">
    <h1><br><?php echo $bienvenue?></h1>

    <section id="form">
        <form action="user_update.php"  method="post" novalidate>
        <h2><u>Changer mon nom d'utilisateur</u></h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>"/>
        <br><p><label for="username">Nom d'utilisateur : </label><br />
        <br> <input type="text" name="username" id="username" value="<?php echo $username?>" /></p></b>
            <p class="confirm"></p>
        <br><input type="submit" name="send" value="Valider">
        </form>
    </section>

    <section id="form">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon mot de passe</u></h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
        <br><p><label for="password">Mon nouveau mot de passe : </label><br />
        <br><input type="password" name="password" id="password" required /></p></b>
            <br><p><label for="repassword">Confirmation du nouveau mot de passe : </label><br />
            <br><input type="password" name="repassword" id="repassword" required /></p></b>
            <p class="confirm"></p>
        <br><input type="submit" name="send_1" value="Valider">
        </form>
    </section>

    <section id="form">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon nom</u></h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
        <br><p><label for="nom">Nom : </label><br />
        <br><input type="text" name="nom" id="nom" value="<?php echo $nom?>"  /></p></b>
            <p class="confirm"></p>
        <br><input type="submit" name="send_2" value="Valider">
        </form>
    </section>

    <section id="form">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon prénom</u></h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
        <br><p><label for="prenom">Prénom : </label><br />
        <br><input type="text" name="prenom" id="prenom" value="<?php echo $prenom?>"  /></p></b>
            <p class="confirm"></p>
        <br><input type="submit" name="send_3" value="Valider">
        </form>
    </section>

    <section id="form">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer ma question secrète et ma réponse</u></h2>
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($_SESSION["id"])?>" />
        <br><p><label for="question">Ma nouvelle question secrète : </label><br />
        <br><input type="text" name="question" id="question" value="" required /></p></b>
            <p class="error"></p>
        <br><p><label for="reponse">Ma nouvelle réponse secrète : </label><br />
        <br><input type="text" name="reponse" id="reponse" value="" required /></p></b>
            <p class="error"></p>
            <p class="confirm"></p>
        <br><input type="submit" name="send_4" value="Valider">
        </form>
    </section>
  </div>

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
