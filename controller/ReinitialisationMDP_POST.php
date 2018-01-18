<?php
$tok = htmlspecialchars($_GET['tok']);
$tok2 = htmlspecialchars($_POST['tok2']);
$pass_recup = htmlspecialchars($_POST['pass_recup']);
$pass_recup2 = htmlspecialchars($_POST['pass_recup2']);

require("../model/connection_db.php");



$mail=$bdd->prepare("SELECT utilisateur_mail FROM utilisateur WHERE tok = ?");
$mail->execute(array($tok));
$getMail = $mail->fetch();

/*

$tok=$bdd->prepare("SELECT tok FROM utilisateur WHERE utilisateur_mail = ?");
$tok->execute(array($mail['utilisateur_mail']));
*/





if (!isset($tok2) OR $tok2 !== $tok)
	{
		echo "le code n'est pas valide";
	}
elseif (!isset($pass_recup2) OR !isset($pass_recup) OR $pass_recup2 !== $pass_recup)
	{
		echo "Veuillez rentrer tous les champs s'il vous plait";
	}
else
	{
		$tok = NULL;
		$updateTok = $bdd->prepare("UPDATE utilisateur SET tok = ? WHERE utilisateur_mail = ? ") or die(print_r($bdd->errorInfo()));
        $updateTok->execute(array($tok,$getMail['utilisateur_mail'])) or die(print_r($updateTok->errorInfo()));

		$updatePassword = $bdd->prepare('UPDATE utilisateur SET utilisateur_motDePasse = ? WHERE utilisateur_mail = ?') or die(print_r($bdd->errorInfo()));
		$updatePassword->execute(array($pass_recup,$getMail['utilisateur_mail'])) or die(print_r($updatePassword->errorInfo()));

		echo "le mot de passe a été changé avec succès.";
	}
?>
