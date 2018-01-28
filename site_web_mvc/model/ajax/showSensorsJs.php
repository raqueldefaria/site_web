<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");

$dataCemac = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece =" .$obj->idPiece) or die(print_r($db->errorInfo()));
$response  = $dataCemac->fetch();

$dataCemac->closeCursor();


if (!empty($response)){
    $data = $db->prepare("SELECT `capteur/actionneur_fonction` AS fonction , `id_Capteur/actionneur` AS ID_capteur_actionneur FROM `capteur/actionneur` WHERE Cemac_idCemac = ?") or die(print_r($db->errorInfo()));
    $data->execute(array($response['id_Cemac'])) or die(print_r($data->errorInfo()));

    $outp=array();
    $outp = $data->fetch() or die(print_r($data->errorInfo()));

    if($outp===false){

        echo json_encode(null);
    }
    else{
        echo json_encode($outp);
    }
}
else{
    echo json_encode(null);
}
