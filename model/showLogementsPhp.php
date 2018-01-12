<?php

require ("connection_db.php");

$pieces = $db->query("SELECT * FROM logement WHERE id_Utilisateur =".$_SESSION['userID']);

while ($data = $pieces->fetch()){
    ?>
<a href="clientPieces.php?id=<?php echo $data['id_Logement']?>">
    <div class="section">
        <p style="font-size: small"><?php echo $data['logement_adresse']?></p>
        <p style="font-size: small"><?php echo $data['logement_codePostal']?>, <?php echo $data['logement_ville']?></p>
        <p style="font-size: small"><?php echo $data['logement_pays']?></p>
    </div>
</a>
<?php

}
?>