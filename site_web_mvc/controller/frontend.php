<?php

session_start();

// Charging classes
require_once('model/HousingManager.php');
require_once('model/UserManager.php');
require_once('model/RoomManager.php');
require_once('model/SensorManager.php');
require_once('model/CemacManager.php');

function gettingHeader(){
    if (isset($_SESSION['userID'])) {
        ?>
        <?php ob_start(); ?>
        <link rel="stylesheet" href="public/css/headerbis.css" />
        <?php $styleHeader = ob_get_clean(); ?>

        <?php ob_start(); ?>
        <header>
            <div id="header">
                <div class="logo">
                    <a href="index.php"><img src="public/images/logodomonline.png" alt="Logo du site" id="logoCompanyHeader"></a>
                </div>
                <nav class="menu">
                    <a href="index.php?action=goToTeam" class="txtHeader1"> Notre équipe </a>
                    <a href="index.php?action=goToOffers" class="txtHeader2"> Nos offres </a>
                    <a href="index.php?action=contact" class="txtHeader3"> Nous contacter </a>
                </nav>
                <div class="bouttons">
                    <div class="bouton_profil" id="boutonProfil">
                        <div class="prenom_nom">
                            <?php echo $_SESSION['login'] ; ?>
                        </div>
                        <div class="avatar">
                            <img id="avatar" src="public/images/585e4beacb11b227491c3399.png" />
                        </div>
                        <div class="dropdown_content">
                            <a href="index.php?action=goToProfile">Profil</a>
                            <a href="index.php?action=goToHousing">Logements</a>
                        </div>
                    </div>
                    <div class="seConnecter">
                        <a href="index.php?action=logOut" id="boutonSeDeconnecter"> Se Déconnecter </a>
                    </div>
                </div>
            </div>
        </header>
        <?php $header = ob_get_clean(); ?>
        <?php
    } else {
        ?>
        <?php ob_start(); ?>
        <link rel="stylesheet" href="public/css/header.css" />
        <?php $styleHeader = ob_get_clean(); ?>
        <?php ob_start(); ?>
        <header>
            <div id="header">
                <div class="logo">
                    <a href="index.php"><img src="public/images/logodomonline.png" alt="Logo du site" id="logoCompanyHeader"></a>
                </div>
                <nav class="menu">
                    <a href="index.php?action=goToTeam" class="txtHeader1"> Notre équipe </a>
                    <a href="index.php?action=goToOffers" class="txtHeader2"> Nos offres </a>
                    <a href="index.php?action=contact" class="txtHeader3"> Nous contacter </a>
                </nav>
                <div class="bouttons">
                    <div class="inscrire">
                        <a href="index.php?action=goToRegister" id="boutoninscrire"> Inscription </a>
                    </div>
                    <div class="seConnecter">
                        <a href="index.php?action=goToLogIn" id="boutonSeConnecter"> Se connecter </a>
                    </div>
                </div>
            </div>
        </header>
        <?php $header = ob_get_clean(); ?>
        <?php
    }
    $headerList = array($styleHeader,$header);
    return ($headerList);
}


function homepage(){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    require("view/frontend/accueil.php");
}


function register($error){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Inscription
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <div class="corps">
        <form action="index.php?action=register" method="post">
            <p>
            <div class="table" >

                <table>
                    <tr>
                        <td>
                            <input type="text" name="pseudo" id="pseudo" size=35 placeholder="Identifiant"required />
                            <span id="missPseudo"></span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="mdp" id="mdp" size=35 placeholder="Mot de passe" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="password" name="mdp2" id="mdp2" size=35 placeholder="Confirmez le mot de passe" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <select name="type" id="type" placeholder="Type d'utilisateur">
                                <option value="particulier">Particulier</option>
                                <option value="gestionnaire">Gestionnaire</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="prenom" id="prenom" size=35 placeholder="Prénom" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="nom" id="nom" size=35 placeholder="Nom" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="date" name="dateNaissance" id="dateNaissance" size=35 placeholder="Date de naissance" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="email" name="mail" id="mail" size=35 placeholder="Mail"  required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="adresse" id="adresse" size=35 placeholder="Adresse" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="codePostal" id="codePostal" size=35 placeholder="Code Postal" required />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="ville" id="ville" size=35 placeholder="Ville" required/>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <input type="text" name="pays" id="pays" size=35 placeholder="Pays" required />
                        </td>
                    </tr>
                </table>
            </div>
            <input type="submit" value="Envoyer" class="boutton" id="boutonenvoi"  />

            </p>
            <?php
            if ($error!=null) {
                ?>
                <?= $error ?>
                <?php
            } ?>
        </form>
    </div>

    <script>
        var formValid = document.getElementById('boutonenvoi');
        var prenom = document.getElementById('identifiant');
        var missPrenom = document.getElementById('missPseudo');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide
            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missPseudo.textContent = 'login manquant';
                missPseudo.style.color = 'red';
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missP.style.color = 'red';

            }else{
            }

        }
    </script>
    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template.php");
}


