<?php
session_start();
/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
$idLogementSQL = $obj->idLogement; // j'ai créé une nouvelle variable au lieu d'utiliser la flèche, au cas où on perde l'info à utiliser direct dans la requete $obj->idPiece plusieurs fois


/* ------------------- BDD ------------------- */
require("connection_db.php");
$piece_infoID_raw = $db->query("SELECT id_Piece FROM piece WHERE Logement_idLogement = " .$idLogementSQL);
while($piece_infoID = $piece_infoID_raw->fetch()){
    $cemac_infoID_raw = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece = " .$piece_infoID['id_Piece']);
    while($cemac_infoID = $cemac_infoID_raw->fetch()){
        //on supprime les capteurs ayant l'id cemac de la pièce en question
        $db->exec("DELETE FROM `capteur/actionneur` WHERE Cemac_idCemac = " .$cemac_infoID['id_Cemac']);// or die(print_r($db->errorInfo()));
    }
    $db->exec("DELETE FROM cemac WHERE Piece_idPiece = " .$piece_infoID['id_Piece']);
    $db->exec("DELETE FROM piece WHERE id_Piece = ".$piece_infoID['id_Piece']);
}
$db->exec("DELETE FROM logement WHERE id_Logement = ".$idLogementSQL);





//$execute = $db->prepare("INSERT INTO piece (piece_nom ,  Logement_idLogement , Logement_Utilisateur_idUtilisateur , piece_type) VALUES (? , ? , ? , ? )") or die(print_r($db->errorInfo()));
//$execute->execute(array((string)$idPieceSQL , 55 , 82 , "Garage"));

//$db->closeCursor();
