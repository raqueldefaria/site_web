<?php
session_start();

require ("../model/connection_db.php");

$adresse = htmlspecialchars($_POST['adresse']);
$codePostal = htmlspecialchars($_POST['codePostal']);
$ville = htmlspecialchars($_POST['ville']);
$pays = htmlspecialchars($_POST['pays']);
$idUser = htmlspecialchars($_SESSION['userID']);

if(!empty($adresse) AND !empty($codePostal) AND !empty($ville) AND !empty($pays)){

    $reponse = $db->prepare("SELECT * FROM logement
                             WHERE logement_adresse=:adresse AND logement_codePostal=:codePostal AND logement_ville=:ville AND logement_pays=:pays")or die(print_r("erreur=".$db->errorInfo()));

    $reponse->bindParam(':adresse', $adresse);
    $reponse->bindParam(':codePostal', $codePostal);
    $reponse->bindParam(':ville', $ville);
    $reponse->bindParam(':pays', $pays);
    $reponse->execute()or die(print_r("erreur2=".$reponse->errorInfo()));


    if($reponse->rowCount() == 0){
        include("../model/addLogement.php");
    }
    else{
        header("Location:../view/interface/logementsErreur.php?erreur=0");
    }

}
else{
    header("Location:../view/interface/logementsErreur.php?erreur=1");
}