<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

$showuser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$showuser->execute(array($_GET['modify'], $_GET['modify']));
$user = $showuser->fetch();

?>
