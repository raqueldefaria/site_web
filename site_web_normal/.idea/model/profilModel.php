<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

   $requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
   $requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
   $userinfo = $requser->fetch();

function show_logements()
{
  require("../../model/connection_db.php");
  $data = $db->prepare('SELECT * from logement WHERE logement.id_Utilisateur = ? ');
  $data->execute(array($_SESSION['userID']));
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
