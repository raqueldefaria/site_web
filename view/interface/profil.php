<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=site_web', 'root', '');


   $requser = $bdd->query('SELECT * FROM utilisateur,logement  WHERE utilisateur_login = $_SESSION["pseudo"]');
   $userinfo = $requser->fetch();
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/profil.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title> DomOnline - Profil </title>
    </head>


    <body>

    <?php include("header.php"); ?>

    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">

         <div align="center">
          <h2>Votre profil</h2>

          <table>
          <tr>
             <td align="right">
                Pseudo :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_login']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                Mail :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_mail']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                Prénom :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_prenom']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                Nom :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_nom']; ?>
             </td>
          </tr>

       </table>

       </div>

       <div align="center">
         <h2>Votre logement</h2>

         <table>
           <tr>
              <td align="right">
                 Adresse :
              </td>
              <td>
                 <?php echo $userinfo['logement_adresse']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 Ville :
              </td>
              <td>
                 <?php echo $userinfo['logement_ville']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 Code postal :
              </td>
              <td>
                 <?php echo $userinfo['logement_codePostal']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 Pays :
              </td>
              <td>
                 <?php echo $userinfo['logement_pays']; ?>
              </td>
           </tr>
         </table>
       </div>

            <br />
            <a href="editionprofil.php"> Editer mon profil </a>
            <br />
            <a href="deconnection.php"> Se déconnecter </a>


        </div>


    </div>

    <?php include("footer.php"); ?>

    </body>


</html>
