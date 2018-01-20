<?php

/* ------------------- BDD ------------------- */
require("../../model/profilModel.php");

if(!isset($_SESSION['userID']) AND empty($_SESSION['userID']))
{
  header("Location: connexion.php");
}

if(isset($_GET['msg']) AND !empty($_GET['msg']))
{
  $msg = '<strong> Profil édité ! </strong>';
}

?>
