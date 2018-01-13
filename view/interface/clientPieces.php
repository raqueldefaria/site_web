<?php
session_start();
$_SESSION['idLogement'] = $_GET['id'];
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

    <title>DomOnline - Pièces</title>

</head>

<body>

<!--************** Header *************-->
<?php include ("headerbis.php")?>

<!--************** Menu **************-->
<?php include ("menuClient.php")?>

<!--************** Pop js **************-->
<div id="addPiece" class="parentDisable">
    <div class="addPieceOptions" >
        <form method="post" action="../../model/addPieces.php" >
            <p>Ajouter une pièce : <select name="piece">
                    <option value="Garage">Garage</option>
                    <option value="Chambre">Chambre</option>
                    <option value="Cuisine">Cuisine</option>
                    <option value="Bureau">Bureau</option>
                    <option value="Salle De Bain">Salle de bain</option>
                    <option value="Toilettes">Toilettes</option>
                    <option value="Salon">Salon</option>
                </select></p>
            <input hidden name="idUser" value="<?php echo $_SESSION['userID']?>"/>
            <script type="application/javascript" src="../js/showOrHidePopUp.js"></script>
            <input value="Ajouter" type="submit">
            <input value="Fermer" type="submit" onclick="return hide('addPiece')">
        </form>
    </div>
</div>




<!--************** Navigation **************-->
<div class="pieces">
    <div class="sectionPieces">
        <p class="motPiece">Pièces</p>
        <a href="#"><img src="../images/client/question.png" class="questions"></a>
    </div>
    <div class="optionPieces">

        <!-- displaying pieces from Db -->
        <?php include('../../model/showPiecesPhp.php') ?>

        <a href="#" onclick="return pop('addPiece') " >
            <div class="section">
                <img src="../images/client/add.png" class="addButton">
                <p>Ajouter</p>
            </div>
        </a>
    </div>
</div>


<!--************ Footer **************-->
<?php include ("footer.php")?>
</body>
</html>
