<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

/* ------------------- Supression des données du client de la BDD ------------------- */
function deleteuser($id)
{
  require("../../model/connection_db.php");
  $deletepiece = $db->prepare('DELETE FROM piece WHERE Logement_Utilisateur_idUtilisateur = ?');
  $deletepiece->execute(array($id));
  $deletelogement = $db->prepare('DELETE FROM logement WHERE id_Utilisateur = ?');
  $deletelogement->execute(array($id));
  $deleteutilisateur = $db->prepare('DELETE FROM utilisateur WHERE id_Utilisateur = ?');
  $deleteutilisateur->execute(array($id));
}

/* ------------------- Récupère les information des clients dans la BDD ------------------- */
function getusers()
{
  require("../../model/connection_db.php");
  $membres = $db->query('SELECT * FROM utilisateur');
  return $membres;
}

?>
