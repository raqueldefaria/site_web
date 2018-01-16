<?php
session_start();
include("../../controller/accessDenied.php"); // on vérifie que l'utilisateur n'est pas déjà connecté
?>



<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/connexion.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />

        <title>DomOnline - Connexion</title>

    </head>


    <body>

      <!--*************** Header ***************-->
      <?php
      require("../../controller/headerInclude.php");
      require("../../controller/headerIncludeCSS.php");
      ?>

    <!--*************** Le corps ***************-->
      <div class="corps">

        <form method="post" action="../../controller/connexion.php">
          <p>
            <input type="text" name="pseudo" id="identifiant" placeholder="Identifiant" size="30" maxlength="20" value="<?php if (isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>" required /> <br />
            <span id="missIdentifiant"></span>
            <br />
            <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="20" required/><br />
            <div id="box">
              <label for="boxSouvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" checked name="souvenir" id="boxSouvenir" /> <br />
              <input type="submit" value="Se connecter" class="boutton" id="bouton_envoi" />
            </div>
            <a href="#" id="mdpOublie"> Mot de passe oublié </a>
          </p>
        </form>

      </div>

      <script>
        var formValid = document.getElementById('bouton_envoi');
        var prenom = document.getElementById('identifiant');
        var missPrenom = document.getElementById('missIdentifiant');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;




        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide

            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missIdentifiant.textContent = 'login manquant';
                missIdentifiant.style.color = 'red';
                erreur = true
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missIdentifiant.style.color = 'red';

            }else{
            }

        }




    <!--*************** Footer ***************-->
    <?php include("footer.php"); ?>



    </body>

</html>
