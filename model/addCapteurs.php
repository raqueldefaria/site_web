<?php

session_start();
$idPiece = $_SESSION['idPiece'];
$fonction = $_POST['capteurActionneur'];
$type = $_POST['type'];

/* ------------------- BDD ------------------- */
require("connection_db.php");

$data = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$idPiece);
$idCemac = $data->fetch();

$insertLogement = $db->prepare("INSERT INTO `capteur/actionneur`(`capteur/actionneur_fonction`, `capteur/actionneur_type`, Cemac_idCemac, Utilisateur_idUtilisateur) VALUES (:fonction,:type,:idCemac,:idUser)") or die(print_r($db->errorInfo()));
$insertLogement->bindParam(':fonction', $fonction);
$insertLogement->bindParam(':type', $type);
$insertLogement->bindParam(':idCemac', $idCemac['id_Cemac']);
$insertLogement->bindParam(':idUser', $_SESSION['userID']);
$insertLogement->execute() or die(print_r($insertLogement->errorInfo()));


$insertLogement->closeCursor();
$data->closeCursor();

header("Location:../view/interface/capteursPiece.php?id=$idPiece");