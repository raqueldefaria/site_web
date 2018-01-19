<?php

require ("connection_db.php");

$pieces = $db->query("SELECT * FROM logement WHERE id_Utilisateur =".$_SESSION['userID']);

while ($data = $pieces->fetch()){
    ?>
<a href="clientPieces.php?id=<?php echo $data['id_Logement']?>">
    <div class="section">
        <img src="../images/client/cancel.png" class="suppLogement" id="supp<?php echo($data['id_Logement']); ?>">
        <p class="adresse" style="font-size: small"><?php echo $data['logement_adresse']?></p>
        <p class ="code_postal" style="font-size: small"><?php echo $data['logement_codePostal']?>, <?php echo $data['logement_ville']?></p>
        <p class="pays" style="font-size: small"><?php echo $data['logement_pays']?></p>
    </div>
</a>
<script>document.getElementById("supp<?php echo( $data['id_Logement'] )?>").addEventListener("click" , function myScript(e){ e.stopPropagation(); e.preventDefault(); window.location.replace("../../model/suppLogement.php?id=<?php echo( $data['id_Logement'] )?>");}, true);</script>
<?php

}
?>
