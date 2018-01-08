<?php

/* ------------------- BDD ------------------- */
require("../model/connection_db.php");

/* ------------------- Verifications ------------------- */

// Tous les champs sont remplis
if(!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['mdp'])) AND !empty(htmlspecialchars($_POST['type'])) AND !empty(htmlspecialchars($_POST['prenom']))
    AND !empty(htmlspecialchars($_POST['nom'])) AND !empty(htmlspecialchars($_POST['dateNaissance'])) AND !empty($_POST['mail']) AND !empty(htmlspecialchars($_POST['adresse']))
    AND !empty(htmlspecialchars($_POST['codePostal'])) AND !empty(htmlspecialchars($_POST['ville'])) AND !empty(htmlspecialchars($_POST['pays']))) {

    // si le pseudo ou mail rentres sont dans la BDD alors on recupere quelque chose
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

    if (empty($donnee)){  // L'utilisateur n'existe pas dans la base de données, on peut continuer
        $erreur = false; // on n'a pas d'erreur
        // mdp correctement tapé
        if (htmlspecialchars($_POST['mdp']) != htmlspecialchars($_POST['mdp2'])) {
            require("../model/utilisateurs_inscription_erreur.php");
            pre_fill();
            header("Location:../view/interface/inscription_erreur.php?erreur=2");
            $erreur = true; // on a une erreur : le mot de passe n'a pas bien ete tape
        }
    }
    else { // utilisateur trouvé dans la base de données, on regarde si il a le meme pseudo ou mail
        if($pseudo == $donnee['utilisateur_login']){
            require("../model/utilisateurs_inscription_erreur.php");
            pre_fill();
            header("Location:../view/interface/inscription_erreur.php?erreur=3");
            $erreur = true;
        }
        elseif(strcmp($mail,$donnee['utilisateur_mail'])==0){ // strcmp = string comparaison
            require("../model/utilisateurs_inscription_erreur.php");
            pre_fill();
            header("Location:../view/interface/inscription_erreur.php?erreur=4");
            $erreur = true;
        }

    }

    if($erreur == false){
        include("../model/utilisateurs_inscription.php");
    }
}
else{ // un ou plusieurs champs n'ont pas ete remplis
    require("../model/utilisateurs_inscription_erreur.php");
    pre_fill();
    header("Location:../view/interface/inscription_erreur.php?erreur=1");
}



?>
