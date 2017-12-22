<?php
// Controleur pour gérer le formulaire de connexion des utilisateurs

// L'utilisateur a rempli tous les champs du formulaire
if(!empty(htmlspecialchars($_POST['pseudo'])) AND !empty(htmlspecialchars($_POST['mdp']))){
    include("../model/utilisateurs_connexion.php");

    $reponse = mdp($db,htmlspecialchars($_POST['pseudo']));

    if($reponse->rowcount()==0){  // L'utilisateur n'a pas été trouvé dans la base de données
        header("Location:../view/interface/connexion_erreur.php?erreur=1");
    }
    else { // utilisateur trouvé dans la base de données
        $donnee = $reponse->fetch();

        // Le mot de passe tapé ne correspond pas à celui stocké dans la base de données
        if($pass_hache = sha1(htmlspecialchars($_POST['mdp']))!=$donnee['utilisateur_motDePasse']){
            header("Location:../view/interface/connexion_erreur.php?erreur=2");
        }
        else { // mot de passe correct, on affiche la page d'accueil
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION["userID"] = $donnee['id_Utilisateur'];
            $_SESSION['prenom'] = $donnee['utilisateur_prenom'];
            $_SESSION['nom'] = $donnee['utilisateur_nom'];
            header("Location:../view/interface/clientPieces.php");
        }
    }
} else { // L'utilisateur n'a pas rempli tous les champs du formulaire
    header("Location:../view/interface/connexion_erreur.php?erreur=3");
}

?>