function logIn($error){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Connexion
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <div class="corps">

        <form method="post" action="index.php?action=logIn">
            <p>
                <input type="text" name="pseudo" id="identifiant" placeholder="Identifiant" size="30" maxlength="20" value="<?php if (isset($_COOKIE['username'])) {
        echo $_COOKIE['username'];
    } ?>" required /> <br />
                <span id="missIdentifiant"></span>
                <br />
                <input type="password" name="mdp" id="mdp" placeholder="Mot de passe" size="30" maxlength="20" required/><br />
            <div id="box">
                <label for="boxSouvenir" id="souvenir">Se souvenir de moi</label> <input type="checkbox" checked name="souvenir" id="boxSouvenir" /> <br />
                <input type="submit" value="Se connecter" class="boutton" id="bouton_envoi" />
            </div>
            <a href="index.php?action=goToForgottenPassword" id="mdpOublie"> Mot de passe oublié </a>
            </p>
            <?php
            if ($error!=null) {
                ?>
                <?= $error ?>
                <?php
            } ?>

        </form>

    </div>
    <script>
        var formValid = document.getElementById('bouton_envoi');
        var prenom = document.getElementById('identifiant');
        var missPrenom = document.getElementById('missIdentifiant');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;




        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide

            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missIdentifiant.textContent = 'login manquant';
                missIdentifiant.style.color = 'red';
            }
            else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missIdentifiant.style.color = 'red';

            }
            else{
            }

        }
    </script>
    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template.php");
}


function logOut(){
    setcookie('username', '', time() - 36000, "/site_web", "localhost", false, true);
    $_SESSION = array();
    session_destroy();
}


function showTeam(){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    require("view/frontend/equipe.php");
}

function showOffers(){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    require("view/frontend/offres.php");
}

function contact(){
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1];
    require("view/frontend/contact.php");
}

function profile()
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Profil
    <?php $title = ob_get_clean(); ?>
    <?php
    $user = new UserManager();
    $userInfo = $user->showAllInfo();
    $housing = new HousingManager();
    $housingInfo = $housing->showAllInfo(); ?>

    <?php ob_start(); ?>
    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">

         <div align="center">
          <h2>Votre profil</h2>

          <table>
          <tr>
             <td align="right">
                <strong> Pseudo </strong> :
             </td>
             <td>
                <?php echo $userInfo['utilisateur_login']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Mail </strong> :
             </td>
             <td>
                <?php echo $userInfo['utilisateur_mail']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Prénom </strong> :
             </td>
             <td>
                <?php echo $userInfo['utilisateur_prenom']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nom </strong> :
             </td>
             <td>
                <?php echo $userInfo['utilisateur_nom']; ?>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Type </strong> :
             </td>
             <td>
                <?php echo $userInfo['utilisateur_type']; ?>
             </td>
          </tr>
        </table>
        </div>

    <?php
    for ($it=0; $it<sizeof($housingInfo); $it++) {
        ?>

        <div align="center">
        <h2>Logement <?php echo $it+1; ?> </h2>

        <table>
          <tr>
              <td align="right">
                <strong> Adresse </strong> :
              </td>
              <td>
                <?php echo $housingInfo[$it]['logement_adresse']; ?>
              </td>
          </tr>
          <tr>
              <td align="right">
                <strong> Ville </strong> :
             </td>
              <td>
                <?php echo $housingInfo[$it]['logement_ville']; ?>
              </td>
          </tr>
          <tr>
              <td align="right">
                <strong> Code postal </strong> :
              </td>
              <td>
                <?php echo $housingInfo[$it]['logement_codePostal']; ?>
              </td>
          </tr>
          <tr>
              <td align="right">
                <strong> Pays </strong> :
              </td>
              <td>
                <?php echo $housingInfo[$it]['logement_pays']; ?>
              </td>
          </tr>
        </table>
        </div>
      <?php
    } ?>

       <br/>

       <br/>
       <a href="index.php?action=goToEditProfile"> Editer mon profil </a>
       <br/>
       <a href="index.php?action=logOut"> Se déconnecter </a>

      </div>
    </div>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template.php");
}

