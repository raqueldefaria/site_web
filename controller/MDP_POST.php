//Demande de l'adresse mail
//Sécurisation et verification de la validitée de l'adresse mail
//Correspondance avec une autre adresse mail de la bdd
//-si ok -> envoie un code par mail (mt_rand()*8)
//-BDD => table "récuperation" (id, mail, code)
// Stockage du mail dans $_SESSION['recupmail']
// stockage du code dans $_SESSION['recupcode']
//-Redirection vers la page d'entrée du code ($_GET['SECTION']='code')
//-checker correspondance mail dans la bdd
//-si ok > redirection vers la page de changement de mot de passe (+confirmation du mdp) ($_GET['SECTION']= 'mdpform')
//-Si les deux mot de passe correspondent => hashage en sha1() et enregistrement dans la bdd



<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site_web;charset=utf8', 'root', '');
	array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
//Verification existance de l'email sur la base de données
$req = $bdd->prepare('SELECT * FROM utilisateur WHERE utilisateur_mail = ?  AND utilisateur_mail_recup = ?');
$req->execute(array($_POST['mail'], $_POST['mail_recup']));

$mail = $_POST['mail'];
$mail_recup = $_POST['mail_recup'];

if ($mail == $mail_recup) {
	mail($mail, 'récuperation du mot de passe', 'Si ce n\'est pas vous qui vouliez récuperer votre mot de passe, ignorer ce mail. \n cliquer sur ce lien pour recuperer un nouveau mot de passe')
}
else
{
	echo "Ce mail n'existe pas.";
}

