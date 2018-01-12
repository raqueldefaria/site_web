
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


?>