function goToEditProfile($error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
  <?php ob_start(); ?>
  Edition du profil
  <?php $title = ob_get_clean(); ?>
  <?php
  $user = new UserManager();
    $userInfo = $user->showAllInfo(); ?>
  <?php ob_start(); ?>
  <div id="corps">

      <div id="main_block">

       <div align="center">
        <h2>Éditer votre profil</h2>

        <form method="POST" action="index.php?action=editProfile">

          <table>
          <tr>
             <td align="right">
                <strong> Pseudo </strong> :
             </td>
             <td>
               <input type="text" placeholder="Pseudo" id="newpseudo" name="newpseudo" value="<?php echo $userInfo['utilisateur_login']; ?>" required />
                 <span id="missPseu"></span>
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Mail </strong> :
             </td>
             <td>
               <input type="mail" placeholder="Mail" id="newmail" name="newmail" value="<?php echo $userInfo['utilisateur_mail']; ?>" required />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Prénom </strong> :
             </td>
             <td>
               <input type="text" placeholder="Prénom" id="newprenom" name="newprenom" value="<?php echo $userInfo['utilisateur_prenom']; ?>" required />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nom </strong> :
             </td>
             <td>
               <input type="text" placeholder="Nom" id="newnom" name="newnom" value="<?php echo $userInfo['utilisateur_nom']; ?>" required />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Mot de passe actuel </strong> :
             </td>
             <td>
               <input type="password" placeholder="Mot de passe actuel" id="mdpactuel" name="mdpactuel" required />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Nouveau mot de passe </strong> :
             </td>
             <td>
               <input type="password" placeholder="Nouveau mot de passe" id="newmdp1" name="newmdp1" required />
             </td>
          </tr>
          <tr>
             <td align="right">
                <strong> Confirmer nouveau mot de passe </strong> :
             </td>
             <td>
               <input type="password" placeholder="Nouveau mot de passe" id="newmdp2" name="newmdp2" required />
             </td>
          </tr>
        </table>

        <br />
        <input type="submit" value="Mettre à jour mon profil !" class="boutton" id="bouenvoie"/>

      </form>

        <?php
        $housing = new HousingManager();
    $housingInfo = $housing->showAllInfo();
    for ($it=0; $it<sizeof($housingInfo); $it++) {
        ?>
        <h2>Logement <?php echo $it+1; ?> </h2>

        <form method="POST" action="index.php?action=editProfile">

        <table>
          <tr>
            <td align="right">
               <strong> Adresse </strong> :
            </td>
            <td>
              <input type="text" placeholder="Adresse" id="newadresse" name="newadresse" value="<?php echo $housingInfo[$it]['logement_adresse']; ?>" required />
            </td>
          </tr>
          <tr>
            <td align="right">
               <strong> Ville </strong> :
            </td>
            <td>
              <input type="text" placeholder="Ville" id="newville" name="newville" value="<?php echo $housingInfo[$it]['logement_ville']; ?>" required />
            </td>
          </tr>
          <tr>
            <td align="right">
               <strong> Code postal </strong> :
            </td>
            <td>
              <input type="text" placeholder="Code postal" id="newcodePostal" name="newcodePostal" value="<?php echo $housingInfo[$it]['logement_codePostal']; ?>" required/>
            </td>
          </tr>
          <tr>
            <td align="right">
               <strong> Pays </strong> :
            </td>
            <td>
              <input type="text" placeholder="Pays" id="newpays" name="newpays" value="<?php echo $housingInfo[$it]['logement_pays']; ?>" required />
            </td>
          </tr>

              <input type="hidden" placeholder="idlogement" id="idlogement" name="idlogement" value="<?php echo $housingInfo[$it]['id_Logement']; ?>" required />

        </table>

        <br />
        <input type="submit" value="Mettre à jour mon logement !" class="boutton" id="bouenvoie"/>

        </form>

        <?php
    } ?>


     </div>

          <br />
          <a href="index.php?action=goToProfile"> Retourner à mon profil </a>
          <br />
          <a href="index.php?action=logOut"> Se déconnecter </a>


      </div>


  </div>
  <!--************** script **************-->
  <script>
    var formValid = document.getElementById('bouenvoi');
    var prenom = document.getElementById('Pseudo');
    var missPrenom = document.getElementById('missPseu');
    var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

    formValid.addEventListener('click', validation);

    function validation(event){
        //Si le champ est vide

        if (identifiant.validity.valueMissing){
            event.preventDefault();
            missPseu.textContent = 'login manquant';
            missPseu.style.color = 'red';
        }else if (identifiantValid.test(identifiant.value) == false){
            event.preventDefault();
            missPrenom.textContent = 'Format incorrect';
            missP.style.color = 'red';

        }else{
        }

    }
    </script>
    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>
  <?php $content = ob_get_clean(); ?>
  <?php
  require("view/frontend/template.php");
}

