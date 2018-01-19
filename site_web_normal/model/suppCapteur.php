<?php
session_start();

$idLogement = $_SESSION['idLogement']; //changer ca



/* ------------------- BDD ------------------- */
require("connection_db.php");


$db->exec("DELETE FROM capteur/actionneur WHERE id_Capteur/actionneur = ". htmlspecialchars($_GET['id'])." AND Utilisateur_idUtilisateur = ".$_SESSION['userID']) or die(print_r($db->errorInfo()));

header("Location:../view/interface/clientPieces.php?id=$idLogement");
//* Supprime l'id de la pièce que l'on veut supprimer (on connait l'id grace à un $_GET)*//
?>
