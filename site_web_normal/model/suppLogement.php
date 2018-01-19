<?php
session_start();




/* ------------------- BDD ------------------- */
require("connection_db.php");


$db->exec("DELETE FROM piece WHERE Logement_idLogement = ". htmlspecialchars($_GET['id'])." AND Logement_Utilisateur_idUtilisateur = ".$_SESSION['userID']) or die(print_r($db->errorInfo()));
$db->exec("DELETE FROM logement WHERE id_Logement = ". htmlspecialchars($_GET['id'])." AND id_Utilisateur = ".$_SESSION['userID']) or die(print_r($db->errorInfo()));

header("Location:../view/interface/logements.php");
//* Supprime l'id du logement souhaité (on sait lequel supp grace au GET)*//
//*Mais avant cela, supprime toutes les pièces associées au logement en question. Dans un futur proche on pourra espérer voir*//
//* cette même suppression appliquée aux capteurs*//
?>
