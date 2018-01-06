<?php
session_start();
?>

<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/chambre.css" />
    <link rel="stylesheet" href="../css/clientPieces.css" />
    <link rel="stylesheet" href="../css/headerbis.css" />
    <link rel="stylesheet" href="../css/footer.css" />
    <link rel="stylesheet" href="../css/menuClient.css" />

    <title>DomOnline - Chambre</title>
  </head>

  <body>

  <!--------------- Header --------------->
  <?php include ("headerbis.php")?>

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


            <div class=imgBoutton>
              <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                <label class="onoffswitch-label" for="myonoffswitch">
                  <span class="onoffswitch-inner"></span>
                  <span class="onoffswitch-switch"></span>
                </label>
              </div>
              <img src="../images/lumière.png"/>
            </div>

          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Volets</p>

            <div class=imgBoutton>
              <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                <label class="onoffswitch-label" for="myonoffswitch">
                  <span class="onoffswitch-inner"></span>
                  <span class="onoffswitch-switch"></span>
                </label>
              </div>
              <img src="../images/volets.png"/>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Température</p>
            <div class=imgBoutton>
              <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                <label class="onoffswitch-label" for="myonoffswitch">
                  <span class="onoffswitch-inner"></span>
                  <span class="onoffswitch-switch"></span>
                </label>
              </div>
              <img src="../images/température.png"/>
            </div>
          </div>
        </a>
        <a href="#">
          <div class="section">
            <p>Humidité</p>

            <div class=imgBoutton>
              <div class="onoffswitch">
                <input type="checkbox" name="onoffswitch" class="onoffswitch-checkbox" id="myonoffswitch" checked>
                <label class="onoffswitch-label" for="myonoffswitch">
                  <span class="onoffswitch-inner"></span>
                  <span class="onoffswitch-switch"></span>
                </label>
              </div>
              <img src="../images/humidité.png"/>
            </div>
          </div>
        </a>
      </div>
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



  <!--************- Footer -*************->
  <?php include ("footer.php")?>


  </body>
</html>
