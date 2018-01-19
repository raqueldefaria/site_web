<?php
    if(!isset($_SESSION['nom']))
    {
?>
      <link rel="stylesheet" href="../css/header.css" />
      <!--<link rel="stylesheet" href="../css/headerbis.css" />-->

    <?php
    }
        else{
     ?>
      <link rel="stylesheet" href="../css/headerbis.css" />
      <!--<link rel="stylesheet" href="../css/headerbis.css" />-->
    <?php
    }

     ?>
<!-- Si il existe un SSID (rappel : $_SESSION['SSID'] = session_id()) alors charger le css du header connecté,
sinon charger le css du header non connecté

Remarque: On prend ici la variable de session "nom" mais n'importe quelle variable de session aurait pu être utilisé

isset($_SESSION['SSID'])
-->
