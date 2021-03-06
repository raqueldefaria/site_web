<?php
session_start();
$_SESSION['idPiece'] = htmlspecialchars($_GET['id']);
?>

<!DOCTYPE html>
<html xmlns:color="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/chambre.css" />
    <link rel="stylesheet" href="../css/clientCapteurs.css" />
    <link rel="stylesheet" href="../css/headerbis.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />
    <link rel="stylesheet" href="../css/jsPopUp.css" />

    <title>DomOnline - Capteurs</title>

    <script type="application/javascript" src="../js/requeteDbGraph.js"></script>
    <script type="application/javascript" src="../js/showData.js"></script>
    <script type="application/javascript" src="../js/showOrHidePopUp.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> <!--Import de jQuery -->
</head>

<body onload="showCapteursFromDb(<?php echo $_SESSION['idPiece']?>)">

<!--------------- Header --------------->
<?php include ("headerbis.php")?>

<!--------------- Menu --------------->
<?php include ("menuClient.php")?>

<!--************** Graphique **************-->
<div id="chartDiv" class="parentDisable">
    <div class="chart" >
        <canvas id="chart"></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>
        <script src="../js/requeteDbGraph.js"></script>
        <input value="Fermer" type="submit" onClick="return hide('chartDiv')">
    </div>
</div>

<div id="addCapteurs" class="parentDisable">
    <div class="addPieceOptions" >
        <form method="post" action="#" >
            <p>Ajouter la fonction du capteur/actionneur : <select name="capteurActionneur">
                    <option value="Lumière">Lumière</option>
                    <option value="Volets">Volets</option>
                    <option value="Température">Température</option>
                    <option value="Humidité">Humidité</option>
                </select></p>
            <p>Choisissez le type : <select name="type">
                    <option value="Capteur">Capteur</option>
                    <option value="Actionneur">Actionneur</option>
                </select></p>
            <p>Adresse MAC du Cemac correspondant : <input type="text" name="nomCemac"></p>
            <input value="Ajouter" type="submit" onclick="addCapteur(<?php echo $_SESSION['idPiece']?>); event.preventDefault(); hide('addCapteurs'); ">
            <input value="Fermer" type="submit" onclick="return hide('addCapteurs'); event.preventDefault(); ">
        </form>
    </div>
</div>


<!--------------- Navigation --------------->
<div class="pieces">
    <div class="sectionPieces">
        <p class="motPiece">Capteurs/actionneurs</p>
        <a href="#"><img src="../images/client/question.png" class="questions"></a>
    </div>

    <div class="optionPieces" id="capteursActionneurs"></div>

    <p class="motPiece" color:black>Scénario :</p>
    <div id="menu">
        <ul id="onglets">
            <li class="active"><a href="Accueil.html"> Chauffage </a></li>
            <li><a href="Forums.html"> Volets </a></li>
        </ul>
    </div>
    <br />
    <div class=options>
        <label> Si la température est </label>
        <select>
            <option>supérieure</option>
            <option>inférieure</option>
        </select>
        <label> à </label>
        <input type="number" min="-10" max="40" placeholder="Température en degrés" />
        <label> alors </label>
        <select name="type" id="type">
            <option value="particulier">éteindre le chauffage</option>
            <option value="gestionnaire">allumer le chauffage</option>
        </select>
        <a href="#" ><img src="../images/add.png" /></a>
        <a href="#" ><img src="../images/error.png" /></a>
    </div>

</div>



<!--************- Footer -*************-->
<?php include ("footer.php")?>


</body>
</html>
