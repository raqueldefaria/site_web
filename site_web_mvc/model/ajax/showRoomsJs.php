<?php

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- DB ------------------- */
require("../connectionDb.php");


$rooms = $db->query("SELECT * FROM piece WHERE Logement_Utilisateur_idUtilisateur =" .$obj->idUser. " AND Logement_idLogement=".$obj->idLogement);

if($rooms->rowCount() == 0){
    echo json_encode(null);
    $rooms->closeCursor();
}
else{
    $outp = array();
    $outp = $rooms->fetchAll();
    $rooms->closeCursor();
    echo json_encode($outp);
}


