<?php
session_start();

require("../../controller/profilController.php");

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/profil.css" />
        <link rel="stylesheet" href="../css/headerbis.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title> DomOnline - Profil </title>
    </head>


    <body>

    <?php include("headerbis.php"); ?>

    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">

         <div align="center">
          <h2>Votre profil</h2>

          <table>
          <tr>
             <td align="right">
                <strong> Pseudo </strong> :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_login']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Mail </strong> :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_mail']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Prénom </strong> :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_prenom']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nom </strong> :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_nom']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Type </strong> :
             </td>
             <td>
                <?php echo $userinfo['utilisateur_type']; ?>
             </td>
          </tr>
           <tr>
              <td align="right">
                 <strong> Adresse </strong> :
              </td>
              <td>
                 <?php echo $userinfo['logement_adresse']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Ville </strong> :
              </td>
              <td>
                 <?php echo $userinfo['logement_ville']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Code postal </strong> :
              </td>
              <td>
                 <?php echo $userinfo['logement_codePostal']; ?>
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Pays </strong> :
              </td>
              <td>
                 <?php echo $userinfo['logement_pays']; ?>
              </td>
           </tr>
         </table>
       </div>

       <br/>

       <?php if(isset($msg)) { echo '<p>' . $msg . '</p>'; } ?>

       <br/>
       <a href="editionProfilView.php"> Editer mon profil </a>
       <br/>
       <a href="deconnexion.php"> Se déconnecter </a>


      </div>


    </div>

    <?php include("footer.php"); ?>

    </body>


</html>
