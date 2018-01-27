<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");
/* ------------------- Request ------------------- */
$data = $db->query("SELECT * FROM logement WHERE id_Utilisateur =".$obj->idUser) or die(print_r($db->errorInfo()));

$outp = array();
$outp = $data->fetchAll() or die(print_r($data->errorInfo()));

$data->closeCursor();

echo json_encode($outp);
