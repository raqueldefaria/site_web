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
    <form method="post" action="../../model/traitement_inscription.php">
        <p>
            <table>
              <tr>
                <td>
                <label for="pseudo">Pseudo</label> :
                </td>
                <td>
                <input type="text" name="pseudo" id="pseudo" />
                </td>
              </tr>
              <tr>
                <td>
                <label for="mdp">Mot de passe</label> :
                </td>
                <td>
                <input type="password" name="mdp" id="mdp" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="mdp2">Confirmez votre mot de passe</label> :
                </td>
                <td>
                  <input type="password" name="mdp2" id="mdp" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="type">Type d'utilisateur</label> :
                </td>
                <td>
                  <select name="type" id="type">
                   <option value="particulier">Particulier</option>
                   <option value="gestionnaire">Gestionnaire</option>
                   <option value="administrateur">Administrateur</option>
                 </select>
                </td>
              </tr>
              <tr>
                <td>
                  <label for="prenom">Prenom</label> :
                </td>
                <td>
                  <input type="text" name="prenom" id="prenom" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="nom">Nom</label> :
                </td>
                <td>
                  <input type="text" name="nom" id="nom" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="dateNaissance">Date de naissance</label> :
                </td>
                <td>
                  <input type="date" name="dateNaissance" id="dateNaissance" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="mail">Mail</label> :
                </td>
                <td>
                  <input type="email" name="mail" id="mail" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="adresse">Adresse</label> :
                </td>
                <td>
                  <input type="text" name="adresse" id="adresse" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="codePostal">Code Postal</label> :
                </td>
                <td>
                  <input type="text" name="codePostal" id="codePostal" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="ville">Ville</label> :
                </td>
                <td>
                  <input type="text" name="ville" id="ville" />
                </td>
              </tr>
              <tr>
                <td>
                  <label for="pays">Pays</label> :
                </td>
                <td>
                  <input type="text" name="pays" id="pays" />
                </td>
              </tr>
            </table>
            <input type="submit" value="Envoyer" class="boutton" />
        </p>


    </form>
  </div>

  <!--*************** Footer ***************-->
  <?php include ("footer.php")?>
  </body>
</html>
