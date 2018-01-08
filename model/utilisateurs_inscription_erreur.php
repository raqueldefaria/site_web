<?php

function cookie_username_temp(){
  if (isset($_POST['pseudo']))
  {
    setcookie('username_temp',$_POST['pseudo'], time() + 300, "/site_web", "localhost", false, true);
  }
}

function cookie_firstname_temp(){
  if (isset($_POST['prenom']))
  {
    setcookie('firstname_temp',$_POST['prenom'], time() + 300, "/site_web", "localhost", false, true);
  }
}

function cookie_lastname_temp(){
  if (isset($_POST['nom']))
  {
    setcookie('lastname_temp',$_POST['nom'], time() + 300, "/site_web", "localhost", false, true);
  }
}

?>
