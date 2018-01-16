<?php

session_start();
$idPiece = $_SESSION['idPiece'];
$fonction = $_POST['capteurActionneur'];
$type = $_POST['type'];
$nomCemac = htmlspecialchars($_POST['nomCemac']);

/* ------------------- BDD ------------------- */
require("connection_db.php");

$insertCemac = $db->prepare("INSERT INTO cemac(cemac_nom, Piece_idPiece) VALUES (:nom,:idPiece)") or die(print_r($db->errorInfo()));
$insertCemac->bindParam(':nom', $nomCemac);
$insertCemac->bindParam(':idPiece', $idPiece);
$insertCemac->execute() or die(print_r($insertPiece->errorInfo()));

$insertCemac->closeCursor();

$data = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$idPiece);
$idCemac = $data->fetch();

$insertLogement = $db->prepare("INSERT INTO `capteur/actionneur`(`capteur/actionneur_fonction`, `capteur/actionneur_type`, Cemac_idCemac) VALUES (:fonction,:type,:idCemac)") or die(print_r($db->errorInfo()));
$insertLogement->bindParam(':fonction', $fonction);
$insertLogement->bindParam(':type', $type);
$insertLogement->bindParam(':idCemac', $idCemac['id_Cemac']);
$insertLogement->execute() or die(print_r($insertLogement->errorInfo()));


$insertLogement->closeCursor();
$data->closeCursor();

header("Location:../view/interface/capteursPiece.php?id=$idPiece");