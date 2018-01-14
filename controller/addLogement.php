<?php

require ("../model/connection_db.php");

$adresse = htmlspecialchars($_POST['adresse']);
$codePostal = htmlspecialchars($_POST['codePostal']);
$ville = htmlspecialchars($_POST['ville']);
$pays = htmlspecialchars($_POST['pays']);

if(!empty($adresse) and !empty($codePostal) and !empty($ville) and !empty($pays)){

    $reponse = $db->prepare('SELECT * FROM logement
                             WHERE logement_adresse=:adresse AND logement_codePostal=:codePostal AND logement_ville=:ville AND logement_pays=:pays ')or die(print_r($db->errorInfo()));

    $reponse->bindParam(':adresse', $adresse);
    $reponse->bindParam(':codePostal', $codePostal);
    $reponse->bindParam(':ville', $ville);
    $reponse->bindParam(':pays', $pays);
    $reponse->execute();

    $donnees = $reponse->fetch() or die(print_r($reponse->errorInfo()));

    if(empty($donnees)){
        include("../model/addLogement.php");
    }
    else{
        header("Location:../view/interface/logementsErreur.php?erreur=0");
    }

}
else{
    header("Location:../view/interface/logementsErreur.php?erreur=1");
}