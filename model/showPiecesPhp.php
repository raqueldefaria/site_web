<?php

require ("connection_db.php");

$pieces = $db->query("SELECT * FROM piece WHERE Logement_Utilisateur_idUtilisateur =".$_SESSION['userID']);

while ($data = $pieces->fetch()){
    ?>
    <a href="#" >
        <div class="section">
            <p><?php echo $data['piece_nom']?></p>
            <?php
            switch ($data['piece_nom']) {
                case "Garage":
                    ?> <img src="../images/client/car.png"> <?php
                    break;
                case "Chambre":
                    ?> <img src="../images/client/bed.png"> <?php
                    break;
                case "Cuisine":
                    ?> <img src="../images/client/cutlery.png"> <?php
                    break;
                case "Bureau":
                    ?> <img src="../images/client/desktop.png"> <?php
                    break;
                case "Salle de Bain":
                    ?> <img src="../images/client/bathtub.png"> <?php
                    break;
                case "Toilettes":
                    ?> <img src="../images/client/bathtub.png"> <?php
                    break;
                case "Salon":
                    ?> <img src="../images/client/bathtub.png"> <?php
                    break;
                default:
                    ?> <img src="../images/client/bathtub.png"> <?php
            }?>
        </div>
    </a>
    <?php
}

?>