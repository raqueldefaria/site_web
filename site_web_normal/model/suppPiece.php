<?php
session_start();

$idLogement = $_SESSION['idLogement'];




/* ------------------- BDD ------------------- */
require("connection_db.php");


$db->exec("DELETE FROM piece WHERE id_Piece = ". htmlspecialchars($_GET['id'])." AND Logement_Utilisateur_idUtilisateur = ".$_SESSION['userID']) or die(print_r($db->errorInfo()));

header("Location:../view/interface/clientPieces.php?id=$idLogement");
//* Supprime l'id de la pièce que l'on veut supprimer (on connait l'id grace à un $_GET)*//
?>
