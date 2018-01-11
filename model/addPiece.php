<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$idLogement = $db->query("SELECT id_Logement FROM logement WHERE id_Utilisateur =" .$obj->idUser) or die(print_r($db->errorInfo()));
$insertLogement->closeCursor();
$piece = htmlspecialchars($_POST['piece']);


$insertPiece = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur) VALUES (?,?,?)") or die(print_r($db->errorInfo()));

$insertPiece->execute(array($piece, $idLogement, $obj->idUser));

$insertPiece->closeCursor();

echo $idLogement->fetch();
echo $insertPiece->fetch();