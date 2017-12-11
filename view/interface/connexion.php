<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/connexion.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />

        <title>DomOnline | Connexion</title>

    </head>



    <body>

      <!--*************** Header ***************-->
      <?php include("header.php"); ?>

    <!--*************** Le corps ***************-->
    <div class="corps">

      <form method="post" action="../../controller/traitement_connexion.php">
        <p>
          <input type="text" name="identifiant" id="identifiant" placeholder="  Identifiant" size="30" maxlength="20" /> <br />
          <br />
          <input type="text" name="pseudo" id="mdp" placeholder="  Mot de passe" size="30" maxlength="20" /><br />
          <div id="box">
            <label for="souvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" name="souvenir" id="boxSouvenir" /> <br />
            <a href="https://www.facebook.com" class="boutton"> Se connecter </a>
          </div>
          <a href="https://www.facebook.com" id="mdpOublie"> Mot de passe oublie </a>
        </p>
      </form>

    </div>



    <!--*************** Footer ***************-->
    <?php include("footer.php"); ?>



    </body>

</html>
