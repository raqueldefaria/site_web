<!DOCTYPE html>
<html>

  <head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/inscription.css" />
    <link rel="stylesheet" href="../css/connexion.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />

    <title>DomOnline - Inscription</title>

  </head>

  <body>

  <!--*************** Header ***************-->
  <?php include ("header.php")?>

  <!--*************** Corps ***************-->
  <div class="corps">
    <form method="post" action="../../controller/inscription.php">
        <p>
          <div class="table" >

            <table>
              <tr>
                <td>
                <input type="text" name="pseudo" id="pseudo" size=35 placeholder="Identifiant" value="<?php if (isset($_COOKIE['username_temp'])){echo $_COOKIE['username_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                <input type="password" name="mdp" id="mdp" size=35 placeholder="Mot de passe" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="password" name="mdp2" id="mdp" size=35 placeholder="Confirmez le mot de passe" />
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
                  <input type="text" name="prenom" id="prenom" size=35 placeholder="Prénom" value="<?php if (isset($_COOKIE['firstname_temp'])){echo $_COOKIE['firstname_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="nom" id="nom" size=35 placeholder="Nom" value="<?php if (isset($_COOKIE['lastname_temp'])){echo $_COOKIE['lastname_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="date" name="dateNaissance" id="dateNaissance" size=35 placeholder="Date de naissance" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="email" name="mail" id="mail" size=35 placeholder="Mail" value="<?php if (isset($_COOKIE['mail_temp'])){echo $_COOKIE['mail_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="adresse" id="adresse" size=35 placeholder="Adresse" value="<?php if (isset($_COOKIE['adress_temp'])){echo $_COOKIE['adress_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="codePostal" id="codePostal" size=35 placeholder="Code Postal" value="<?php if (isset($_COOKIE['codepostal_temp'])){echo $_COOKIE['codepostal_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="ville" id="ville" size=35 placeholder="Ville" value="<?php if (isset($_COOKIE['city_temp'])){echo $_COOKIE['city_temp'];} ?>"/>
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="pays" id="pays" size=35 placeholder="Pays" value="<?php if (isset($_COOKIE['country_temp'])){echo $_COOKIE['country_temp'];} ?>"/>
                </td>
              </tr>
            </table>
            </div>
            <input type="submit" value="Envoyer" class="boutton" />
            <?php
              if($_GET['erreur']==1)
              {
            ?>
                <p><span class="msg_erreur">Vous n'avez pas rempli tous les champs</span></p>
            <?php
              }
              elseif($_GET['erreur']==2)
              {
            ?>
                <p><span class="msg_erreur">Vous n'avez pas tapé le même mot de passe dans les deux champs</span></p>
            <?php
              }
              elseif($_GET['erreur']==3)
              {
            ?>
                <p><span class="msg_erreur">Le login que vous avez choisi est déjà utilisé</span></p>
            <?php
              }
              elseif($_GET['erreur']==4)
              {
            ?>
                <p><span class="msg_erreur">L'adresse mail que vous avez choisi est déjà utilisée</span></p>
            <?php
              }
            ?>
        </p>


    </form>
  </div>

  <!--*************** Footer ***************-->
  <?php include ("footer.php")?>
  </body>
</html>
