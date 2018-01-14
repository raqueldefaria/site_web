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

    <script type="application/javascript" src="../js/showData.js"></script>

    <title>DomOnline - Logements</title>

</head>

<body onload="showLogementsFromDb(<?php echo $_SESSION['userID']?>)">

<!--************** Header *************-->
<?php include ("headerbis.php")?>

<!--************** Menu **************-->
<?php include ("menuClient.php")?>

<!--************** Pop js **************-->
<div id="addLogement" class="parentDisable">
    <div class="addLogementOptions" >
        <form method="post" action="../../controller/addLogement.php" >
            <p>Ajouter un logement :</p>
            <input hidden name="idUser" value="<?php echo $_SESSION['userID']?>"/>
            <input type="text" name="adresse" id="adresse" size=35 placeholder="Adresse" />
            <input type="text" name="codePostal" id="codePostal" size=35 placeholder="Code Postal" />
            <input type="text" name="ville" id="ville" size=35 placeholder="Ville" />
            <input type="text" name="pays" id="pays" size=35 placeholder="Pays" />
            <script type="application/javascript" src="../js/showOrHidePopUp.js"></script>
            <input value="Ajouter" type="submit">
            <input value="Fermer" type="submit" onclick="return hide('addLogement')">
        </form>
    </div>
</div>




<!--************** Navigation **************-->
<div class="pieces">
    <div class="sectionPieces">
        <p class="motPiece">Logements</p>
        <a href="#"><img src="../images/client/question.png" class="questions"></a>
    </div>
    <div class="optionPieces" id="logements">

        <noscript>
            <!-- displaying logements from Db if javascript is not enabled -->
            <?php include('../../model/showLogementsPhp.php') ?>
            <a href="#" onclick="return pop('addLogement') " >
                <div class="section">
                    <img src="../images/client/add.png" class="addButton">
                    <p>Ajouter</p>
                </div>
            </a>
        </noscript>

    </div>
</div>


<!--------------- Footer --------------->
<?php include ("footer.php")?>
</body>
</html>
