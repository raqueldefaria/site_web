<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/connexion.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />

        <title>Mon super site</title>

    </head>



    <body>


    <?php include("header.php"); ?>



    <!-- Le corps -->



    <div id="corps">

      <form method="post" action="traitement.php">
        <p>
          <input type="text" name="pseudo" id="identifiant" placeholder="Identifiant" size="30" maxlength="20" /> <br />

          <br />
          <input type="text" name="pseudo" id="mdp" placeholder="Mot De Passe" size="30" maxlength="20" /><br />

          <div id="box">
            <label for="souvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" name="souvenir" id="boxSouvenir" /> <br />
            <a href="https://www.facebook.com" id="boutonSeConnecter2"> Se connecter </a>
          </div>
          <a href="https://www.facebook.com" id="mdpOublie"> Mot de Passe oublie </a>
        </p>
      </form>

    </div>



    <!-- Le pied de page -->



    <?php include("footer.php"); ?>



    </body>

</html>
