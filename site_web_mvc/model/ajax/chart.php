<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);


/* ------------------- Mise à jour des données ------------------- */
require ("../addingDataFromCemac.php");


/* ------------------- BDD ------------------- */
require("../connectionDb.php");

$data = $db->query("SELECT donnees_valeur, donnees_temps FROM donnees WHERE `Capteur/actionneur_idCapteur/actionneur`=".$obj->idSensor." LIMIT ".$obj->limit) or die(print_r($db->errorInfo()));

$outp = array();
$outp = $data->fetchAll();

echo json_encode($outp);