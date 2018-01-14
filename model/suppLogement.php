<?php
session_start();




/* ------------------- BDD ------------------- */
require("connection_db.php");


$db->exec("DELETE FROM logement WHERE id_Logement = ". htmlspecialchars($_GET['id'])." AND id_Utilisateur = ".$_SESSION['userID']) or die(print_r($db->errorInfo()));

header("Location:../view/interface/logements.php");
//* Supprime l'id du logement souhaité (on sait lequel supp grace au GET)*//
?>
