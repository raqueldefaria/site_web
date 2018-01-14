<?php

/* ------------------- DB ------------------- */
require("connection_db.php");

$data = $db->query("SELECT `capteur/actionneur_type`, `capteur/actionneur_fonction`, piece_nom, logement_adresse, logement_codePostal, logement_ville, logement_pays FROM `capteur/actionneur`, piece, logement 
                     WHERE Utilisateur_idUtilisateur=".$_SESSION['userID']." AND Logement_Utilisateur_idUtilisateur=".$_SESSION['userID']." AND id_Utilisateur=".$_SESSION['userID']);

while ($response = $data->fetch()){
    ?>
    <tr>
        <td><?php echo $response['capteur/actionneur_fonction']?></td>
        <td><?php echo $response['capteur/actionneur_type']?></td>
        <td><?php echo $response['piece_nom']?></td>
        <td><?php echo $response['logement_adresse']?>, <?php echo $response['logement_codePostal']?>, <?php echo $response['logement_ville']?>, <?php echo $response['logement_pays']?></td>
        <td><a href="#">Statistiques</a> </td>
        <td><a href="#">Pannes</a> </td>
    </tr>
    <?php

}
?>








