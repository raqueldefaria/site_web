<?php

/* ------------------- BDD ------------------- */
try{
  $bdd = new PDO('mysql:host=localhost;dbname=mydb;charset=utf8', 'root', '');
}
catch(Exception $e){
  die('Erreur : '.$e->getMessage());
}

/* ------------------- Verifications ------------------- */

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id_Utilisateur FROM utilisateurs WHERE utilisateur_login = :pseudo AND utilisateur_motDePasse = :pass');
$req->execute(array(
    'pseudo' => $_POST['pseudo'],
    'pass' => $pass_hache));

$resultat = $req->fetch();


/* ------------------- Session ------------------- */
if (!$resultat)
{
    echo 'Mauvais identifiant ou mot de passe !';
}
else
{
    session_start();
    $_SESSION['id'] = $resultat['id'];
    $_SESSION['pseudo'] = $pseudo;
    echo 'Vous êtes connecté !';
}

?>
