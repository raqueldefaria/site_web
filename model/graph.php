<?php
/**
 * Created by PhpStorm.
 * User: Raquel De Faria
 * Date: 08/01/2018
 * Time: 15:59
 */

/* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false);

/* ------------------- BDD ------------------- */
require("../../model/connection_db.php");

$data = $db->query("SELECT donnees_valeur, donnees_temps FROM ".$obj->table." LIMIT ".$obj->limit) or die(print_r($db->errorInfo()));

$outp = array();
$outp = $data->fetchAll();

echo json_encode($outp);