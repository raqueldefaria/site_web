<?php

session_start();

/* ------------------- BDD ------------------- */
require("../../model/adminModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if($userinfo['utilisateur_type'] != 'admin')
{
  header("Location: accueil.php");
}

if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
  $id = $_GET['delete'];
  //$deleteuser = $db->prepare('DELETE * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
  //$deleteuser->execute(array($_GET['delete'], $_GET['delete']));
  $deletelogement = $db->prepare('DELETE FROM logement WHERE id_Utilisateur = ?');
  $deletelogement->execute(array($id));
  $deleteutilisateur = $db->prepare('DELETE FROM utilisateur WHERE id_Utilisateur = ?');
  $deleteutilisateur->execute(array($id));
  $deletepiece = $db->prepare('DELETE FROM piece WHERE Logement_Utilisateur_idUtilisateur = ?');
  $deletepiece->execute(array($id));
  header("Location: adminView.php");
  //$erreur = $_GET['delete'];
}

?>
