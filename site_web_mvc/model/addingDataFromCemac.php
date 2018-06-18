
<?php

// 1. Récupérer les données brutes
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://projets-tomcat.isep.fr:8080/appService?ACTION=GETLOG&TEAM=006b");
curl_setopt($ch, CURLOPT_HEADER, FALSE);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$data = curl_exec($ch);
curl_close($ch);

echo "Raw Data:<br />";
echo("$data");

// 2. Les mettres sous forme de tableau (1 ligne = 1 trame d'un capteur)
$data_tab = str_split($data,33);
echo "<br /><br />Tabular Data:<br />";
for($i=0, $size=count($data_tab);$i<$size;$i++){
    echo "trame $i: $data_tab[$i]<br />";
}

// 3. Décoder 1 trame
// Rappel du format (sans les espaces): T OOOO R C NN VVVV AAAA XX YYYY MM DD HH mm ss
// T : type de trame, a priori toujours 1 ?
// OOOO : numéro de l'objet, ie numéro de la carte qui a envoyé les données (1 carte peut avoir plusieurs capteurs) -> utiliser la fonction hexdec(OOOO)
// R : type de requête (ne sert à rien)
// C : type de capteur - les types sont définis dans le document d'électronique eg 1 = distance modèle 1, 2 = distance modèlé 2, 3 = humidité...
//     Attention, la valeur est donnée en ASCII, qu'il faut le convertir en Hexa...  on peut faire avec bin2hex(D)-30
// NN : numéro du capteur (sur une carte, pour un type de capteur donné, le numéro doit être unique)
// VVVV : la valeur remontée -> utiliser la fonction hexdec(VVVV)
// AAAA : numéro de la trame (ne sert pas a priori, car on a un timestamp)
// XX : un checksum (ne sert pas)
// YYYY MM DD HH mm ss : timestamp

$trame = $data_tab[1];
echo("<br /><br />$trame<br/>");
// décodage avec des substring
$trame_type = substr($trame,0,1);
$object_num =  hexdec(substr($trame,1,4));
echo("$object_num $object_num ...<br />");

// décodage avec sscanf
// tout en chaine de caracteres
list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1s%4s%1s%1s%2s%4s%4s%2s%4s%2s%2s%2s%2s%2s");
echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec</br/>");

//// en typant les données (à vérifier avec Gilles...)
//list($t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec) = sscanf($trame,"%1d%4x%1s%1s%2x%4x%4s%2s%4d%2d%2d%2d%2d%2d");
//echo("$t,$o,$r,$c,$n,$v,$a,$x,$year,$month,$day,$hour,$min,$sec");

$value = hexdec($v);
echo "hello";
echo($o);


//--------------------Ajouter les donnees a la BDD---------------------//

/* ------------------- DB ------------------- */
require("connectionDb.php");


/* ------------------- Request ------------------- */
$data = $db->prepare("INSERT INTO donnees(donnees_temps, donnees_valeur, Capteur/actionneur_idCapteur/actionneur) VALUES (:temps,:valeur,:idCapteur)") or die(print_r($db->errorInfo()));
$data->bindParam(':temps', $min);
$data->bindParam(':valeur', $value );
$data->bindParam(':idCapteur', $n);
$data->execute() or die(print_r($data->errorInfo()));

$data->closeCursor();