function editProfile(){

}


function housing($idUser, $error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>

    <?php ob_start(); ?>
    Logements
    <?php $title = ob_get_clean(); ?>

    <?php ob_start(); ?>
    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>

    <!--************** Pop js **************-->
    <div id="addLogement" class="parentDisable">
        <div class="addLogementOptions" >
            <form method="post" id="addLogementForm" action="index.php?action=addHousing" >
                <p>Ajouter un logement :</p>
                <input type="text" name="adresse" id="adresse" size=35 placeholder="Adresse" required/>
                <span id="missAdresse"></span>
                <input type="text" name="codePostal" id="codePostal" size=35 placeholder="Code Postal" required/>
                <input type="text" name="ville" id="ville" size=35 placeholder="Ville" required />
                <input type="text" name="pays" id="pays" size=35 placeholder="Pays" required/>
                <script type="application/javascript" src="public/js/showOrHidePopUp.js"></script>
                <input value="Ajouter" type="submit"id="boutenvoi" onclick="hide('addLogement'); event.preventDefault(); addHousing(<?php echo $_SESSION['userID']?>);">
                <input value="Fermer" type="submit" onclick="return hide('addLogement') ">
            </form>
        </div>
    </div>

    <div id="editLogementPopContainer"></div> <!-- Dans ce div on écrit grace à Js tous les codes html de popups (comme celui ci-dessus) servant à éditer un logement -->


    <!--************** script **************-->
    <script>
        var formValid = document.getElementById('boutenvoi');
        var adress = document.getElementById('adresse');
        var missAdress= document.getElementById('missAdresse');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide

            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missAdresse.textContent = 'Adresse manquante';
                missAdresse.style.color = 'red';
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missAdress.textContent = 'Format incorrect';
                missP.style.color = 'red';

            }else{
            }

        }
    </script>

    <!--************** Navigation **************-->
    <div class="pieces">
        <div class="sectionPieces">
            <p class="motPiece"><?= $title ?></p>
            <a href="#"><img src="public/images/client/question.png" class="questions"></a>
        </div>
        <div id="overflow">
            <div class="optionPieces" id="logements">
                <!-- displaying logements from Db if javascript is not enabled

                <a href="#" onclick="return pop('addLogement') " >
                    <div class="section">
                        <img src="public/images/client/add.png" class="addButton">
                        <p>Ajouter</p>
                    </div>
                </a>-->
            </div>
        </div>
    </div>

    <script>
        showHousingsFromDb(<?= $idUser ?>)
    </script>
    <script>
      writePopUpsLogements(<?= $idUser ?>)
    </script>

    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template2.php");
}


