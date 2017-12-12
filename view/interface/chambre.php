<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/chambre.css" />
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />

    <title>DomOnline - Chambre</title>
  </head>

  <body>

  <!--------------- Header --------------->
  <?php include ("header.php")?>

  <!--------------- Menu --------------->
  <?php include ("menuClient.php")?>


  <!--------------- Navigation --------------->
  <div class="pieces">
      <div class="sectionPieces">
          <p class="motPiece">Chambre</p>
          <a href="#"><img src="../images/client/question.png" class="questions"></a>
      </div>

      <div class="optionPieces">
        <a href="#">
          <div class="section">
            <p>Lumière </p>
            <img src="../images/lumière.png"/>
          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Volets</p>
            <img src="../images/volets.png"/>
          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Température</p>
            <img src="../images/température.png"/>
          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Humidité</p>
            <img src="../images/humidité.png"/>
          </div>
        </a>
      </div>
  </div>



  <!--------------- Footer --------------->
  <?php include ("footer.php")?>


  </body>
</html>
