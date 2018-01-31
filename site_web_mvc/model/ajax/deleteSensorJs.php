<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");

$existingFailures = $db->query("SELECT * FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur`=".$obj->idCapteur);
die(print_r($existingFailures->rowCount()));
$existingData = $db->query("SELECT * FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur`=".$obj->idCapteur);



if($existingFailures->rowCount()==0 AND $existingData->rowCount()==0 ){
    $db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
}
elseif ($existingFailures->rowCount()==0 AND $existingData->rowCount()!=0){
    $db->exec("DELETE FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
    $db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
}
elseif ($existingFailures->rowCount()!=0 AND $existingData->rowCount()==0){
    $db->exec("DELETE FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
    $db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
}
elseif ($existingFailures->rowCount()!=0 AND $existingData->rowCount()!=0){
    $db->exec("DELETE FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
    $db->exec("DELETE FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
    $db->exec("DELETE FROM `capteur/actionneur` WHERE `id_Capteur/actionneur` = " .$obj->idCapteur);//or die(print_r($db->errorInfo()));
}



