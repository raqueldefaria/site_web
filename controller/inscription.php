<?php

/* ------------------- BDD ------------------- */
require("../model/connexion_db.php");

/* ------------------- Verifications ------------------- */


// if all input fields aren't empty
if(!empty($_POST['pseudo']) && !empty($_POST['mdp']) && !empty($_POST['type']) && !empty($_POST['prenom'])
    && !empty($_POST['nom']) && !empty($_POST['dateNaissance']) && !empty($_POST['mail']) && !empty($_POST['adresse'])
    && !empty($_POST['codePostal']) && !empty($_POST['ville']) && !empty($_POST['pays'])) {

    // est-ce que le login & mail sont presents dans la base de données
    $prenom = $_POST['prenom'];
    $nom = $_POST['nom'];
    $pseudo = $_POST['pseudo'];
    $mail = $_POST['mail'];

    $reponse = $db->query('SELECT utilisateur_login, utilisateur_mail FROM utilisateur
                           WHERE utilisateur_login='.$pseudo.' OR utilisateur_mail='.$mail );

    if (empty($reponse)){  // L'utilisateur n'existe pas dans la base de données, on peut continuer
        $erreur = false;
        // mdp correctement tapé
        if ($_POST['mdp'] != $_POST['mdp2']) {
            $text = "Vous n'avez pas tapé le meme mot de passe dans les 2 champs";
            include("../view/interface/inscription_erreur.php");
            $erreur = true;
            echo "Vous n'avez pas tapé le même mot de passe dans les 2 champs.";
        }
    }
    else { // utilisateur trouvé dans la base de données
        if(strcmp($pseudo,$reponse['utilisateur_login'])==0){
            $text = "Veillez choisir un autre login";
            include("../view/interface/inscription_erreur.php");
            $erreur = true;
        }
        if(strcmp($mail,$reponse['utilisateur_mail'])==0){
            $text = "Veillez choisir une autre adresse mail";
            include("../view/interface/inscription_erreur.php");
            $erreur = true;
        }

    }

    if($erreur == false){
        include("../model/utilisateurs_inscription.php");
    }
}
else{
    $text = "Vous n'avez pas rempli tout les champs";
    include("../view/interface/inscription_erreur.php");
}

// Hachage du mot de passe
//$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


?>
