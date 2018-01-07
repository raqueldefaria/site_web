<?php
    require("connection_db.php");

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function mdp($db,$pseudo){
        $reponse = $db->query('SELECT id_Utilisateur, utilisateur_motDePasse, utilisateur_prenom, utilisateur_nom FROM utilisateur WHERE utilisateur_login="'.$pseudo.'"');
        return $reponse;
    }

    // fonction qui cherche le mot de passe d'un utilisateur avec un identifiant dans la base de données
    function utilisateurs($db){
        $reponse = $db->query('SELECT utilisateur_login FROM utilisateur');
        return $reponse;
    }

    // fonction qui crée un cookie temporaire (5min=300s) pour le pseudo de l'utilisateur lors d'une erreur durant la tentative de connexion
    function cookie_username_temp(){
      if (!isset($_COOKIE['username']) && isset($_POST['pseudo']))
      {
        setcookie('username_temp',$_POST['pseudo'], time() + 300, "/site_web", "localhost", false, true);
      }
    }


?>
