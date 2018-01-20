<?php

/* ------------------- DB ------------------- */
require("connectionDb.php");

$housing = $db->query("SELECT * FROM logement WHERE id_Utilisateur=".$_SESSION['userID']);
while ($dataHousing = $housing->fetch()){
    $rooms = $db->query("SELECT id_Piece, piece_nom FROM piece WHERE Logement_idLogement=".$dataHousing['id_Logement']);
    while($dataRoom = $rooms->fetch()){
        $cemac = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece=".$dataRoom['id_Piece']);
        $idCemac = $cemac->fetch();
        $sensors = $db->query("SELECT `capteur/actionneur_type`, `capteur/actionneur_fonction`, `id_Capteur/actionneur`  FROM `capteur/actionneur` WHERE Cemac_idCemac=".$idCemac['id_Cemac']);
        if($sensors!=false){
            while($dataSensors = $sensors->fetch()) {
                $failures = $db->query("SELECT panne_date, panne_type FROM panne WHERE `Capteur/actionneur_idCapteur/actionneur`=" . $dataSensors['id_Capteur/actionneur']);
                while ($dataFailures = $failures->fetch()) {
                    ?>
                    <tr>
                        <td><?php echo $dataFailures['panne_type'] ?></td>
                        <td><?php echo $dataFailures['panne_date'] ?></td>
                        <td><?php echo $dataSensors['capteur/actionneur_fonction'] ?></td>
                        <td><?php echo $dataSensors['capteur/actionneur_type'] ?></td>
                        <td><?php echo $dataRoom['piece_nom'] ?></td>
                        <td><?php echo $dataHousing['logement_adresse'] ?>, <?php echo $dataHousing['logement_codePostal'] ?>, <?php echo $dataHousing['logement_ville'] ?>, <?php echo $dataHousing['logement_pays'] ?></td>
                    </tr>
                    <?php
                }
            }
        }
    }

}

