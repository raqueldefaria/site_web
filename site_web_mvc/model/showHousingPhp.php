<?php

/* ------------------- DB ------------------- */
require("connectionDb.php");

$idUser = $_SESSION['userID'];

$housing = $db->prepare("SELECT * FROM logement WHERE id_Utilisateur =?") or die(print_r($db->errorInfo()));
$housing->execute(array($idUser));

$dataHousing = $housing->fetch();

$housing->closecursor();

while ($data = $dataHousing){
    ?>
    <a href="index.php?action=goToRooms&id=<?php echo $data['id_Logement']?>">
        <div class="section">
            <img src="public/images/client/cancel.png" class="suppLogement" id="supp<?php echo($data['id_Logement']); ?>">
            <p class="adresse" style="font-size: small"><?php echo $data['logement_adresse']?></p>
            <p class ="code_postal" style="font-size: small"><?php echo $data['logement_codePostal']?>, <?php echo $data['logement_ville']?></p>
            <p class="pays" style="font-size: small"><?php echo $data['logement_pays']?></p>
        </div>
    </a>
    <script>document.getElementById("supp<?php echo( $data['id_Logement'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppLogement.php?id=<?php echo( $data['id_Logement'] )?>");}, true);</script>
    <?php
}
?>
