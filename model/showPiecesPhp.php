<?php

require ("connection_db.php");

$pieces = $db->query("SELECT * FROM piece WHERE Logement_Utilisateur_idUtilisateur =" .$_SESSION['userID']. " AND Logement_idLogement=".$_SESSION['idLogement']);

while ($data = $pieces->fetch()){
    switch ($data['piece_nom']) {
        case "Garage":
            ?>

            <a href="garage.php" id="<?php echo($data['id_Piece']); ?>"> <!-- on identifie chaque pièce dans le dom grace à son id de la database -->
                <div class="section" >
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <img src="../images/client/car.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script><!-- Crée un evenement onclick qui revoie vers une page php de suppression de pièce-->
<!-- Pour plus d'informations sur cette ligne dégueu, contacter Alexandre Dejous :) -->
            <?php
            break;
        case "Chambre":
            ?>
            <a href="chambre.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bed.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        case "Cuisine":
            ?>
            <a href="cuisine.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/cutlery.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        case "Bureau":
            ?>
            <a href="bureau.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/desktop.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        case "Salle de Bain":
            ?>
            <a href="salleDeBain.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bathtub.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        case "Toilettes":
            ?>
            <a href="toilettes.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bed.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        case "Salon":
            ?>
            <a href="salon.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bathtub.png"> <!-- image à changer -->
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
            break;
        default:
            ?>
            <a href="bathtub.php" id="<?php echo($data['id_Piece']); ?>">
                <div class="section">
                    <img src="../images/client/cancel.png" class="suppPiece" id="supp<?php echo($data['id_Piece']); ?>">
                    <p><?php echo $data['piece_nom']?></p>
                    <img src="../images/client/bathtub.png">
                </div>
            </a>
            <script>document.getElementById("supp<?php echo( $data['id_Piece'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppPiece.php?id=<?php echo( $data['id_Piece'] )?>");}, true);</script>
            <?php
    }
}
?>
