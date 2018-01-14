<?php

session_start();

/* ------------------- BDD ------------------- */
require("../../model/adminModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if($userinfo['utilisateur_type'] == 'particulier')
{
  header("Location: accueil.php");
}

?>
