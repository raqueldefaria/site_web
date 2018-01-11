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

    <title>DomOnline - Pièces</title>
</head>

<body>

<!--************** Header *************-->
<?php include ("headerbis.php")?>

<!--************** Menu **************-->
<?php include ("menuClient.php")?>

<!--************** Pop **************-->
<div id="addPiece" class="parentDisable">
    <div class="addPieceOptions" >
        <form method="post" action="../../model/addPiece.php" >
            <p>Ajouter une piece : <select name="piece">
                    <option value="garage">Garage</option>
                    <option value="chambre">Chambre</option>
                    <option value="cuisine">Cuisine</option>
                    <option value="bureau">Bureau</option>
                    <option value="salleDeBain">Salle de bain</option>
                    <option value="toilettes">Toilettes</option>
                    <option value="Salon">Salon</option>
                </select></p>
            <script type="application/javascript" src="../js/addPiece.js"></script>
            <input value="Ajouter" type="submit" onClick="return hideAdd('addPiece', <?php echo $_SESSION['userID']?>)">
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
        <a href="#" >
            <div class="section">
                <p>Garage</p>
                <img src="../images/client/car.png">
            </div>
        </a>
        <a href="chambre.php">
            <div class="section">
                <p>Chambre 1</p>
                <img src="../images/client/bed.png">
            </div>
        </a>
        <a href="#">
            <div class="section">
                <p>Chambre 2</p>
                <img src="../images/client/bed.png">
            </div>
        </a>

        <a href="#">
            <div class="section">
                <p>Chambre 3</p>
                <img src="../images/client/bed.png">
            </div>
        </a>

        <a href="#">
            <div class="section">
                <p>Salle de bain</p>
                <img src="../images/client/bathtub.png">
            </div>
        </a>

        <a href="#">
            <div class="section">
                <p>Bureau</p>
                <img src="../images/client/desktop.png">
            </div>
        </a>

        <a href="#">
            <div class="section">
                <p>Cuisine</p>
                <img src="../images/client/cutlery.png">
            </div>
        </a>

        <a href="#" onclick="return popAdd('addPiece') " >
            <div class="section">
                <img src="../images/client/add.png" class="addButton">
            </div>
        </a>
    </div>
</div>


<!--------------- Footer --------------->
<?php include ("footer.php")?>
</body>
</html>
