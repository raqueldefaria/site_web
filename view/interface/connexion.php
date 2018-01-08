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
      <?php include("header.php"); ?>

    <!--*************** Le corps ***************-->
    <div class="corps">

      <form method="post" action="../../controller/connexion.php">
        <p>
          <input type="text" name="pseudo" id="identifiant" placeholder="Identifiant" size="30" maxlength="20" value="<?php if (isset($_COOKIE['username'])){echo $_COOKIE['username'];}?>"/> <br />
          <br />
          <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="20" /><br />
          <div id="box">
            <label for="boxSouvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" name="souvenir" id="boxSouvenir" /> <br />
            <input type="submit" value="Se connecter" class="boutton" />
          </div>
          <a href="#" id="mdpOublie"> Mot de passe oublié </a>
        </p>
      </form>

    </div>



    <!--*************** Footer ***************-->
    <?php include("footer.php"); ?>



    </body>

</html>
