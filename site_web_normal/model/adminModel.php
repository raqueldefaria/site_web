<?php

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$requser = $db->prepare('SELECT * FROM utilisateur,logement  WHERE utilisateur.id_Utilisateur = ? AND logement.id_Utilisateur = ?');
$requser->execute(array($_SESSION['userID'], $_SESSION['userID']));
$userinfo = $requser->fetch();

/* ------------------- Supression des données du client de la BDD ------------------- */
function deleteuser($id)
{
  require("../../model/connection_db.php");
  
  $logementId = $db->query("SELECT id_Logement FROM logement WHERE id_Utilisateur = " .$id);
  while($logement = $logementId->fetch()){
    $pieceId = $db->query("SELECT id_Piece FROM piece WHERE Logement_idLogement = " .$logement['id_Logement']);
    while($piece = $pieceId->fetch()){
        $cemacId = $db->query("SELECT id_Cemac FROM cemac WHERE Piece_idPiece = " .$piece['id_Piece']);
        while($cemac = $cemacId->fetch()){
            //On supprime les données correspondant au capteur
            $db->exec("DELETE FROM donnees WHERE `Capteur/actionneur_Cemac_idCemac` = " .$cemac['id_Cemac']);
            $db->exec("DELETE FROM panne WHERE `Capteur/actionneur_Cemac_idCemac` = " .$cemac['id_Cemac']);
            //On supprime les capteurs comportant l'id du cemac
            $db->exec("DELETE FROM `capteur/actionneur` WHERE Cemac_idCemac = " .$cemac['id_Cemac']);// or die(print_r($db->errorInfo()));
        }
        //On supprime le cemac et la pièce
        $db->exec("DELETE FROM cemac WHERE Piece_idPiece = " .$piece['id_Piece']);
        $db->exec("DELETE FROM piece WHERE id_Piece = ".$piece['id_Piece']);
    }
    //On supprime le logement
    $db->exec("DELETE FROM logement WHERE id_Logement = ".$logement['id_Logement']);
  }
  //On supprime l'utilisateur
  $db->exec("DELETE FROM utilisateur WHERE id_Utilisateur = ".$id);

}

/* ------------------- Récupère les information des clients dans la BDD ------------------- */
function getusers()
{
  require("../../model/connection_db.php");
  $membres = $db->query('SELECT * FROM utilisateur');
  return $membres;
}

?>
