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
          <div class="table">

            <table>
              <tr>
                <td>
                <input type="text" name="pseudo" id="pseudo" size=35 placeholder="Pseudo" />
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
                  <input type="text" name="prenom" id="prenom" size=35 placeholder="Prénom" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="nom" id="nom" size=35 placeholder="Nom" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="date" name="dateNaissance" id="dateNaissance" size=35 placeholder="Date de naissance" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="email" name="mail" id="mail" size=35 placeholder="Mail" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="adresse" id="adresse" size=35 placeholder="Adresse" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="codePostal" id="codePostal" size=35 placeholder="Code Postal" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="ville" id="ville" size=35 placeholder="Ville" />
                </td>
              </tr>
              <tr>
                <td>
                  <input type="text" name="pays" id="pays" size=35 placeholder="Pays" />
                </td>
              </tr>
            </table>
            </div>
            <input type="submit" value="Envoyer" class="boutton" />

        </p>
    </form>
  </div>

  <!--*************** Footer ***************-->
  <?php include ("footer.php")?>
  </body>
</html>
