<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");

$db->exec("DELETE FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
$db->exec("DELETE FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
$db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
