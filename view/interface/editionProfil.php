<?php
session_start();

$bdd = new PDO('mysql:host=127.0.0.1;dbname=site_web', 'root', '');


   $requser = $bdd->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
   $requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
   $userinfo = $requser->fetch();

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/editionProfil.css" />
        <link rel="stylesheet" href="../css/header.css" />
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
