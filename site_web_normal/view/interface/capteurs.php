<?php
session_start();
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/headerbis.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />
    <link rel="stylesheet" href="../css/jspopUp.css" />
    <link rel="stylesheet" href="../css/capteurs.css" />


    <title>DomOnline - Tous les capteurs/actionneurs</title>

</head>

<body>

<!--************** Header *************-->
<?php include ("headerbis.php")?>

<!--************** Menu **************-->
<?php include ("menuClient.php")?>


<!--************** Navigation **************-->

<div class="pieces">
    <div class="sectionPieces">
        <p class="motPiece">Tous les capteurs et actionneurs</p>
        <a href="#"><img src="../images/client/question.png" class="questions"></a>
    </div>
    <table>
        <tr>
            <th>Capteurs/actionneurs</th>
            <th>Type</th>
            <th>Pièce</th>
            <th>Logement</th>
            <th>Statistiques</th>
            <th>Pannes</th>
        </tr>
        <?php include("../../model/showAllCapteurs.php") ?>
    </table>

</div>


<!--************ Footer **************-->
<?php include ("footer.php")?>
</body>
</html>
