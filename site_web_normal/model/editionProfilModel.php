<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

?>
