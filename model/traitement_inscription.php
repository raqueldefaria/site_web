<?php

/* ------------------- BDD ------------------- */
try{
  $bdd = new PDO('mysql:host=localhost;dbname=site_web;charset=utf8', 'root', '');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}


/* ------------------- Verifications ------------------- */

$erreur = true; //initialising value

// login present dans la base de donnees
$loginDansBD = $bdd->query('SELECT utilisateur_login FROM utilisateur');
while($donnees = $loginDansBD->fetch()){
  echo $donnees['utilisateur_login'];
  if ($donnees['utilisateur_login'] == $_POST['pseudo'] ){
    echo "Ce pseudo est deja utilise. Veillez choisir un autre pseudo";
  }
  elseif ($donnees['utilisateur_mail'] == $_POST['mail']) {
    echo "Cet adresse mail est deja utilisee. Veillez choisir une autre adresse mail";
  }
  elseif ($donnees['utilisateur_mail'] == $_POST['mail'] && $donnees['utilisateur_login'] == $_POST['pseudo']) {
    echo "Ce pseudo et cet adresse mail sont deja utilises. Etes-vous sur que vous ne vous etes pas deja inscrit ?";
  }
  else {
    $erreur = false;
  }
}

// mdp correctement tape
if ($_POST['mdp'] != $_POST['mdp2']){
  echo "Vous n'avez pas tape le meme mot de passe dans les 2 champs";
}
else{
  $erreur = false;
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);




/* ------------------- Adding user to the Database ------------------- */

if (!$erreur){
  $insertUser = $bdd->prepare('INSERT INTO utilisateur(utilisateur_type,utilisateur_login, utilisateur_motDePasse,
                                                       utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance,
                                                        utilisateur_mail)
                                VALUES(?,?, ?, ?, ?, ?, ?)');

  $insertUser->execute(array(
  	$_POST['type'],
    $_POST['pseudo'],
    $pass_hache,
    $_POST['prenom'],
    $_POST['nom'],
    $_POST['dateNaissance'],
    $_POST['mail']
  	));

  $insertUser->closeCursor();


  $insertLogement = $bdd->prepare('INSERT INTO logement(logement_adresse, logement_codePostal, logement_ville, logement_pays)
                                  VALUES(?, ?, ?, ?)');
  $insertLogement->execute(array(
    $_POST['adresse'],
    $_POST['codePostal'],
    $_POST['ville'],
    $_POST['pays']
    ));

  $insertLogement->closeCursor();
}
else{
  
}

// rederecting to the profile settings
header("Location: profil.php");
die();



?>
