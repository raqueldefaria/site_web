<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
//$idLogement = $_SESSION['idLogement'];

/* ------------------- BDD ------------------- */
require("connection_db.php");

$type = $obj->piece;
//$idUser = $_SESSION['userID'];
$piece = $obj->nomPiece;
$IDPiece =$obj->idPiece;



$insertPiece = $db->prepare("UPDATE piece SET piece_nom = :piece , piece_type = :type WHERE id_Piece = :idpiece ") or die(print_r($db->errorInfo()));
$insertPiece->bindParam(':piece', $piece);
$insertPiece->bindParam(':idpiece', $IDPiece);
//$insertPiece->bindParam(':idUser', $idUser);
$insertPiece->bindParam(':type', $type);
$insertPiece->execute(); //or die(print_r($insertPiece->errorInfo())); ce machin fait planter !!!

$insertPiece->closeCursor();


//header("Location:../view/interface/clientPieces.php?id=$idLogement");//à enlever ?
