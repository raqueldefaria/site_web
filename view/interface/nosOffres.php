<?php
session_start();
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/nosOffres.css" />
        <link rel="stylesheet" href="../css/header.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title>DomOnline - Nos offres</title>
    </head>

    <body>
        <div id="corps">

            <!-- Header -->
            <?php
            require("../../controller/headerInclude.php");
            require("../../controller/headerIncludeCSS.php");
            ?>

            <div id="main_block">
                <h1> Notre Catalogue </h1>

                <div id="demoCatalogueStarterBoite">
                    <h2> Starter pack - Pack Découverte </h2>
                    <div id="demoCatalogueStarterBoiteInner">
                        <div id="demoCatalogueStarterCemac" class="demoCatalogueBoite">
                            <img src="../images/Offres/Cemac.jpg" alt="Cemac">
                            <p>Une Cemac</p>
                        </div>
                        <div id="demoCatalogueStarterFumee" class="demoCatalogueBoite">
                            <img src="../images/Offres/detecteur_fumee.jpg" alt="Détecteur de fumée">
                            <p>Un détecteur de fumée</p>
                        </div>
                        <div id="demoCatalogueStarterHumiditeTemperature" class="demoCatalogueBoite">
                            <img src="../images/Offres/detecteur_humidite_temperature.jpg" alt="Détecteur d'humidité et de température">
                            <p>Un détecteur d'humidité et de température</p>
                        </div>
                        <div id="demoCatalogueStarterLuminositeLuminaire" class="demoCatalogueBoite">
                            <img src="../images/Offres/capteur_luminosite_luminaire.jpg" alt="Capteur de luminosité/luminaire">
                            <p>Un capteur de luminosité/luminaire</p>
                        </div>
                    </div>
                    <h3> 20% de réduction </h3>
                </div>
                    <h1 id="demoCatalogueParType"> Par type: </h1>
<!-- Boite Cemac + Fumee -->
                    <div id="demoCatalogueBoiteCemacFumee">
                        <div id="demoCatalogueTypeCemac">
                            <h2>Cemacs</h2>
                            <div id="demoCatalogueBoiteCemac" class="demoCatalogueBoite">
                                <img src="../images/Offres/Cemac.jpg" alt="Cemac">
                                <p>Cemac - XX euros</p>
                            </div>
                        </div>
                        <div id="demoCatalogueTypeFumee">
                            <h2>Détecteurs de fumée</h2>
                            <div id="demoCatalogueBoiteFumee" class="demoCatalogueBoite">
                                <img src="../images/Offres/detecteur_fumee.jpg" alt="Cemac">
                                <p>Détecteur de fumée - XX euros</p>
                            </div>
                        </div>
                    </div>
<!-- -->


<!-- Caméras -->

                    <div class="demoCatalogueStarterBoite2">
                        <h2> Caméras </h2>
                        <div id="demoCatalogueStarterBoiteInner">
                            <div id="demoCatalogueBoiteCameraMur" class="demoCatalogueBoite">
                                <img src="../images/Offres/camera_mur.jpg" alt="Caméral murale">
                                <p>Caméra murale - XX euros</p>
                            </div>
                            <div id="demoCatalogueBoiteCameraPlafond" class="demoCatalogueBoite">
                                <img src="../images/Offres/camera_plafond.jpg" alt="Caméra de plafond">
                                <p>Caméra plafond - XX euros</p>
                            </div>
                            <div id="demoCatalogueBoiteCameraSol" class="demoCatalogueBoite">
                                <img src="../images/Offres/camera_sol.jpg" alt="Caméra mobile">
                                <p>Caméra mobile - XX euros</p>
                            </div>
                        </div>
                      </div>

<!-- -->

                      <div class="demoCatalogueStarterBoite2">
                          <h2> Capteurs de luminosité </h2>
                          <div id="demoCatalogueStarterBoiteInner2">
                              <div id="demoCatalogueBoiteLuminositeLuminaire" class="demoCatalogueBoite">
                                  <img src="../images/Offres/capteur_luminosite_luminaire.jpg" alt="Capteur de luminosité/luminaire">
                                  <p>Capteur de luminosité/luminaire - XX euros</p>
                              </div>
                              <div id="demoCatalogueBoiteLuminositeMur" class="demoCatalogueBoite">
                                  <img src="../images/Offres/detecteur_luminosite_mur.jpg" alt="Capteur de luminosité mural">
                                  <p>Capteur de luminosité mural - XX euros</p>
                              </div>
                              <div id="demoCatalogueBoiteDetecteurLuminositePresencePlafond" class="demoCatalogueBoite">
                                  <img src="../images/Offres/detecteur_luminosité_presence_plafond.jpg" alt="Detecteur luminosité présence plafond">
                                  <p>Détecteur de luminosité et de présence (plafond) - XX euros</p>
                              </div>
                              <div id="demoCatalogueBoiteDetecteurMouvementLumierePresenceMur" class="demoCatalogueBoite">
                                  <img src="../images/Offres/detecteur_mouvement_lumiere_presence_mur.jpg" alt="Détecteur de mouvements/luminosité/présence mural">
                                  <p>Détecteur de mouvements /luminosité /présence mural - XX euros</p>
                              </div>
                              <div id="demoCatalogueBoiteDetecteurToutEn1" class="demoCatalogueBoite">
                                  <img src="../images/Offres/detecteur_temperature_humidite_luminosite_mouvement.jpg" alt="Détecteur tout en 1">
                                  <p>Détecteur de température /humidité /luminosité /mouvement - XX euros</p>
                              </div>
                          </div>
                        </div>
            <!--    Footer    -->
            <?php include("footer.php"); ?>


        </div>

    </body>
</html>
