function controlMotor(action){ //on prend en argument l'idUser, qui pourrait servir pour la sécurité, l'idlogement pour pouvoir recharger la fonction showPiecesFromDb
    var obj = {"action":action};
    var dbParam = JSON.stringify(obj);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {

        }
    };
    xmlhttp.open("POST", "model/ajax/controlMotor.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

