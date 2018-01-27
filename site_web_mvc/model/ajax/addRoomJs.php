<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
$idLogement = $_SESSION['idLogement'];

/* ------------------- BDD ------------------- */
require("../connection_db.php");

$type = $obj->piece;
$idUser = $_SESSION['userID'];
$piece = $obj->nomPiece;



$insertPiece = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur, piece_type) VALUES (:piece,:idLogement,:idUser,:type)") or die(print_r($db->errorInfo()));
$insertPiece->bindParam(':piece', $piece);
$insertPiece->bindParam(':idLogement', $idLogement);
$insertPiece->bindParam(':idUser', $idUser);
$insertPiece->bindParam(':type', $type);
$insertPiece->execute(); //or die(print_r($insertPiece->errorInfo())); ca fait planter ce truc !!

$insertPiece->closeCursor();


//header("Location:../view/interface/clientPieces.php?id=$idLogement");//à enlever ?
