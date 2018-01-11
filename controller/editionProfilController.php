
<?php
session_start();

/* ------------------- BDD ------------------- */
require("../../model/editionProfilModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}


?>
