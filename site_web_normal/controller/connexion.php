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
            cookie_username_temp();
            header("Location:../view/interface/connexion_erreur.php?erreur=2");
        }
        else { // mot de passe correct, on affiche la page d'accueil
            if (isset($_POST['souvenir'])) //on crée le cookie si l'utilisateur a coché "Se souvenir de moi"
            {
              setcookie('username',$_POST['pseudo'], time() + 365*24*3600, "/site_web", "localhost", false, true);
            }
            session_start();
            $_SESSION['pseudo'] = $_POST['pseudo'];
            $_SESSION["userID"] = $donnee['id_Utilisateur'];
            $_SESSION['prenom'] = $donnee['utilisateur_prenom'];
            $_SESSION['nom'] = $donnee['utilisateur_nom'];
            $_SESSION['type'] = $donnee['utilisateur_type'];
            header("Location:../view/interface/logements.php");
        }
    }
} else { // L'utilisateur n'a pas rempli tous les champs du formulaire
    include("../model/utilisateurs_connexion.php");
    cookie_username_temp();
    header("Location:../view/interface/connexion_erreur.php?erreur=3");
}

?>
