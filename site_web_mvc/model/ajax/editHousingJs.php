<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
/* ------------------- BDD ------------------- */
//require("../connection_db.php");

$insertLogement = $db->prepare("UPDATE logement SET logement_adresse = :adresse , logement_codePostal = :codePostal , logement_ville = :ville , logement_pays = :pays WHERE id_Logement = :idLogement ") or die(print_r($db->errorInfo()));
$insertLogement->bindParam(':adresse', $adresse);
$insertLogement->bindParam(':codePostal', $codePostal);
$insertLogement->bindParam(':ville', $ville);
$insertLogement->bindParam(':pays', $pays);
$insertLogement->bindParam(':idLogement', $IDLogement);
//$insertLogement->bindParam(':idUser', $idUser);
$insertLogement->execute() or die(print_r($insertLogement->errorInfo()));


$insertLogement->closeCursor();

//header("Location:../../index.php?action=goToHousing");
