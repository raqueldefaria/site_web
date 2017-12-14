<?php

/* ------------------- BDD ------------------- */
require("connexion_db.php");

/* ------------------- Verifications ------------------- */

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);

// Vérification des identifiants
$req = $bdd->prepare('SELECT id_Utilisateur FROM utilisateur
                      WHERE utilisateur_login = :pseudo AND utilisateur_motDePasse = :pass');
$req->execute(array(
    'pseudo' => htmlspecialchars($_POST['pseudo']),
    'pass' => $pass_hache));
    //'pass' => htmlspecialchars($_POST['mdp'])));

$resultat = $req->fetch();


/* ------------------- Session ------------------- */

if (!$resultat)
{
  echo 'Mauvais identifiant ou mot de passe ! Veuillez réessayer.';
}
else
{
  session_start();
  $_SESSION['userID'] = $resultat['id_Utilisateur'];
  $_SESSION['pseudo'] = $_POST['pseudo'];
  echo 'Vous êtes connecté !';
  // rederecting to the house page
  header("Location: ../view/clientPieces.php");
  die();
}



?>
