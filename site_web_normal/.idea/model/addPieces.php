<?php
session_start();

$idLogement = $_SESSION['idLogement'];

/* ------------------- BDD ------------------- */
require("connection_db.php");

$type = htmlspecialchars($_POST['piece']);
$idUser = $_SESSION['userID'];
$piece = htmlspecialchars($_POST['nomPiece']);



$insertPiece = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur, piece_type) VALUES (:piece,:idLogement,:idUser,:type)") or die(print_r($db->errorInfo()));
$insertPiece->bindParam(':piece', $piece);
$insertPiece->bindParam(':idLogement', $idLogement);
$insertPiece->bindParam(':idUser', $idUser);
$insertPiece->bindParam(':type', $type);
$insertPiece->execute() or die(print_r($insertPiece->errorInfo()));

$insertPiece->closeCursor();


header("Location:../view/interface/clientPieces.php?id=$idLogement");