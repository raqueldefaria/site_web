
<?php
  require('../../controller/adminmodifyController.php');
?>

<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8" />
        <link rel="stylesheet" href="../css/editionProfil.css" />
        <link rel="stylesheet" href="../css/headerbis.css" />
        <link rel="stylesheet" href="../css/footer.css" />
        <title> DomOnline - Profil </title>
    </head>


    <body>

    <?php include("headerbis.php"); ?>

    <!-- Le corps -->
    <div id="corps">

        <div id="main_block">

         <div align="center">
          <h2>Éditer votre profil</h2>

          <form method="POST" action="adminmodifyView.php?modify=<?php echo $_GET['modify']; ?>">

            <table>
            <tr>
               <td align="right">
                  <strong> Pseudo </strong> :
               </td>
               <td>
                 <input type="text" placeholder="Pseudo" id="newpseudo" name="newpseudo" value="<?php echo $user['utilisateur_login']; ?>" required />
                   <span id="missPseu"></span>
               </td>
            </tr>
            <tr>
               <td align="right">
                  <strong> Mail </strong> :
               </td>
               <td>
                 <input type="mail" placeholder="Mail" id="newmail" name="newmail" value="<?php echo $user['utilisateur_mail']; ?>" required />
               </td>
            </tr>
            <tr>
               <td align="right">
                  <strong> Prénom </strong> :
               </td>
               <td>
                 <input type="text" placeholder="Prénom" id="newprenom" name="newprenom" value="<?php echo $user['utilisateur_prenom']; ?>" required />
               </td>
            </tr>
            <tr>
               <td align="right">
                  <strong> Nom </strong> :
               </td>
               <td>
                 <input type="text" placeholder="Nom" id="newnom" name="newnom" value="<?php echo $user['utilisateur_nom']; ?>" required />
               </td>
            </tr>

          </table>

          <br />
          <input type="submit" value="Mettre à jour mon profil !" class="boutton" id="bouenvoie"/>

        </form>

          <?php
          show_logements();
          ?>

       <?php if(isset($msg)) { echo $msg; } ?>

       </div>

            <br />
            <a href="adminView.php"> Retourner à la page d'administration </a>
            <br/>
            <p> </p>
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
              erreur = true
          }else if (identifiantValid.test(identifiant.value) == false){
              event.preventDefault();
              missPrenom.textContent = 'Format incorrect';
              missP.style.color = 'red';

          }else{
          }

      }








    <?php include("footer.php"); ?>
