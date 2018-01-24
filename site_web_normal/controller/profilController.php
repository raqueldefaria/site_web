<?php

/* ------------------- BDD ------------------- */
require("../../model/profilModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

/* ------------------- Affichage d'un message si le profil a été édité ------------------- */
$msg = htmlspecialchars($_GET['msg']) ;

if(isset($msg) AND !empty($msg))
{
  $msg = '<strong> Profil édité ! </strong>';
}

/* ------------------- Boucle d'affichage des logements ------------------- */
function show_logements()
{
  $data = table_logements();
  $count = 0;
  while($logements = $data->fetch())
  {
  $count++;
  ?>
  <div align="center">
  <h2>Logement <?php echo $count; ?> </h2>

  <table>
    <tr>
        <td align="right">
          <strong> Adresse </strong> :
        </td>
        <td>
          <?php echo $logements['logement_adresse']; ?>
        </td>
    </tr>
    <tr>
        <td align="right">
          <strong> Ville </strong> :
       </td>
        <td>
          <?php echo $logements['logement_ville']; ?>
        </td>
    </tr>
    <tr>
        <td align="right">
          <strong> Code postal </strong> :
        </td>
        <td>
          <?php echo $logements['logement_codePostal']; ?>
        </td>
    </tr>
    <tr>
        <td align="right">
          <strong> Pays </strong> :
        </td>
        <td>
          <?php echo $logements['logement_pays']; ?>
        </td>
    </tr>
  </table>
  </div>
  <?php
  }
}

?>
