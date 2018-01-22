<?php
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
/* ------------------- BDD ------------------- */
require("connection_db.php");

$insertLogement = $db->prepare("INSERT INTO logement(logement_adresse, logement_codePostal, logement_ville, logement_pays, id_Utilisateur) VALUES (:adresse,:codePostal,:ville,:pays,:idUser)") or die(print_r($db->errorInfo()));
$insertLogement->bindParam(':adresse', $adresse);
$insertLogement->bindParam(':codePostal', $codePostal);
$insertLogement->bindParam(':ville', $ville);
$insertLogement->bindParam(':pays', $pays);
$insertLogement->bindParam(':idUser', $idUser);
$insertLogement->execute() or die(print_r($insertLogement->errorInfo()));


$insertLogement->closeCursor();

header("Location:../view/interface/logements.php");
