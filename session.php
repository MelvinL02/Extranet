<?php
session_start();
include "variables.php";
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
        <header id="header">
      <a href="session.php"><img id="logo" src="images/gbaf.png" alt="Logo du GBAF" title="Le Groupement Banque-Assurance Français" /></a> 
      <div id="user">
         <div class="userImg"><img id="account" alt="Icone de l'utilisateur" src="images/icone_account.png" /></div>
         <div id="userLink">   
           <p><a href="user_form.php"><?php echo htmlspecialchars($_SESSION["prenomNom"])?></a></p>
           <p id="deco"><a href="deconnexion.php">Se déconnecter</a></p>
         </div>
      </div>
        </header>
   <!-- Contenu majoritaire du body -->
   <main>
        <section id="presentation">
        <h1>Présentation du Groupement Banque Assurance Français</h1>
        <p>Le Groupement Banque Assurance Français (GBAF) est une fédération représentant les 6 grands groupes français :</p>
        <div class="presentationListActeurs">
            <ul>
                <li><span  class="li_content">BNP Paribas ;</span></li>
                <li><span  class="li_content">BPCE ;</span></li>
                <li><span  class="li_content">Crédit Agricole ;</span></li>
                <li><span  class="li_content">Crédit Mutuel-CIC ;</span></li>
                <li><span  class="li_content">Société Générale ;</span></li>
                <li><span  class="li_content">La Banque Postale.</span></li>
            </ul>
        </div>
        <p>Même s’il existe une forte concurrence entre ces entités, elles vont toutes travailler de la même façon pour gérer près de 80 millions de comptes sur le territoire national. Le GBAF est le représentant de la profession bancaire et des assureurs sur tous les axes de la réglementation financière française. Sa mission est de promouvoir l'activité bancaire à l’échelle nationale. C’est aussi un interlocuteur privilégié des pouvoirs publics.</p>
        <br><figure id="illustration">
            <img src="images/illustrationfrance.jpg" alt="illustration"/>
        </figure>
   </section>   
 
   <section id=partenaires>
   <h1>Présentation des acteurs et partenaires :</h1>
   </section>
 
   <section id=acteurs>
   <div id="conteneur_acteur">
      <div class="acteur">
         <div class="presentation_acteur">
            <figure>
               <img class="logo_acteur" src="images/formation_co.png" alt="logo de l'acteur">
            </figure>
         <div class="description">
         <h3>Formation&co</h3>
         <p><p>Formation&co est une association française présente sur tout le ...</p>
            </div>
         </div>

         <div class="votesButton">
          <a class="button" href="page_acteur_formetco.php?id=1">Lire la suite</a>
            </div>
          </div>

         <div class="acteur">
         <div class="presentation_acteur">
            <figure>
               <img class="logo_acteur" src="images/protectpeople.png" alt="logo de l'acteur">
            </figure>
         <div class="description">
         <h3>Protectpeople</h3>
         <p><p>Protectpeople finance la solidarité nationale.</p>
            </div>
         </div>

         <div class="votesButton">
          <a class="button" href="page_acteur_protectpeople.php?id=2">Lire la suite</a>
            </div>
          </div>

          <div class="acteur">
         <div class="presentation_acteur">
            <figure>
               <img class="logo_acteur" src="images/Dsa_france.png" alt="logo de l'acteur">
            </figure>
         <div class="description">
         <h3>DSA France</h3>
         <p><p>Dsa France accélère la croissance du territoire et s’engage av...</p>
            </div>
         </div>

         <div class="votesButton">
          <a class="button" href="page_acteur_dsafrance.php?id=3">Lire la suite</a>
            </div>
          </div>

          <div class="acteur">
         <div class="presentation_acteur">
            <figure>
               <img class="logo_acteur" src="images/CDE.png" alt="logo de l'acteur">
            </figure>
         <div class="description">
         <h3>CDE</h3>
         <p><p>La CDE (Chambre Des Entrepreneurs) accompagne les entreprises dans...</p>
            </div>
         </div>

         <div class="votesButton">
          <a class="button" href="page_acteur_cde.php?id=4">Lire la suite</a>
            </div>
          </div>
      </div>       
   </section>
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
