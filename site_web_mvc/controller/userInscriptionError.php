<?php

//fonctions créant les cookies temporaires pour pré-remplir les champs d'inscription s'il y a eu une erreur
function cookie_username_temp(){
  if (isset($_POST['pseudo']))
  {
    setcookie('username_temp',$_POST['pseudo'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_firstname_temp(){
  if (isset($_POST['prenom']))
  {
    setcookie('firstname_temp',$_POST['prenom'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_lastname_temp(){
  if (isset($_POST['nom']))
  {
    setcookie('lastname_temp',$_POST['nom'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_mail_temp(){
  if (isset($_POST['mail']))
  {
    setcookie('mail_temp',$_POST['mail'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_adress_temp(){
  if (isset($_POST['adresse']))
  {
    setcookie('adress_temp',$_POST['adresse'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_codepostal_temp(){
  if (isset($_POST['codePostal']))
  {
    setcookie('codepostal_temp',$_POST['codePostal'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_city_temp(){
  if (isset($_POST['ville']))
  {
    setcookie('city_temp',$_POST['ville'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

function cookie_country_temp(){
  if (isset($_POST['pays']))
  {
    setcookie('country_temp',$_POST['pays'], time() + 300, "/tests/site_web/site_web_mvc", "localhost", false, true);
  }
}

// on appellera cette fonction à chaque erreur lors de la tentative d'inscription pour pré-remplir les champs lors d'un nouvel essai
function pre_fill(){
  cookie_username_temp();
  cookie_firstname_temp();
  cookie_lastname_temp();
  cookie_mail_temp();
  cookie_adress_temp();
  cookie_codepostal_temp();
  cookie_city_temp();
  cookie_country_temp();
}

?>
