<?php
session_start();
?>

<!DOCTYPE html>
<html xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/chambre.css" />
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/headerbis.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />
    <link rel="stylesheet" href="../css/capteurs.css" />

    <title>DomOnline - Contrôle de l'alarme</title>

</head>

<body>

<!--------------- Header --------------->
<?php include ("headerbis.php")?>

<!--------------- Menu --------------->
<?php include ("menuClient.php")?>



<!--------------- Navigation --------------->
<div class="pieces">
    <div class="sectionPieces">
        <p class="motPiece">Contrôle de l'alarme</p>
        <a href="#"><img src="../images/client/question.png" class="questions"></a>
    </div>

    <p style="font-size: large">Etat Actuel : <img src="../images/checked.png"></p>
    <p style="font-size: large">Historique des pannes</p>
    <table>
        <tr>
            <th>Type de panne</th>
            <th>Date de la panne</th>
            <th>Capteur/actionneur</th>
            <th>Type</th>
            <th>Pièce</th>
            <th>Logement</th>
        </tr>
        <?php include("../../model/showAllPannes.php") ?>
    </table>



</div>



<!--************- Footer -*************-->
<?php include ("footer.php")?>


</body>
</html>
