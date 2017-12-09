<?php

/* ------------------- BDD ------------------- */
try{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}


/* ------------------- Adding user to the Database ------------------- */

$insertUser = $bdd->prepare('INSERT INTO Utilisateur(utilisateur_login, utilisateur_motDePasse, utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance, 	utilisateur_mail)
                            VALUES(?, ?, ?, ?, ?, ?)');

$insertUser->execute(array(
	$_POST['pseudo'],
	$_POST['mdp'],
	$_POST['prenom'],
	$_POST['nom'],
	$_POST['dateNaissance'],
	$_POST['mail']
	));

$insertLogement = $bdd->prepare('INSERT INTO Logement(logement_adresse, logement_codePostal, logement_ville, logement_pays)
                                VALUES(?, ?, ?, ?)');
$insertLogement->execute(array(
  $_POST['adresse'],
  $_POST['codePostal'],
  $_POST['ville'],
  $_POST['pays']
  ));

//$bdd->exec('INSERT INTO utilisateur(utilisateur_login, utilisateur_motDePasse, utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance, 	utilisateur_mail)
//VALUES(\'Battlefield 1942\', \'Patrick\', \'PC\', \'hi\', 50, \'r@gmail.com\')');

//header('Location : ../../view/interface/accueil.php')

//echo "All right";

echo $_POST['pseudo'];
echo $_POST['mdp'];
echo $_POST['prenom'];
echo $_POST['nom'];
echo $_POST['dateNaissance'];
echo $_POST['mail'];




?>
