
<?php
session_start();

/* ------------------- BDD ------------------- */
require("../../model/editionProfilModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $userinfo['utilisateur_login'])
{
  $newpseudo = htmlspecialchars($_POST['newpseudo']);
  updatepseudo($newpseudo, $userinfo['id_Utilisateur']);
  header('Location: profil?msg=1.php');
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['utilisateur_mail'])
{
  $newmail = htmlspecialchars($_POST['newmail']);
  updatemail($newmail, $userinfo['id_Utilisateur']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userinfo['utilisateur_prenom'])
{
  $newprenom = htmlspecialchars($_POST['newprenom']);
  updateprenom($newprenom, $userinfo['id_Utilisateur']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userinfo['utilisateur_nom'])
{
  $newnom = htmlspecialchars($_POST['newnom']);
  updatenom($newnom, $userinfo['id_Utilisateur']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $userinfo['logement_adresse'])
{
  $newadresse = htmlspecialchars($_POST['newadresse']);
  updateadresse($newadresse, $_POST['idlogement']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $userinfo['logement_ville'])
{
  $newville = htmlspecialchars($_POST['newville']);
  updateville($newville, $_POST['idlogement']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newcodePostal']) AND !empty($_POST['newcodePostal']) AND $_POST['newcodePostal'] != $userinfo['logement_codePostal'])
{
  $newcodePostal = htmlspecialchars($_POST['newcodePostal']);
  updatecodePostal($newcodePostal, $_POST['idlogement']);
  header('Location:  profil?msg=1.php');
}

if(isset($_POST['newpays']) AND !empty($_POST['newpays']) AND $_POST['newpays'] != $userinfo['logement_pays'])
{
  $newpays = htmlspecialchars($_POST['newpays']);
  updatepays($newpays, $_POST['idlogement']);
  header('Location:  profil?msg=1.php');
}


if(isset($_POST['mdpactuel']) AND !empty($_POST['mdpactuel']) AND isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdpactuel = sha1($_POST['mdpactuel']);
      $newmdp1 = sha1($_POST['newmdp1']);
      $newmdp2 = sha1($_POST['newmdp2']);

      if($mdpactuel == $userinfo['utilisateur_motDePasse'] )
      {
        if($newmdp1 == $newmdp2) {
           updatemdp($newmdp1, $userinfo['id_Utilisateur']);
           header('Location:  profil?msg=1.php');
        }
        else {
           $msg = "Vos deux nouveaux mots de passe ne correspondent pas !";
        }
      }
      else {
         $msg = "Mot de passe actuel incorrect !";
      }

}

?>
