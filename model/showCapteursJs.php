<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("connection_db.php");

$dataCemac = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece =" .$obj->idPiece) or die(print_r($db->errorInfo()));
$response  = $dataCemac->fetch();

$data = $db->query("SELECT `capteur/actionneur_fonction` AS fonction FROM `capteur/actionneur` WHERE Cemac_idCemac =" .$response['id_Cemac']) or die(print_r($db->errorInfo()));

$outp = array();
$outp = $data->fetchAll();

$dataCemac->closeCursor();
$data->closeCursor();

echo json_encode($outp);







