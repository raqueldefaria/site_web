<?php

$reponse = $db->prepare('SELECT utilisateur_login, utilisateur_mail FROM utilisateur
                         WHERE utilisateur_login=:pseudo OR utilisateur_mail=:mail');

//or die(print_r($db->errorInfo()));

$reponse->bindParam(':pseudo', $pseudo);
$reponse->bindParam(':mail', $mail);

$prenom = htmlspecialchars($_POST['prenom']);
$nom = htmlspecialchars($_POST['nom']);
$pseudo = htmlspecialchars($_POST['pseudo']);
$mail = htmlspecialchars($_POST['mail']);
$reponse->execute();

$donnee = $reponse->fetch();

?>
