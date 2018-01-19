<?php

$reponse = $db->prepare("SELECT * FROM logement
                         WHERE logement_adresse=:adresse AND logement_codePostal=:codePostal AND logement_ville=:ville AND logement_pays=:pays")or die(print_r("erreur=".$db->errorInfo()));

$reponse->bindParam(':adresse', $adresse);
$reponse->bindParam(':codePostal', $codePostal);
$reponse->bindParam(':ville', $ville);
$reponse->bindParam(':pays', $pays);
$reponse->execute()or die(print_r("erreur2=".$reponse->errorInfo()));

?>
