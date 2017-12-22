<?php
session_start();
setcookie('identifiant','', time() - 3600 );
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>
