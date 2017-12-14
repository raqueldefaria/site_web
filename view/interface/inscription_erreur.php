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
            <label for="pseudo">Identifiant</label> : <input type="text" name="pseudo" id="pseudo" /><br />
            <label for="mdp">Mot de passe</label> :  <input type="password" name="mdp" id="mdp" /><br />
            <label for="mdp2">Confirmez votre mot de passe</label> :  <input type="password" name="mdp2" id="mdp" /><br />
            <label for="type">Type d'utilisateur</label> : <select name="type" id="type">
              <option value="particulier">Particulier</option>
              <option value="gestionnaire">Gestionnaire</option>
            </select><br />
            <label for="prenom">Prénom</label> :  <input type="text" name="prenom" id="prenom" /><br />
            <label for="nom">Nom</label> :  <input type="text" name="nom" id="nom" /><br />
            <label for="dateNaissance">Date de naissance</label> :  <input type="date" name="dateNaissance" id="dateNaissance" /><br />
            <label for="mail">Mail</label> :  <input type="email" name="mail" id="mail" /><br />
            <label for="adresse">Adresse</label> :  <input type="text" name="adresse" id="adresse" /><br />
            <label for="codePostal">Code Postal</label> :  <input type="text" name="codePostal" id="codePostal" /><br />
            <label for="ville">Ville</label> :  <input type="text" name="ville" id="ville" /><br />
            <label for="pays">Pays</label> :  <input type="text" name="pays" id="pays" /><br />
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
              elseif($_GET['erreur']!=1 && $_GET['erreur']!=2 && $_GET['erreur']!=3 && $_GET['erreur']!=4)
              {
                header("Location:../interface/inscription.php");
              }
            ?>
        </p>


    </form>
  </div>

  <!--*************** Footer ***************-->
  <?php include ("footer.php")?>
  </body>
</html>
