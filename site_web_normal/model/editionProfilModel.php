<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

/* ------------------- Requête sur la table logement ------------------- */
function table_logements()
{
  require("../../model/connection_db.php");
  $data = $db->prepare('SELECT * from logement WHERE logement.id_Utilisateur = ? ');
  $data->execute(array($_SESSION['userID']));
  return $data;
}

function updatepseudo($newpseudo, $iduser)
{
  require("../../model/connection_db.php");
  $insertpseudo = $db->prepare('UPDATE utilisateur SET utilisateur_login = ? WHERE id_Utilisateur = ?');
  $insertpseudo->execute(array($newpseudo, $iduser));
  $_SESSION['pseudo'] = $newpseudo;
}

function updatemail($newmail, $iduser)
{
  require("../../model/connection_db.php");
  $insertmail = $db->prepare('UPDATE utilisateur SET utilisateur_mail = ? WHERE id_Utilisateur = ?');
  $insertmail->execute(array($newmail, $iduser));
}

function updateprenom($newprenom, $iduser)
{
  require("../../model/connection_db.php");
  $insertprenom = $db->prepare('UPDATE utilisateur SET utilisateur_prenom = ? WHERE id_Utilisateur = ?');
  $insertprenom->execute(array($newprenom, $iduser));
  $_SESSION['prenom'] = $newprenom;
}

function updatenom($newnom, $iduser)
{
  require("../../model/connection_db.php");
  $insertnom = $db->prepare('UPDATE utilisateur SET utilisateur_nom = ? WHERE id_Utilisateur = ?');
  $insertnom->execute(array($newnom, $iduser));
  $_SESSION['nom'] = $newnom;
}

function updateadresse($newadresse, $iduser)
{
  require("../../model/connection_db.php");
  $insertadresse = $db->prepare('UPDATE logement SET logement_adresse = ? WHERE id_Logement = ?');
  $insertadresse->execute(array($newadresse, $iduser));
}

function updateville($newville, $iduser)
{
  require("../../model/connection_db.php");
  $insertville = $db->prepare('UPDATE logement SET logement_ville = ? WHERE id_Logement = ?');
  $insertville->execute(array($newville, $iduser));
}

function updatecodePostal($newcodePostal, $iduser)
{
  require("../../model/connection_db.php");
  $insertcodePostal = $db->prepare('UPDATE logement SET logement_codePostal = ? WHERE id_Logement = ?');
  $insertcodePostal->execute(array($newcodePostal, $iduser));
}

function updatepays($newpays, $iduser)
{
  require("../../model/connection_db.php");
  $insertpays = $db->prepare('UPDATE logement SET logement_pays = ? WHERE id_Logement = ?');
  $insertpays->execute(array($newpays, $iduser));
}

function updatemdp($newmdp, $iduser)
{
  require("../../model/connection_db.php");
  $insertmdp = $db->prepare("UPDATE utilisateur SET utilisateur_motDePasse = ? WHERE id_Utilisateur = ?");
  $insertmdp->execute(array($newmdp, $iduser));
}

?>
