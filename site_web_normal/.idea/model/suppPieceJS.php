<?php
session_start();
/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
$idPieceSQL = $obj->idPiece; // j'ai créé une nouvelle variable au lieu d'utiliser la flèche, au cas où on perde l'info à utiliser direct dans la requete $obj->idPiece plusieurs fois


/* ------------------- BDD ------------------- */
require("connection_db.php");

$cemac_infoID_raw = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece = " .$idPieceSQL);// or die(print_r($db->errorInfo()));

while($cemac_infoID = $cemac_infoID_raw->fetch()){
//on supprime les capteurs ayant l'id cemac de la pièce en question
    $db->exec("DELETE FROM `capteur/actionneur` WHERE Cemac_idCemac = " .$cemac_infoID['id_Cemac']);// or die(print_r($db->errorInfo()));
}
$db->exec("DELETE FROM cemac WHERE Piece_idPiece = " .$idPieceSQL); //or die(print_r($db->errorInfo())); // faudrait mettre la clé utilisateur dans la table Cemac
$db->exec("DELETE FROM piece WHERE id_Piece = ".$idPieceSQL); //or die(print_r($db->errorInfo()));
//On supprime également toutes les cemacs se trouvant dans la pièce et enfin la pièce en elle même


//$execute = $db->prepare("INSERT INTO piece (piece_nom ,  Logement_idLogement , Logement_Utilisateur_idUtilisateur , piece_type) VALUES (? , ? , ? , ? )") or die(print_r($db->errorInfo()));
//$execute->execute(array((string)$idPieceSQL , 55 , 82 , "Garage"));

//$db->closeCursor();
