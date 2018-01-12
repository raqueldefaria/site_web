<?php
session_start();

$idLogement = $_SESSION['idLogement'];

/* ------------------- BDD ------------------- */
require("connection_db.php");

$piece = htmlspecialchars($_POST['piece']);
$idUser = htmlspecialchars($_POST['idUser']);


$insertPiece = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur) VALUES (:piece,:idLogement,:idUser)") or die(print_r($db->errorInfo()));
$insertPiece->bindParam(':piece', $piece);
$insertPiece->bindParam(':idLogement', $idLogement);
$insertPiece->bindParam(':idUser', $idUser);
$insertPiece->execute();


$insertPiece->closeCursor();

header("Location:../view/interface/clientPieces.php?id=$idLogement");