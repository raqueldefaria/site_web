<?php

require("connectionDb.php");

$idCapteur = $_GET['idCapteur'];
$idRoom = $_GET['idRoom'];

$db->exec("DELETE FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$idCapteur);//or die(print_r($db->errorInfo()));
$db->exec("DELETE FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$idCapteur);//or die(print_r($db->errorInfo()));
$db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$idCapteur);//or die(print_r($db->errorInfo()));

header("Location:../index.php?action=goToSensors&id=".$idRoom);