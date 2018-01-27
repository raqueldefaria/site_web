<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
require ("../../model/connectionDb.php");

$adresse = $obj->adresse;
$codePostal = $obj->codePostal;
$ville = $obj->ville;
$pays = $obj->pays;
$IDLogement = $obj->idLogement;
$idUser = htmlspecialchars($_SESSION['userID']);

// on vérifie d'abord que tous les champs sont remplis
if(!empty($adresse) AND !empty($codePostal) AND !empty($ville) AND !empty($pays)){

        include("../../model/ajax/editLogementJS.php");


}
else{ // un champ n'a pas été rempli, on obtient donc une erreur et on redirige l'utilisateur (actuellement ca redirige rien du tout vu qu'on a fait la transition en ajax)
    header("Location:../view/interface/logementsErreur.php?erreur=1");// en effet, cette page est appelée de manière parrallèle
}
