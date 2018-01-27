<?php

session_start();
header("Content-Type: application/json; charset=UTF-8");
$idPiece = $_SESSION['idPiece'];
$obj = json_decode($_POST["x"], false);
$fonction = $obj->fonction;
$type = $obj->type;
$nomCemac = $obj->nomCemac;



/* ------------------- BDD ------------------- */
require("../connectionDb.php");

// un cemac ne peut pas etre dans plusieurs pieces au meme temps
$cemac = $db->prepare("SELECT id_Cemac, Piece_idPiece FROM cemac WHERE cemac_nom= ?");
$cemac->execute(array($nomCemac));
$responseCemac = $cemac->fetch();
//si le cemac selectionne n'existe pas ou il est deja dans ma piece
if(empty($responseCemac['id_Cemac']) OR $responseCemac['Piece_idPiece']==$idPiece){
    $insertCemac = $db->prepare("INSERT INTO cemac(cemac_nom, Piece_idPiece) VALUES (:nom,:idPiece)"); //or die(print_r($db->errorInfo()));
    $insertCemac->bindParam(':nom', $nomCemac);
    $insertCemac->bindParam(':idPiece', $idPiece);
    $insertCemac->execute();// or die(print_r($insertPiece->errorInfo()));

    $insertCemac->closeCursor();

    $data = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$idPiece);
    $idCemac = $data->fetch();

    $insertCapteur = $db->prepare("INSERT INTO `capteur/actionneur`(`capteur/actionneur_fonction`, `capteur/actionneur_type`, Cemac_idCemac) VALUES (:fonction,:type,:idCemac)"); //or die(print_r($db->errorInfo()));
    $insertCapteur->bindParam(':fonction', $fonction);
    $insertCapteur->bindParam(':type', $type);
    $insertCapteur->bindParam(':idCemac', $idCemac['id_Cemac']);
    $insertCapteur->execute();// or die(print_r($insertLogement->errorInfo()));


    $insertCapteur->closeCursor();
    $insertCemac->closeCursor();
    $cemac->closeCursor();
    $data->closeCursor();

    header("Location:../view/interface/capteursPiece.php?id=$idPiece");// à enlever ?
}

else{
    ?>
<script>alert("Ce Cemac est deja dans une autre piece !")</script>
<?php
    header ("Location:../view/interface/capteursPiece.php?id=$idPiece");
}
