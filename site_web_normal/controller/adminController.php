<?php

session_start();

/* ------------------- BDD ------------------- */
require("../../model/adminModel.php");

/* ------------------- Redirection si l'utilisateur
              n'est pas connecté ------------------- */
if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

/* ------------------- Redirection si l'utilisateur
              n'est pas un admin ------------------- */
if($userinfo['utilisateur_type'] != 'admin')
{
  header("Location: accueil.php");
}

/* ------------------- Suppression d'un client si demandé ------------------- */
if(isset($_GET['delete']) AND !empty($_GET['delete']))
{
  $id = $_GET['delete'];
  deleteuser($id);
  header("Location: adminView.php");
}

/* ------------------- Affichage des clients dans un tableau ------------------- */
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
