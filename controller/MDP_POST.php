<?php

require("../model/connection_db.php");

$mail_recup = htmlspecialchars($_POST['mail_recup']);

//Verification existance de l'email sur la base de données
$req = $bdd->prepare('SELECT utilisateur_mail FROM utilisateur WHERE utilisateur_mail = ?') or die(print_r($bdd->errorInfo()));
$req->execute(array($mail_recup)) or die(print_r($req->errorInfo()));




$donnees = $req->fetch();


    	if (isset($_POST['mail_recup']) && preg_match("#^[a-z0-9._-]+@[a-z0-9._-]{2,}\.[a-z]{2,4}$#", $_POST['mail_recup']) && $donnees['utilisateur_mail'] == $mail_recup)
    	{


                //envoie du mail
               $tok = mt_rand(0,1000);

               $requete = $bdd->prepare("UPDATE utilisateur SET tok = ? WHERE utilisateur_mail = ? ") or die(print_r($bdd->errorInfo()));
               $requete->execute(array($tok,$donnees['utilisateur_mail'])) or die(print_r($requete->errorInfo()));

               ini_set( 'display_errors', 1 );

            $header="MIME-Version: 1.0\r\n";
            $header.='From:"Domonline.com"<domonline.isep@gmail.com>'."\n";
            $header.='Content-Type:text/html; charset="uft-8"'."\n";
            $header.='Content-Transfer-Encoding: 8bit';


              error_reporting( E_ALL );

              $from = "remy.touret1@gmail.com";

              $to = "remy.touret1@gmail.com";

              $subject = "Vérification du mail";

              $message = "Bonjour, Pour récuperer votre mot de passe sur le site, taper ce code :" . $tok;

              $headers = "From:" . $from;

              mail($to,$subject,$message, $headers);


             header('Location:ReinitialisationMDP.php?tok='.$tok);


    	}

        else
        {
	      echo "Ce mail n'existe pas.";
        }


$req->closeCursor();

?>
