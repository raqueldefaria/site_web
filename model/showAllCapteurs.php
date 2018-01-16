<?php

/* ------------------- DB ------------------- */
require("connection_db.php");

$logements = $db->query("SELECT * FROM logement WHERE id_Utilisateur=".$_SESSION['userID']);
while ($dataLogements = $logements->fetch()){
    $pieces = $db->query("SELECT id_Piece, piece_nom FROM piece WHERE Logement_idLogement=".$dataLogements['id_Logement']);
    while($dataPiece = $pieces->fetch()){
        $cemac = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$dataPiece['id_Piece']);
        $idCemac = $cemac->fetch();
        $capteurs = $db->query("SELECT `capteur/actionneur_type`, `capteur/actionneur_fonction`  FROM `capteur/actionneur` WHERE Cemac_idCemac=".$idCemac['id_Cemac']);
        if($capteurs!=false){
            while($dataCapteurs = $capteurs->fetch()){
                ?>
                <tr>
                    <td><?php echo $dataCapteurs['capteur/actionneur_fonction']?></td>
                    <td><?php echo $dataCapteurs['capteur/actionneur_type']?></td>
                    <td><?php echo $dataPiece['piece_nom']?></td>
                    <td><?php echo $dataLogements['logement_adresse']?>, <?php echo $dataLogements['logement_codePostal']?>, <?php echo $dataLogements['logement_ville']?>, <?php echo $dataLogements['logement_pays']?></td>
                    <td><a href="#">Statistiques</a> </td>
                    <td><a href="#">Pannes</a> </td>
                </tr>
                <?php

            }
        }

    }

}











