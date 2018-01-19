<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();


function userstable()
{
  require("../../model/connection_db.php");
  $membres = $db->query('SELECT * FROM utilisateur');
  while($users = $membres->fetch())
  {
  ?>
  <tr>
      <td> <?php echo $users['id_Utilisateur']; ?> </td>
      <td> <?php echo $users['utilisateur_type']; ?> </td>
      <td> <?php echo $users['utilisateur_login']; ?> </td>
      <td> <?php echo $users['utilisateur_prenom']; ?> </td>
      <td> <?php echo $users['utilisateur_nom']; ?> </td>
      <td> <a href="adminView.php?modify=<?php echo $users['id_Utilisateur']; ?>"> Modifier </a> </td>
      <td> <a href="adminView.php?delete=<?php echo $users['id_Utilisateur']; ?>"> Supprimer </a> </td>
  </tr>
  <?php
  }

}

?>
