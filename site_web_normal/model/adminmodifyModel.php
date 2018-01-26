<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

$showuser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$showuser->execute(array($_GET['modify'], $_GET['modify']));
$user = $showuser->fetch();

/* ------------------- Requête de la table logement ------------------- */
function table_logements($id)
{
  require("../../model/connection_db.php");
  $data = $db->prepare('SELECT * from logement WHERE logement.id_Utilisateur = ? ');
  $data->execute(array($id));
  return $data;
}

function updatepseudo($id, $pseudo)
{
  require("../../model/connection_db.php");
  $insertpseudo = $db->prepare('UPDATE utilisateur SET utilisateur_login = ? WHERE id_Utilisateur = ?');
  $insertpseudo->execute(array($pseudo, $id));
}

function updatemail($id, $mail)
{
  require("../../model/connection_db.php");
  $insertmail = $db->prepare('UPDATE utilisateur SET utilisateur_mail = ? WHERE id_Utilisateur = ?');
  $insertmail->execute(array($mail, $id));
}

function updateprenom($id, $prenom)
{
  require("../../model/connection_db.php");
  $insertprenom = $db->prepare('UPDATE utilisateur SET utilisateur_prenom = ? WHERE id_Utilisateur = ?');
  $insertprenom->execute(array($prenom, $id));
}

function updatenom($id, $nom)
{
  require("../../model/connection_db.php");
  $insertnom = $db->prepare('UPDATE utilisateur SET utilisateur_nom = ? WHERE id_Utilisateur = ?');
  $insertnom->execute(array($nom, $id));
}

function updateadresse($idlogement, $adresse)
{
  require("../../model/connection_db.php");
  $insertadresse = $db->prepare('UPDATE logement SET logement_adresse = ? WHERE id_Logement = ?');
  $insertadresse->execute(array($adresse, $idlogement));
}

function updateville($idlogement, $ville)
{
  require("../../model/connection_db.php");
  $insertville = $db->prepare('UPDATE logement SET logement_ville = ? WHERE id_Logement = ?');
  $insertville->execute(array($ville, $idlogement));
}

function updatecodePostal($idlogement, $codePostal)
{
  require("../../model/connection_db.php");
  $insertcodePostal = $db->prepare('UPDATE logement SET logement_codePostal = ? WHERE id_Logement = ?');
  $insertcodePostal->execute(array($codePostal, $idlogement));
}

function updatepays($idlogement, $pays)
{
  require("../../model/connection_db.php");
  $insertpays = $db->prepare('UPDATE logement SET logement_pays = ? WHERE id_Logement = ?');
  $insertpays->execute(array($pays, $idlogement));
}

?>
