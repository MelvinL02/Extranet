<?php
   session_start();
   include("variables.php");
?>

<!DOCTYPE html>
<html lang="fr">
    <head>
      <meta charset="utf-8">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <link rel="stylesheet" href="styles.css">
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
    <div id="containeur">
    <br><h1 id=prenomNom><?php echo htmlspecialchars($_SESSION["prenomNom"])?></h1>

    <section id="form1">
        <form action="user_update.php"  method="post" novalidate>
        <h2><u>Changer mon nom d'utilisateur</u></h2>
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
        <br><p><label for="username"><b>Nom d'utilisateur :</b></label></p>
        <br><input type="text" name="username" id="username" value="<?php echo htmlspecialchars($_SESSION["username"])?>">
        <p class="confirm"></p>
        <br><input type="submit" name="send" value="Valider">
        </form>
    </section>

    <section id="form2">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon mot de passe</u></h2>
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
        <br><p><label for="password"><b>Mon nouveau mot de passe :</b></label></p>
        <br><input type="password" name="password" id="password" required>
        <br><p><label for="repassword"><b>Confirmation du nouveau mot de passe :</b></label></p>
        <br><input type="password" name="repassword" id="repassword" required>
        <p class="confirm"></p>
        <br><input type="submit" name="send_1" value="Valider">
        </form>
    </section>

    <section id="form3">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon nom</u></h2>
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
        <br><p><label for="nom"><b>Nom :</b></label></p>
        <br><input type="text" name="nom" id="nom" value="<?php echo htmlspecialchars($_SESSION["nom"])?>">
        <p class="confirm"></p>
        <br><input type="submit" name="send_2" value="Valider">
        </form>
    </section>

    <section id="form4">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer mon prénom</u></h2>
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
        <br><p><label for="prenom"><b>Prénom :</b></label></p>
        <br><input type="text" name="prenom" id="prenom" value="<?php echo htmlspecialchars($_SESSION["prenom"])?>">
        <p class="confirm"></p>
        <br><input type="submit" name="send_3" value="Valider">
        </form>
    </section>

    <section id="form5">
        <form action="user_update.php" method="post" novalidate>
        <h2><u>Changer ma question secrète et ma réponse</u></h2>
        <input type="hidden" name="id_user" value="<?php echo htmlspecialchars($_SESSION["id_user"])?>">
        <br><p><label for="question"><b>Ma nouvelle question secrète :</b></label></p>
        <br><input type="text" name="question" id="question" value="" required>
        <p class="error"></p>
        <br><p><label for="reponse"><b>Ma nouvelle réponse secrète :</b></label></p>
        <br><input type="text" name="reponse" id="reponse" value="" required>
        <p class="error"></p>
        <p class="confirm"></p>
        <br><input type="submit" name="send_4" value="Valider">
        </form>
    </section>
    </div>
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
