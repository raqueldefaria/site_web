<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="../css/inscription.css" />
    <link rel="stylesheet" href="../css/connexion.css" />
    <link rel="stylesheet" href="../css/header.css" />
    <link rel="stylesheet" href="../css/footer.css" />

    <title>DomOnline - Inscription</title>
    <script src="../js/verifInscription.js"></script>

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
                        <input type="text" name="pseudo" id="pseudo" size=35 placeholder="Identifiant" />
                        <span id="missPseudo"></span>
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="mdp" id="mdp" size=35 placeholder="Mot de passe" />
                    </td>
                </tr>
                <tr>
                    <td>
                        <input type="password" name="mdp2" id="mdp2" size=35 placeholder="Confirmez le mot de passe" />
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
          erreur = true
      }else if (identifiantValid.test(identifiant.value) == false){
          event.preventDefault();
          missPrenom.textContent = 'Format incorrect';
          missPseudo.style.color = 'red';

      }else{
      }

  }
<!--*************** Footer ***************-->
<?php include ("footer.php")?>
</body>
</html>
