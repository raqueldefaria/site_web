<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="public/css/clientPieces.css" />
    <?= $styleHeader ?>
    <link rel="stylesheet" href="public/css/footer.css" />
    <link rel="stylesheet" href="public/css/menuClient.css" />
    <link rel="stylesheet" href="public/css/jspopUp.css" />
    <link rel="stylesheet" href="public/css/sensorsList.css" />
    <link rel="stylesheet" href="public/css/sensorsStyle.css" />

    <script type="application/javascript" src="public/js/showChart.js"></script>
    <script type="application/javascript" src="public/js/showData.js"></script>
    <script type="application/javascript" src="public/js/showOrHidePopUp.js"></script>

    <title>DomOnline - <?= $title ?></title>

</head>
<body>

<?= $header ?>

<!--    Menu    -->
<?php include("menu.php"); ?>

<?= $content ?>



<!--    Footer    -->
<?php include("footer.php"); ?>

</body>

</html>