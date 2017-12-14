<?php
    // Controleur pour gérer le formulaire de connexion des utilisateurs

        if(!empty(htmlspecialchars($_POST['pseudo'])) && !empty(htmlspecialchars($_POST['mdp']))){ // L'utilisateur a rempli tous les champs du formulaire
            include("../model/utilisateurs.php");

            $reponse = mdp($db,htmlspecialchars($_POST['pseudo']));

            if($reponse->rowcount()==0){  // L'utilisateur n'a pas été trouvé dans la base de données
                header("Location:../view/interface/connexion_erreur.php?erreur=1");
            }
            else { // utilisateur trouvé dans la base de données
                $donnee = $reponse->fetch();
                if($pass_hache = sha1(htmlspecialchars($_POST['mdp']))!=$donnee['utilisateur_motDePasse']){ // Le mot de passe entré ne correspond pas à celui stocké dans la base de données
                    header("Location:../view/interface/connexion_erreur.php?erreur=2");
                }
                else { // mot de passe correct, on affiche la page d'accueil
                    $_SESSION["userID"] = $donnee['id_Utilisateur'];
                    header("Location:../view/interface/clientPieces.php");
                }
            }
        } else { // L'utilisateur n'a pas rempli tous les champs du formulaire
            header("Location:../view/interface/connexion_erreur.php?erreur=3");
        }

?>
