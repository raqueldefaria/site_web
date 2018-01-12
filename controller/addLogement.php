<?php

$adresse = htmlspecialchars($_POST['adresse']);
$codePostal = htmlspecialchars($_POST['codePostal']);
$ville = htmlspecialchars($_POST['ville']);
$pays = htmlspecialchars($_POST['pays']);
$idUser = htmlspecialchars($_POST['idUser']);

if(!empty($adresse) and !empty($codePostal) and !empty($ville) and !empty($pays)){
    include("../model/addLogement.php");
}