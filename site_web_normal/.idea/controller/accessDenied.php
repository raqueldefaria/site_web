<?php

/* Ce fichier .php permet de rediriger l'utilisateur vers la page d'accueil s'il tente d'accéder à des certaines pages du sites en étant déjà connecté */

if (isset($_SESSION['nom']))
{
  header("Location:accueil.php");
}

?>
