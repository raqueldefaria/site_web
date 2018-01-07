<?php
session_start();
setcookie('username','', time() - 36000, "/site_web", "localhost", false, true);
$_SESSION = array();
session_destroy();
header("Location: connexion.php");
?>
