<?php

session_start();

/* ------------------- BDD ------------------- */
require("../../model/adminModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if($userinfo['utilisateur_type'] != 'admin')
{
  header("Location: accueil.php");
}

if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
  $id = $_GET['delete'];
  deleteuser($id);
  header("Location: adminView.php");
}

function userstable()
{
  $membres = getusers();
  while($users = $membres->fetch())
  {
  ?>
  <tr>
      <td> <?php echo $users['id_Utilisateur']; ?> </td>
      <td> <?php echo $users['utilisateur_type']; ?> </td>
      <td> <?php echo $users['utilisateur_login']; ?> </td>
      <td> <?php echo $users['utilisateur_prenom']; ?> </td>
      <td> <?php echo $users['utilisateur_nom']; ?> </td>
      <td> <a href="adminmodifyView.php?modify=<?php echo $users['id_Utilisateur']; ?>"> Modifier </a> </td>
      <td> <a href="adminView.php?delete=<?php echo $users['id_Utilisateur']; ?>"> Supprimer </a> </td>
  </tr>
  <?php
  }

}

?>
