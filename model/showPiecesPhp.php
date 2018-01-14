<?php

require ("connection_db.php");

$pieces = $db->query("SELECT * FROM piece WHERE Logement_Utilisateur_idUtilisateur =" .$_SESSION['userID']. " AND Logement_idLogement=".$_SESSION['idLogement']);

while ($data = $pieces->fetch()){
    switch ($data['piece_nom']) {
        case "Garage":
            ?>
            <a href="garage.php" id="<?php echo($data['id_Piece']); ?>"> <!-- on identifie chaque pièce dans le dom grace à son id de la database -->
                <div class="section" >
                    <img src="../images/client/cancel.png" class="suppPiece"> <!-- Modif pour le moment uniquement faite sur garage, modif après le prochain push-->
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/car.png">
                </div>
            </a>
            <?php
            break;
        case "Chambre":
            ?>
            <a href="chambre.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bed.png">
                </div>
            </a>
            <?php
            break;
        case "Cuisine":
            ?>
            <a href="cuisine.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/cutlery.png">
                </div>
            </a>
            <?php
            break;
        case "Bureau":
            ?>
            <a href="bureau.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/desktop.png">
                </div>
            </a>
            <?php
            break;
        case "Salle de Bain":
            ?>
            <a href="salleDeBain.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bathtub.png">
                </div>
            </a>
            <?php
            break;
        case "Toilettes":
            ?>
            <a href="toilettes.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bed.png">
                </div>
            </a>
            <?php
            break;
        case "Salon":
            ?>
            <a href="salon.php">
                <div class="section">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bathtub.png">
                </div>
            </a>
            <?php
            break;
        default:
            ?> <img src="../images/client/bathtub.png"> <?php
    }
}
?>
