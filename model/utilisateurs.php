<?php
    require("connexion_db.php");

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function mdp($db,$pseudo){
        $reponse = $db->query('SELECT id_Utilisateur, utilisateur_motDePasse FROM utilisateur WHERE utilisateur_login="'.$pseudo.'"');
        return $reponse;
    }

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function utilisateurs($db){
        $reponse = $db->query('SELECT utilisateur_login FROM utilisateur');
        return $reponse;
    }


?>
