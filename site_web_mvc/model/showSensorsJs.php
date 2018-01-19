<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("connectionDb.php");

$dataCemac = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece =" .$obj->idPiece) or die(print_r($db->errorInfo()));
$response  = $dataCemac->fetch();

if (!empty($response)){
    $data = $db->query("SELECT `capteur/actionneur_fonction` AS fonction , `id_Capteur/actionneur` AS ID_capteur_actionneur FROM `capteur/actionneur` WHERE Cemac_idCemac =" .$response['id_Cemac']) or die(print_r($db->errorInfo()));

    $outp = array();
    $outp = $data->fetchAll() or die(print_r($data->errorInfo()));

    echo json_encode($outp);
}
else{
    echo json_encode(null);
}




