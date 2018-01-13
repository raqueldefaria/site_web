<?php

/* ------------------- BDD ------------------- */
require("../../model/adminModel.php");

if(!isset($_SESSION['type']) AND empty($_SESSION['type']))
{
  header("Location: connexion.php");
}

if($_SESSION['type'] != 'gestionnaire')
{
  header("Location: accueil.php");
}

?>
