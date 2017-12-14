<?php
    // Controleur pour gérer le formulaire de connexion des utilisateurs

        if(!empty($_POST['pseudo']) && !empty($_POST['mdp'])){ // L'utilisateur a rempli tous les champs du formulaire
            include("../model/utilisateurs.php");

            $reponse = mdp($db,$_POST['pseudo']);

            if($reponse->rowcount()==0){  // L'utilisateur n'a pas été trouvé dans la base de données
                $erreur = "Utilisateur inconnu";
                include("../view/interface/connexion_erreur.php");
            }
            else { // utilisateur trouvé dans la base de données
                $donnee = $reponse->fetch();
                if($_POST['mdp']!=$donnee['utilisateur_motDePasse']){ // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
                    $erreur = "Mot de passe incorrect";
                    include("../view/interface/connexion_erreur.php");
                }
                else { // mot de passe correct, on affiche la page d'accueil
                    $_SESSION["userID"] = $donnee['id_Utilisateur'];
                    header("Location:../view/interface/clientPieces.php");
                }
            }
        } else { // L'utilisateur n'a pas rempli tous les champs du formulaire
            $erreur = "Veuillez remplir tous les champs";
            include("../view/interface/connexion_erreur.php");
        }

?>
