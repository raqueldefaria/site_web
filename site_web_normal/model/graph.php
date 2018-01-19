<?php
/**
 * Created by PhpStorm.
 * User: Raquel De Faria
 * Date: 08/01/2018
 * Time: 15:59
 */

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- BDD ------------------- */
require("connection_db.php");

$id = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$obj->idPiece);
$idCemac = $id->fetch();

$id2 = $db->query("SELECT `id_Capteur/actionneur` FROM `capteur/actionneur` WHERE Cemac_idCemac=".$idCemac['id_Cemac']);
$idCapteur = $id2->fetch();

$data = $db->query("SELECT donnees_valeur, donnees_temps FROM donnees WHERE `Capteur/actionneur_Cemac_idCemac`=".$idCemac['id_Cemac']." AND `Capteur/actionneur_idCapteur/actionneur`=".$idCapteur['id_Capteur/actionneur']." LIMIT ".$obj->limit) or die(print_r($db->errorInfo()));

$outp = array();
$outp = $data->fetchAll();

echo json_encode($outp);