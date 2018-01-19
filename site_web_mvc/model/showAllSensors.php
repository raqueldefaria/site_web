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
            while($dataSensors = $sensors->fetch()){
                ?>
                <tr>
                    <td><?php echo $dataSensors['capteur/actionneur_fonction']?></td>
                    <td><?php echo $dataSensors['capteur/actionneur_type']?></td>
                    <td><?php echo $dataRoom['piece_nom']?></td>
                    <td><?php echo $dataHousing['logement_adresse']?>, <?php echo $dataHousing['logement_codePostal']?>, <?php echo $dataHousing['logement_ville']?>, <?php echo $dataHousing['logement_pays']?></td>
                    <?php
                    switch($dataSensors['capteur/actionneur_fonction']){
                        case "Lumière":
                            ?>
                            <td><a onclick="return popChart('chartDiv', 10, <?php echo $dataRoom['id_Piece']?> , <?php echo $dataSensors['id_Capteur/actionneur']?>, 'Flux lumineux', 'Flux lumineux en fonction du temps','Flux lumineux en lumens', 'Temps en heures')">Voir</a> </td>

                            <?php
                            break;
                        case "Volets":
                            ?>
                            <td><img src="public/images/delete.png"> </td>

                            <?php
                            break;
                        case "Température":
                            ?>
                            <td><a onclick="return popChart('chartDiv', 10, <?php echo $dataRoom['id_Piece']?> , <?php echo $dataSensors['id_Capteur/actionneur']?>, 'Température', 'Température en fonction du temps', 'Température en °C', 'Temps en heures')">Voir</a> </td>

                            <?php
                            break;
                        case "Humidité":
                            ?>
                            <td><a onclick="return popChart('chartDiv', 10, <?php echo $dataRoom['id_Piece']?> , <?php echo $dataSensors['id_Capteur/actionneur']?>, 'Humidité', 'Humidité en fonction du temps', 'Humidité en g par unité de volume', 'Temps en heures')">Voir</a> </td>

                            <?php
                            break;
                        default:
                            ?>
                            <td><img src="public/images/delete.png"> </td>

                        <?php
                    }
                    ?>
                </tr>
                <?php

            }
        }

    }

}

