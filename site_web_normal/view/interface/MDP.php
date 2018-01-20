<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/MDP.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title>DomOnline - Mot de passe oublié </title>
    </head>

    <body>

      <!--*************** Header ***************-->
      <?php
      require("../../controller/headerInclude.php");
      require("../../controller/headerIncludeCSS.php");
      ?>

    <div id="corps">
      <div id="paragraphe">
        <h1>Mot de passe oublié ?</h1>
        <p> Pas de panique ! Nous vous enverrons un nouveau mot de passe sur votre adresse mail associé au compte. </p>


        <form method="post" action="../../controller/MDP_POST.php">

        <p>
           <label for="mail_recup"> Votre mail :</label>
           <input type="email" name="mail_recup" id="mail_recup" />
           <input type="submit" value="Envoyer" />
        </p>

        </form>
      </div>
    </div>

    <!--*************** Footer ***************-->
    <?php include("footer.php"); ?>

    </body>
</html>
