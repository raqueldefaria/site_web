<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />
  </head>

  <body>

  <!--------------- Header --------------->
  <?php include ("header.php")?>

  <!--------------- Menu --------------->
  <?php include ("menuClient.php")?>


  <!--------------- Navigation --------------->
  <div class="pieces">
      <div class="sectionPieces">
          <p class="motPiece">Pieces</p>
          <a href="#"><img src="../images/client/question.png" class="questions"></a>
      </div>
      <div class="optionPieces">
          <div class="section">
              <a>Garage</a>
              <br />
              <img src="../images/client/car.png">
          </div>
          <div class="section">
              <a>Chambre 1</a>
              <img src="../images/client/bed.png">
          </div>
          <div class="section">
              <a>Chambre 2</a>
              <img src="../images/client/bed.png">
          </div>
          <div class="section">
              <a>Chambre 3</a>
              <img src="../images/client/bed.png">
          </div>
          <div class="section">
              <a>Salle de bain</a>
              <img src="../images/client/bathtub.png">
          </div>
          <div class="section">
              <a>Bureau</a>
              <br />
              <img src="../images/client/desktop.png">
          </div>
          <div class="section">
              <a>Cuisine</a>
              <br />
              <img src="../images/client/cutlery.png">
          </div>
          <div class="section">
              <a href="#"><img src="../images/client/add.png"></a>
          </div>
      </div>
  </div>


  <!--------------- Footer --------------->
  <?php include ("footer.php")?>
  </body>
</html>
