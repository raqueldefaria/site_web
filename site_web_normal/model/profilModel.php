<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

   $requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
   $requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
   $userinfo = $requser->fetch();

/* ------------------- Requête de la table logement ------------------- */
function table_logements()
{
  require("../../model/connection_db.php");
  $data = $db->prepare('SELECT * from logement WHERE logement.id_Utilisateur = ? ');
  $data->execute(array($_SESSION['userID']));
  return $data;
}

?>
