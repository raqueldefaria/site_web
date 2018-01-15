
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

                <table>
                    <tr>
                        <th> ID </th>
                        <th> Type</th>
                        <th> Pseudo </th>
                        <th> Prénom </th>
                        <th> Nom </th>
                        <th> </th>
                        <th> </th>
                    </tr>

                      <?php
                      while($userinfo = $requser->fetch())
                      {
                      ?>
                      <tr>
                          <th> <?php echo $userinfo['id_Utilisateur']; ?> </th>
                          <th> <?php echo $userinfo['utilisateur_type']; ?> </th>
                          <th> <?php echo $userinfo['utilisateur_login']; ?> </th>
                          <th> <?php echo $userinfo['utilisateur_prenom']; ?> </th>
                          <th> <?php echo $userinfo['utilisateur_nom']; ?> </th>
                          <th> </th>
                          <th> </th>
                      </tr>
                      <?php
                      }
                      ?>

                </table>
            </div>
        </div>
    </div>

    <?php include("footer.php"); ?>

    </body>


</html>
