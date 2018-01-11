
<?php
  require('../../controller/editionProfilController.php');
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/editionProfil.css" />
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
          <h2>Éditer votre profil</h2>

          <table>
          <tr>
             <td align="right">
                <strong> Pseudo </strong> :
             </td>
             <td>
               <input type="text" placeholder="Pseudo" id="pseudo" name="pseudo" value="<?php echo $userinfo['utilisateur_login']; ?>" />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Mail </strong> :
             </td>
             <td>
               <input type="mail" placeholder="Mail" id="mail" name="mail" value="<?php echo $userinfo['utilisateur_mail']; ?>" />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Prénom </strong> :
             </td>
             <td>
               <input type="text" placeholder="Prénom" id="prenom" name="prenom" value="<?php echo $userinfo['utilisateur_prenom']; ?>" />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nom </strong> :
             </td>
             <td>
               <input type="text" placeholder="Nom" id="nom" name="nom" value="<?php echo $userinfo['utilisateur_nom']; ?>" />
             </td>
          </tr>

          <tr>
             <td align="right">
                <strong> Mot de passe actuel </strong> :
             </td>
             <td>
               <input type="text" placeholder="Mot de passe actuel" id="mdpactuel" name="mdpactuel" />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nouveau mot de passe </strong> :
             </td>
             <td>
               <input type="text" placeholder="Nouveau mot de passe" id="newmdp1" name="newmdp1" />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Confirmer nouveau mot de passe </strong> :
             </td>
             <td>
               <input type="text" placeholder="Nouveau mot de passe" id="newmdp2" name="newmdp2" />
             </td>
          </tr>

       </table>

       </div>

       <div align="center">
         <h2>Éditer votre logement</h2>

         <table>
           <tr>
              <td align="right">
                 <strong> Adresse </strong> :
              </td>
              <td>
                <input type="text" placeholder="Adresse" id="adresse" name="adresse" value="<?php echo $userinfo['logement_adresse']; ?>" />
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Ville </strong> :
              </td>
              <td>
                <input type="text" placeholder="Ville" id="ville" name="ville" value="<?php echo $userinfo['logement_ville']; ?>" />
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Code postal </strong> :
              </td>
              <td>
                <input type="text" placeholder="Code postal" id="codePostal" name="codePostal" value="<?php echo $userinfo['logement_codePostal']; ?>" />
              </td>
           </tr>
           <tr>
              <td align="right">
                 <strong> Pays </strong> :
              </td>
              <td>
                <input type="text" placeholder="Pays" id="pays" name="pays" value="<?php echo $userinfo['logement_pays']; ?>" />
              </td>
           </tr>
         </table>

         <br />
         <input type="submit" value="Mettre à jour mon profil !" class="boutton"/>

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
