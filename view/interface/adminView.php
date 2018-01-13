
<?php
  require('../../controller/adminController.php');
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/admin.css" />
        <link rel="stylesheet" href="../css/headerbis.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title> DomOnline - Administration </title>
    </head>


    <body>

    <?php include("headerbis.php"); ?>

    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">

         <div align="center">
          <h2>Administration</h2>



       <?php if(isset($msg)) { echo $msg; } ?>

       </div>

            <br />
            <a href="profil.php"> Retourner à mon profil </a>
            <br />
            <a href="deconnexion.php"> Se déconnecter </a>


        </div>


    </div>

    <?php include("footer.php"); ?>

    </body>


</html>
