<?php
session_start();
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars
require ("../../model/connectionDb.php");

$adresse = $obj->adresse;
$codePostal = $obj->codePostal;
$ville = $obj->ville;
$pays = $obj->pays;
$idUser = htmlspecialchars($_SESSION['userID']);

// on vérifie d'abord que tous les champs sont remplis
if(!empty($adresse) AND !empty($codePostal) AND !empty($ville) AND !empty($pays)){

    require('../model/logementExist.php'); // on sélectionne tous les logements déjà existants

    // on vérifie que ce logement existe déjà ou non
    if($reponse->rowCount() == 0){
        include("../model/addLogement.php");
    }
    else{ // ce logement existe déjà, on obtient donc une erreur et on redirige l'utilisateur
        //header("Location:../view/interface/logementsErreur.php?erreur=0");
    }

}
else{ // un champ n'a pas été rempli, on obtient donc une erreur et on redirige l'utilisateur
    //header("Location:../view/interface/logementsErreur.php?erreur=1");
}
