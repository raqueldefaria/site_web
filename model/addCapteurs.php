<?php

session_start();
$idPiece = $_SESSION['idPiece'];
$fonction = htmlspecialchars($_POST['capteurActionneur']);
$type = htmlspecialchars($_POST['type']);
$nomCemac = htmlspecialchars($_POST['nomCemac']);

/* ------------------- BDD ------------------- */
require("connection_db.php");

// un cemac ne peut pas etre dans plusieurs pieces au meme temps
$cemac = $db->prepare("SELECT id_Cemac, Piece_idPiece FROM cemac WHERE cemac_nom= ?");
$cemac->execute(array($nomCemac));
$responseCemac = $cemac->fetch();
//si le cemac selectionne n'existe pas ou il est deja dans ma piece
if(empty($responseCemac['id_Cemac']) OR $responseCemac['Piece_idPiece']==$idPiece){
    $insertCemac = $db->prepare("INSERT INTO cemac(cemac_nom, Piece_idPiece) VALUES (:nom,:idPiece)") or die(print_r($db->errorInfo()));
    $insertCemac->bindParam(':nom', $nomCemac);
    $insertCemac->bindParam(':idPiece', $idPiece);
    $insertCemac->execute() or die(print_r($insertPiece->errorInfo()));

    $insertCemac->closeCursor();

    $data = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$idPiece);
    $idCemac = $data->fetch();

    $insertCapteur = $db->prepare("INSERT INTO `capteur/actionneur`(`capteur/actionneur_fonction`, `capteur/actionneur_type`, Cemac_idCemac) VALUES (:fonction,:type,:idCemac)") or die(print_r($db->errorInfo()));
    $insertCapteur->bindParam(':fonction', $fonction);
    $insertCapteur->bindParam(':type', $type);
    $insertCapteur->bindParam(':idCemac', $idCemac['id_Cemac']);
    $insertCapteur->execute() or die(print_r($insertLogement->errorInfo()));


    $insertCapteur->closeCursor();
    $insertCemac->closeCursor();
    $cemac->closeCursor();
    $data->closeCursor();

    header("Location:../view/interface/capteursPiece.php?id=$idPiece");
}

else{
    ?>
<script>alert("Ce Cemac est deja dans une autre piece !")</script>
<?php
    header ("Location:../view/interface/capteursPiece.php?id=$idPiece");
}

