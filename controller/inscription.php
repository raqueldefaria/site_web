<?php

/* ------------------- BDD ------------------- */
require("../model/connexion_db.php");

/* ------------------- Verifications ------------------- */


// if all input fields aren't empty
if(!empty(htmlspecialchars($_POST['pseudo'])) && !empty(htmlspecialchars($_POST['mdp'])) && !empty(htmlspecialchars($_POST['type'])) && !empty(htmlspecialchars($_POST['prenom']))
    && !empty(htmlspecialchars($_POST['nom'])) && !empty(htmlspecialchars($_POST['dateNaissance'])) && !empty($_POST['mail']) && !empty(htmlspecialchars($_POST['adresse']))
    && !empty(htmlspecialchars($_POST['codePostal'])) && !empty(htmlspecialchars($_POST['ville'])) && !empty(htmlspecialchars($_POST['pays']))) {

    // est-ce que le login & mail sont presents dans la base de données
    //$prenom = $_POST['prenom'];
    //$nom = $_POST['nom'];
    //$pseudo = $_POST['pseudo'];
    //$mail = $_POST['mail'];

    //$reponse = $db->query('SELECT utilisateur_login, utilisateur_mail FROM utilisateur
    //WHERE utilisateur_login='.$pseudo.' OR utilisateur_mail='.$mail ) or die(print_r($db->errorInfo()));
    $reponse = $db->prepare('SELECT utilisateur_login, utilisateur_mail FROM utilisateur
                             WHERE utilisateur_login=:pseudo OR utilisateur_mail=:mail');

    //or die(print_r($db->errorInfo()));

    $reponse->bindParam(':pseudo', $pseudo);
    $reponse->bindParam(':mail', $mail);

    $prenom = htmlspecialchars($_POST['prenom']);
    $nom = htmlspecialchars($_POST['nom']);
    $pseudo = htmlspecialchars($_POST['pseudo']);
    $mail = htmlspecialchars($_POST['mail']);
    //$idUser = $db->lastInsertId();
    $reponse->execute();

    $donnee = $reponse->fetch();

    if (empty($donnee)){  // L'utilisateur n'existe pas dans la base de données, on peut continuer
        $erreur = false; // on n'a pas d'erreur
        // mdp correctement tapé
        if (htmlspecialchars($_POST['mdp']) != htmlspecialchars($_POST['mdp2'])) {
              header("Location:../view/interface/inscription_erreur.php?erreur=2");
            $erreur = true; // on a une erreur
            //echo "Vous n'avez pas tapé le même mot de passe dans les 2 champs.";
        }
    }
    else { // utilisateur trouvé dans la base de données
        if($pseudo == $donnee['utilisateur_login']){
              header("Location:../view/interface/inscription_erreur.php?erreur=3");
            $erreur = true;
        }
        elseif(strcmp($mail,$donnee['utilisateur_mail'])==0){
              header("Location:../view/interface/inscription_erreur.php?erreur=4");
            $erreur = true;
        }

    }

    if($erreur == false){
      include("../model/utilisateurs_inscription.php");
    }
}
else{
      header("Location:../view/interface/inscription_erreur.php?erreur=1");
}

// Hachage du mot de passe
//$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);


?>
