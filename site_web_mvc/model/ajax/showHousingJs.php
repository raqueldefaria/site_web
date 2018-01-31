<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");
/* ------------------- Request ------------------- */
$data = $db->query("SELECT * FROM logement WHERE id_Utilisateur =".$obj->idUser) or die(print_r($db->errorInfo()));

if($data->rowCount() == 0){
    echo json_encode(null);
    $data->closeCursor();
}
else{
    $outp = array();
    $outp = $data->fetchAll() or die(print_r($data->errorInfo()));
    echo json_encode($outp);
    $data->closeCursor();
}

