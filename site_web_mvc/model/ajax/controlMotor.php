<?php
///* ------------------- JSON en POST ------------------- */
header("Content-Type: application/json; charset=UTF-8");
$obj = json_decode($_POST["x"], false); //a tester après avec le htmlspecialchars


///* ------------------- Faire tourner le moteur ------------------- */
//
//
// 1. Récupérer les données brutes
	$ch = curl_init();

//	// arreter le moteur
//	if($obj->action == 0){
//        curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=006b&
//	TRAME=1006b2a010000dd");
//    }
//    // tourner à gauche
//    if ($obj->action == 1){
//        curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=006b&
//	TRAME=1006b2a010001de");
//    }
//    //tourner à droite
//    if ($obj->action == 2){
//        curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=006b&
//	TRAME=1006b2a010002df");
//    }

curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=COMMAND&TEAM=006b&
	TRAME=1006b2a010001de");

    curl_setopt($ch, CURLOPT_HEADER, 0);
	curl_exec($ch);
	curl_close($ch);

	echo json_encode($obj->action);



	?>