function room($idUser, $idHousing, $error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Pieces
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>

    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>
    <!--************** Pop js **************-->
    <div id="addPiece" class="parentDisable">
        <div class="addPieceOptions" >
            <form method="post" id="addPieceForm" action="index.php?action=addRoom&id=<?php echo $idHousing?>" >
                <p>Type de pièce : <select name="piece">
                        <option value="Garage">Garage</option>
                        <option value="Chambre">Chambre</option>
                        <option value="Cuisine">Cuisine</option>
                        <option value="Bureau">Bureau</option>
                        <option value="Salle De Bain">Salle de bain</option>
                        <option value="Toilettes">Toilettes</option>
                        <option value="Salon">Salon</option>
                        <option value="autre">Autre</option>
                    </select></p>
                <p> Nom de la pièce : <input type="text" name="nomPiece" id="nomPiece" required></p>
                <span id="missnomPiece"></span>
                <input value="Ajouter" type="submit" id="boutonAjout" onclick="hide('addPiece'); event.preventDefault(); addRoom(<?php echo $_SESSION['userID']?>, <?php echo $idHousing?>);">
                <input value="Fermer" type="submit" onclick="return hide('addPiece')" >
            </form>
        </div>
    </div>

        <div id="editPiecePopContainer"></div> <!-- Dans ce div on écrit grace à Js tous les codes html de popups (comme celui ci-dessus) servant à éditer une piece -->


    <!--************** Script**************-->
    <script>
        var formValid = document.getElementById('boutonAjout');
        var prenom = document.getElementById('nomPiece');
        var missPrenom = document.getElementById('missnomPiece');
        var prenomValid = /^[a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+([-'\s][a-zA-ZéèîïÉÈÎÏ][a-zéèêàçîï]+)?$/;

        formValid.addEventListener('click', validation);

        function validation(event){
            //Si le champ est vide

            if (identifiant.validity.valueMissing){
                event.preventDefault();
                missnomPiece.textContent = 'Nom pièce manqunat';
                missnomPiece.style.color = 'red';
            }else if (identifiantValid.test(identifiant.value) == false){
                event.preventDefault();
                missPrenom.textContent = 'Format incorrect';
                missP.style.color = 'red';

            }else{
            }

        }
    </script>

    <!--************** Navigation **************-->
    <div class="pieces">
        <div class="sectionPieces">
            <p class="motPiece"><?= $title ?></p>
            <a href="#"><img src="public/images/client/question.png" class="questions"></a>
        </div>
        <div id="overflow">
            <div class="optionPieces" id="pieces">
                <!-- displaying logements from Db if javascript is not enabled


                <a href="#" onclick="return pop('addLogement') " >
                    <div class="section">
                        <img src="public/images/client/add.png" class="addButton">
                        <p>Ajouter</p>
                    </div>
                </a>-->


            </div>
        </div>
    </div>

    <script>
        showRoomsFromDb(<?= $idUser?>,<?= $idHousing ?>)
    </script>
    <script>
      writePopUpsPieces(<?= $idUser?>, <?= $idHousing ?>)
    </script>

    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template2.php");
}

function sensor($idRoom, $error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Capteurs/actionneurs
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <?php
    if ($error!=null) {
        ?>
        <?= $error ?>
        <?php
    } ?>
    <!--************** Graphique **************-->
    <div id="chartDiv" class="parentDisable">
        <div class="chart" >
            <canvas id="chart"></canvas>
            <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.1/Chart.min.js"></script>-->
            <script src="script/node_modules/chart.js/dist/Chart.js"></script>
            <script src="public/js/showChart.js"></script>
            <input value="Fermer" type="submit" onClick="return hide('chartDiv')">
        </div>
    </div>

    <div id="addCapteurs" class="parentDisable">
        <div class="addPieceOptions" >
            <form method="post" action="index.php?action=addSensor&id=<?php echo $idRoom?>" >
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
                <input value="Ajouter" type="submit" onclick="addSensor(<?php echo $idRoom?>); event.preventDefault(); hide('addCapteurs'); ">
                <input value="Fermer" type="submit" onclick="return hide('addCapteurs')">
            </form>
        </div>
    </div>


    <!--------------- Navigation --------------->
    <div class="pieces">
        <div class="sectionPieces">
            <p class="motPiece">Capteurs/actionneurs</p>
            <a href="#"><img src="public/images/client/question.png" class="questions"></a>
        </div>

        <div id="overflow">
            <div class="optionPieces" id="capteursActionneurs"></div>

            <!--<p class="motPiece">Scénario :</p>
            <div id="menu">
                <ul id="onglets">
                    <li class="active"><a href=""> Chauffage </a></li>
                    <li><a href=""> Volets </a></li>
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
                <a href="" ><img src="public/images/add.png" /></a>
                <a href="" ><img src="public/images/error.png" /></a>
            </div>-->
            <?php include("view/frontend/scenario.php")?>
        </div>

    </div>
    <script>
        showSensorsFromDb(<?=$idRoom?>)
    </script>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template2.php");
}


function showAllSensorsAndActuators($idUser)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Tous les capteurs et actionneurs
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <!--************** Graphique **************-->
    <div id="chartDiv" class="parentDisable">
        <div class="chart" >
            <canvas id="chart"></canvas>
            <script src="public/js/chart.js"></script>
            <input value="Fermer" type="submit" onClick="return hide('chartDiv')">
        </div>
    </div>

    <!--************** Navigation **************-->

    <div class="pieces">
        <div class="sectionPieces">
            <p class="motPiece">Tous les capteurs et actionneurs</p>
            <a href="#"><img src="public/images/client/question.png" class="questions"></a>
        </div>
        <div id="sensorsList">
            <table>
                <tr>
                    <th>Capteurs/actionneurs</th>
                    <th>Type</th>
                    <th>Pièce</th>
                    <th>Logement</th>
                    <th>Statistiques</th>
                </tr>
                <?php include("model/showAllSensors.php") ?>
            </table>
        </div>

    </div>
    <script src="script/node_modules/chart.js/dist/Chart.js"></script>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template2.php");
}

function alarm($idUser)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Contrôle de l'alarme
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <!--------------- Navigation --------------->
    <div class="pieces">
        <div class="sectionPieces">
            <p class="motPiece">Contrôle de l'alarme</p>
            <a href="#"><img src="public/images/client/question.png" class="questions"></a>
        </div>

        <p style="font-size: large">Etat Actuel : <img src="public/images/checked.png"></p>
        <p style="font-size: large">Historique des pannes : </p>
        <div id="sensorsList">
            <table>
                <tr>
                    <th>Type de panne</th>
                    <th>Date de la panne</th>
                    <th>Capteur/actionneur</th>
                    <th>Type</th>
                    <th>Pièce</th>
                    <th>Logement</th>
                </tr>
                <?php include("model/failures.php") ?>
            </table>
        </div>



    </div>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template2.php");
}

function forgottenPassword($error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Mot de passe oublié
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <div class="corps">

        <form method="post" action="index.php?action=forgottenPassword">
            <p>
                <h3>Mot de passe oublié ?</h3>
                <p> Pas de panique ! Nous vous enverrons un nouveau mot de passe sur l'adresse mail associé à votre compte. </p>
                <label for="mail_recup"> Votre mail :</label>
                <input type="email" name="mail_recup" id="mail_recup" required/>
                <input type="submit" value="Envoyer" required/>
            </p>
            <?php
            if ($error!=null) {
                ?>
                <?= $error ?>
                <?php
            } ?>

        </form>

    </div>
    <?php $content = ob_get_clean(); ?>

    <?php
    require("view/frontend/template.php");
}

function newPassword($tok, $error)
{
    $headerList = gettingHeader();
    $styleHeader = $headerList[0];
    $header = $headerList[1]; ?>
    <?php ob_start(); ?>
    Réinitialisation du mot de passe
    <?php $title = ob_get_clean(); ?>
    <?php ob_start(); ?>
    <div id="corps">
        <form method="post" action="index.php?action=changePassword&tok=<?php echo $tok?>">
            <p>
            <h3> Réinitialisation du mot de passe </h3>
            <table>
                <tr>
                    <td>
                        <label for="tok2"> Votre code :</label>
                    </td>
                    <td>
                        <input type="text" name="tok2" id="tok2" required/> <br />
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="pass_recup"> Nouveau mot de passe :</label>
                    </td>
                    <td>
                        <input type="password" name="pass_recup" id="pass_recup" required/> <br />
                    </td>
                </tr>

                <tr>

                    <td>
                        <label for="pass_recup2"> Confirmation du nouveau mot de passe : </label>
                    </td>
                    <td>
                        <input type="password" name="pass_recup2" id="pass_recup2" required/> <br />
                    </td>
                </tr>

                <td>
                    <input type="submit" value="Envoyer" />
                </td>

            </table>
            </p>

            <?php
            if ($error!=null) {
                ?>
                <?= $error ?>
                <?php
            } ?>

        </form>
    </div>
    <?php $content = ob_get_clean(); ?>
    <?php
    require("view/frontend/template.php");
}
