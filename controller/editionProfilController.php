
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
  $insertpseudo = $db->prepare('UPDATE utilisateur SET utilisateur_login = ? WHERE id_Utilisateur = ?');
  $insertpseudo->execute(array($newpseudo, $userinfo['id_Utilisateur']));
  $_SESSION['pseudo'] = $newpseudo;
  header('Location: profil.php');
}

if(isset($_POST['newmail']) AND !empty($_POST['newmail']) AND $_POST['newmail'] != $userinfo['utilisateur_mail'])
{
  $newmail = htmlspecialchars($_POST['newmail']);
  $insertmail = $db->prepare('UPDATE utilisateur SET utilisateur_mail = ? WHERE id_Utilisateur = ?');
  $insertmail->execute(array($newmail, $userinfo['id_Utilisateur']));
  header('Location: profil.php');
}

if(isset($_POST['newprenom']) AND !empty($_POST['newprenom']) AND $_POST['newprenom'] != $userinfo['utilisateur_prenom'])
{
  $newprenom = htmlspecialchars($_POST['newprenom']);
  $insertprenom = $db->prepare('UPDATE utilisateur SET utilisateur_prenom = ? WHERE id_Utilisateur = ?');
  $insertprenom->execute(array($newprenom, $userinfo['id_Utilisateur']));
  $_SESSION['prenom'] = $newprenom;
  header('Location: profil.php');
}

if(isset($_POST['newnom']) AND !empty($_POST['newnom']) AND $_POST['newnom'] != $userinfo['utilisateur_nom'])
{
  $newnom = htmlspecialchars($_POST['newnom']);
  $insertnom = $db->prepare('UPDATE utilisateur SET utilisateur_nom = ? WHERE id_Utilisateur = ?');
  $insertnom->execute(array($newnom, $userinfo['id_Utilisateur']));
  $_SESSION['nom'] = $newnom;
  header('Location: profil.php');
}

if(isset($_POST['newadresse']) AND !empty($_POST['newadresse']) AND $_POST['newadresse'] != $userinfo['logement_adresse'])
{
  $newadresse = htmlspecialchars($_POST['newadresse']);
  $insertadresse = $db->prepare('UPDATE logement SET logement_adresse = ? WHERE id_Utilisateur = ?');
  $insertadresse->execute(array($newadresse, $userinfo['id_Utilisateur']));
  header('Location: profil.php');
}

if(isset($_POST['newville']) AND !empty($_POST['newville']) AND $_POST['newville'] != $userinfo['logement_ville'])
{
  $newville = htmlspecialchars($_POST['newville']);
  $insertville = $db->prepare('UPDATE logement SET logement_ville = ? WHERE id_Utilisateur = ?');
  $insertville->execute(array($newville, $userinfo['id_Utilisateur']));
  header('Location: profil.php');
}

if(isset($_POST['newcodePostal']) AND !empty($_POST['newcodePostal']) AND $_POST['newcodePostal'] != $userinfo['logement_codePostal'])
{
  $newcodePostal = htmlspecialchars($_POST['newcodePostal']);
  $insertcodePostal = $db->prepare('UPDATE logement SET logement_codePostal = ? WHERE id_Utilisateur = ?');
  $insertcodePostal->execute(array($newcodePostal, $userinfo['id_Utilisateur']));
  header('Location: profil.php');
}

if(isset($_POST['newpays']) AND !empty($_POST['newpays']) AND $_POST['newpays'] != $userinfo['logement_pays'])
{
  $newpays = htmlspecialchars($_POST['newpays']);
  $insertpays = $db->prepare('UPDATE logement SET logement_pays = ? WHERE id_Utilisateur = ?');
  $insertpays->execute(array($newpays, $userinfo['id_Utilisateur']));
  header('Location: profil.php');
}

?>
