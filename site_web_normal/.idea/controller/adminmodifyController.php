<?php
session_start();

/* ------------------- BDD ------------------- */
require("../../model/adminmodifyModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if(isset($_POST['newpseudo']) AND !empty($_POST['newpseudo']) AND $_POST['newpseudo'] != $user['utilisateur_login'])
{
  $newpseudo = htmlspecialchars($_POST['newpseudo']);
  $insertpseudo = $db->prepare('UPDATE utilisateur SET utilisateur_login = ? WHERE id_Utilisateur = ?');
  $insertpseudo->execute(array($newpseudo, $_GET['modify']));
  header('Location: adminView.php');
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $user['utilisateur_mail'])
{
  $newmail = htmlspecialchars($_POST['newmail']);
  $insertmail = $db->prepare('UPDATE utilisateur SET utilisateur_mail = ? WHERE id_Utilisateur = ?');
  $insertmail->execute(array($newmail, $_GET['modify']));
  header('Location:  adminView.php');
}

if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $user['utilisateur_prenom'])
{
  $newprenom = htmlspecialchars($_POST['newprenom']);
  $insertprenom = $db->prepare('UPDATE utilisateur SET utilisateur_prenom = ? WHERE id_Utilisateur = ?');
  $insertprenom->execute(array($newprenom, $_GET['modify']));
  header('Location:  adminView.php');
}

if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $user['utilisateur_nom'])
{
  $newnom = htmlspecialchars($_POST['newnom']);
  $insertnom = $db->prepare('UPDATE utilisateur SET utilisateur_nom = ? WHERE id_Utilisateur = ?');
  $insertnom->execute(array($newnom, $_GET['modify']));
  header('Location:  adminView.php');
}

if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $user['logement_adresse'])
{
  $newadresse = htmlspecialchars($_POST['newadresse']);
  $insertadresse = $db->prepare('UPDATE logement SET logement_adresse = ? WHERE id_Logement = ?');
  $insertadresse->execute(array($newadresse, $_POST['idlogement']));
  header('Location:  adminView.php');
}

if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $user['logement_ville'])
{
  $newville = htmlspecialchars($_POST['newville']);
  $insertville = $db->prepare('UPDATE logement SET logement_ville = ? WHERE id_Logement = ?');
  $insertville->execute(array($newville, $_POST['idlogement']));
  header('Location: adminView.php');
}

if(isset($_POST['newcodePostal']) AND !empty($_POST['newcodePostal']) AND $_POST['newcodePostal'] != $user['logement_codePostal'])
{
  $newcodePostal = htmlspecialchars($_POST['newcodePostal']);
  $insertcodePostal = $db->prepare('UPDATE logement SET logement_codePostal = ? WHERE id_Logement = ?');
  $insertcodePostal->execute(array($newcodePostal, $_POST['idlogement']));
  header('Location:  adminView.php');
}

if(isset($_POST['newpays']) AND !empty($_POST['newpays']) AND $_POST['newpays'] != $user['logement_pays'])
{
  $newpays = htmlspecialchars($_POST['newpays']);
  $insertpays = $db->prepare('UPDATE logement SET logement_pays = ? WHERE id_Logement = ?');
  $insertpays->execute(array($newpays, $_POST['idlogement']));
  header('Location:  adminView.php');
}


if(isset($_POST['mdpactuel']) AND !empty($_POST['mdpactuel']) AND isset($_POST['newmdp1']) AND !empty($_POST['newmdp1']) AND isset($_POST['newmdp2']) AND !empty($_POST['newmdp2'])) {
      $mdpactuel = sha1($_POST['mdpactuel']);
      $newmdp1 = sha1($_POST['newmdp1']);
      $newmdp2 = sha1($_POST['newmdp2']);

      if($mdpactuel == $user['utilisateur_motDePasse'] )
      {
        if($newmdp1 == $newmdp2) {
           $insertmdp = $db->prepare("UPDATE utilisateur SET utilisateur_motDePasse = ? WHERE id_Utilisateur = ?");
           $insertmdp->execute(array($newmdp1, $user['id_Utilisateur']));
           header('Location:  adminView.php');
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
