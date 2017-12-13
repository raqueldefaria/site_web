<?php

/* ------------------- BDD ------------------- */
require("connexion_db.php");


/* ------------------- Verifications ------------------- */

$erreur = true; //initialising value

// login present dans la base de donnees
$loginDansBD = $db->query('SELECT utilisateur_login, utilisateur_mail FROM utilisateur');
while($donnees = $loginDansBD->fetch()){
<<<<<<< HEAD
    //echo $donnees['utilisateur_login'];
    if ($donnees['utilisateur_mail'] == $_POST['mail'] && $donnees['utilisateur_login'] == $_POST['pseudo']){
        $text = "Ce pseudo et cet adresse mail sont deja utilises. Etes-vous sur que vous ne vous etes pas deja inscrit ?";
        include("../view/interface/inscription_erreur.php");
    }
    elseif ($donnees['utilisateur_mail'] == $_POST['mail']) {
        $text = "Cet adresse mail est deja utilisee. Veillez choisir une autre adresse mail";
        include("../view/interface/inscription_erreur.php");
    }
    elseif ($donnees['utilisateur_login'] == $_POST['pseudo'] )   {
        $text = "Ce pseudo est deja utilise. Veillez choisir un autre pseudo";
        include("../view/interface/inscription_erreur.php");
    }
    else {
        $erreur = false;
    }
=======
  echo $donnees['utilisateur_login'];
  if ($donnees['utilisateur_login'] == $_POST['pseudo'] ){
    echo "Ce pseudo est deja utilisé. Veuillez choisir un autre pseudo.";
  }
  elseif ($donnees['utilisateur_mail'] == $_POST['mail']) {
    echo "Cet adresse mail est déjà utilisée. Veuillez choisir une autre adresse mail.";
  }
  elseif ($donnees['utilisateur_mail'] == $_POST['mail'] && $donnees['utilisateur_login'] == $_POST['pseudo']) {
    echo "Ce pseudo et cet adresse mail sont déjà utilisés. Etes-vous sûr que vous ne vous êtes pas déjà inscrit ?";
  }
  else {
    $erreur = false;
  }
>>>>>>> 6add260783e4d9dae0721a5fe56e33b450e11ad3
}

// mdp correctement tape
if ($_POST['mdp'] != $_POST['mdp2']){
<<<<<<< HEAD
    $text = "Vous n'avez pas tape le meme mot de passe dans les 2 champs";
    include("../view/interface/inscription_erreur.php");
=======
  echo "Vous n'avez pas tapé le même mot de passe dans les 2 champs.";
>>>>>>> 6add260783e4d9dae0721a5fe56e33b450e11ad3
}
else{
    $erreur = false;
}

// Hachage du mot de passe
$pass_hache = password_hash($_POST['mdp'], PASSWORD_DEFAULT);




/* ------------------- Adding user to the Database ------------------- */

if (!$erreur){
    $insertUser = $db->prepare('INSERT INTO utilisateur(utilisateur_type,utilisateur_login, utilisateur_motDePasse,
                                                       utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance,
                                                        utilisateur_mail)
                                VALUES(?,?, ?, ?, ?, ?, ?)');

    $insertUser->execute(array(
        $_POST['type'],
        $_POST['pseudo'],
        $pass_hache,
        $_POST['prenom'],
        $_POST['nom'],
        $_POST['dateNaissance'],
        $_POST['mail']
    ));

    $insertUser->closeCursor();


    $insertLogement = $db->prepare('INSERT INTO logement(logement_adresse, logement_codePostal, logement_ville, logement_pays)
                                  VALUES(?, ?, ?, ?)');
    $insertLogement->execute(array(
        $_POST['adresse'],
        $_POST['codePostal'],
        $_POST['ville'],
        $_POST['pays']
    ));

    $insertLogement->closeCursor();
}
else{

}

// rederecting to the profile settings
//header("Location: ../view/interface/clientPieces.php");
//die();



?>
