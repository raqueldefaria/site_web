<?php

/* ------------------- BDD ------------------- */
try{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}


/* ------------------- Verifications ------------------- */


// login present dans la base de donnees
$loginDansBD = $bdd->query('SELECT login FROM utilisateurs')
while($donnees = $loginDansBD->fetch()){
  if ($donnees == $_POST['pseudo']){
    // veillez choisir un autre pseudo
    echo "Ce pseudo est deja utilise. Veillez choisir un autre pseudo"
  }
}

// mdp correctement tape
if ($_POST['mdp'] != $_POST['mdp2']){
  echo "Vous n'avez pas tape le meme mot de passe dans les 2 champs"
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);




/* ------------------- Adding user to the Database ------------------- */

$insertUser = $bdd->prepare('INSERT INTO utilisateur(utilisateur_login, utilisateur_motDePasse,
                                                    utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance,
                                                    utilisateur_mail)
                            VALUES(?, ?, ?, ?, ?, ?)');

$insertUser->execute(array(
	$_POST['pseudo'],
	$pass_hache,
	$_POST['prenom'],
	$_POST['nom'],
	$_POST['dateNaissance'],
	$_POST['mail']
	));

$insertUser->closeCursor();


$insertLogement = $bdd->prepare('INSERT INTO Logement(logement_adresse, logement_codePostal, logement_ville, logement_pays)
                                VALUES(?, ?, ?, ?)');
$insertLogement->execute(array(
  $_POST['adresse'],
  $_POST['codePostal'],
  $_POST['ville'],
  $_POST['pays']
  ));

$insertLogement->closeCursor();



//$bdd->exec('INSERT INTO utilisateur(id_Utilisateur,utilisateur_type, utilisateur_login, utilisateur_motDePasse, utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance, utilisateur_mail)
//VALUES(1,\'Battlefield 1942\',\'Battlefield 1942\', \'Patrick\', \'PC\', \'hi\', 50, \'r@gmail.com\')');

//header('Location : ../../view/interface/accueil.php')

//echo "All right";

echo $_POST['pseudo'];
echo $_POST['mdp'];
echo $_POST['prenom'];
echo $_POST['nom'];
echo $_POST['dateNaissance'];
echo $_POST['mail'];




?>
