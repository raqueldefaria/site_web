<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />

    <title>DomOnline - Pièces</title>
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
          <a href="#" >
              <div class="section">
                  <p>Garage</p>
                  <img src="../images/client/car.png">
              </div>
          </a>
          <a href="#">
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

          <a href="#" >
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
