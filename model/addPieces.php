<?php

/* ------------------- BDD ------------------- */
require("connection_db.php");

$piece = htmlspecialchars($_POST['piece']);
$idUser = htmlspecialchars($_POST['idUser']);

$gettingIdLogement = $db->query("SELECT id_Logement FROM logement WHERE id_Utilisateur =" .$idUser) or die(print_r($db->errorInfo()));
$idLogement = $gettingIdLogement->fetch();
$gettingIdLogement->closeCursor();



$insertPiece = $db->prepare("INSERT INTO piece(piece_nom, Logement_idLogement, Logement_Utilisateur_idUtilisateur) VALUES (:piece,:idLogement,:idUser)") or die(print_r($db->errorInfo()));
$insertPiece->bindParam(':piece', $piece);
$insertPiece->bindParam(':idLogement', $idLogement['id_Logement']);
$insertPiece->bindParam(':idUser', $idUser);
$insertPiece->execute();


$insertPiece->closeCursor();

header("Location:../view/interface/clientPieces.php");