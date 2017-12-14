<?php

/* ------------------- BDD ------------------- */
require("../model/connexion_db.php");

/* ------------------- Adding user to the Database ------------------- */

$insertUser = $db->prepare('INSERT INTO utilisateur(utilisateur_type,utilisateur_login, utilisateur_motDePasse,
                                                        utilisateur_prenom, utilisateur_nom, utilisateur_dateDeNaissance,
                                                        utilisateur_mail)
                                VALUES(?,?, ?, ?, ?, ?, ?)');

$insertUser->execute(array(
    $_POST['type'],
    $_POST['pseudo'],
    $_POST['mdp'],
    //$pass_hache,
    $_POST['prenom'],
    $_POST['nom'],
    $_POST['dateNaissance'],
    $_POST['mail']
));


/* ------------------- Adding user to the Database ------------------- */

$idUser = $db->query('SELECT id_Utilisateur FROM utilisateur
                           WHERE utilisateur_prenom=$prenom AND utilisateur_nom=$nom');


$insertLogement = $db->prepare('INSERT INTO logement(logement_adresse, logement_codePostal, logement_ville, logement_pays, Utilisateur_idUtilisateur )
                                    VALUES(?, ?, ?, ?, ?)');
$insertLogement->execute(array(
    $_POST['adresse'],
    $_POST['codePostal'],
    $_POST['ville'],
    $_POST['pays'],
    $idUser['id_Utilisateur']
));

/* ------------------- Sending email to user ------------------- */
$to = $_POST['mail'];
$subject = "Inscription a DomOnline";

$message = "
<html>
<head>
<title>Inscription à DomOnline</title>
</head>
<body>
<p>Voici les identifiants de votre compte DomOnline</p>
<table>
<tr>
<th>Pseudo</th>
<th>Adresse-mail</th>
</tr>
<tr>
<td>$pseudo</td>
<td>$mail</td>
</tr>
</table>
</body>
</html>
";

// Always set content-type when sending HTML email
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

// More headers
$headers .= 'From: <racheldf19@outlook.com>' . "\r\n";

mail($to,$subject,$message,$headers);


// rederecting to the profile settings
header("Location: ../view/interface/clientPieces.php");
die();

?>
