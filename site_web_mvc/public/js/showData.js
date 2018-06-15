function showHousingsFromDb(idUser) {
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idUser": idUser};
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            if (myObj != null) {
                for (it = 0; it < myObj.length; it++) {
                    txt += "<div><a href=\"index.php?action=goToRooms&id=" + myObj[it].id_Logement + "\" >" +
                        "<div class='section'>" +
                        "<p style='font-size: small'>" + myObj[it].logement_adresse + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_codePostal + " " + myObj[it].logement_ville + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_pays + "</p>" +
                        "</div>" +
                        "</a><img src=\"public/images/client/cancel.png\" class=\"suppPiece\" id=\"supp" + myObj[it].id_Logement + "\" onclick=\" delHousing(" + myObj[it].id_Logement + " , " + idUser + ");\">" +
                        "<img src=\"public/images/client/edit.png\" class=\"editPiece\" id=\"edit" + myObj[it].id_Logement + "\"  onclick=\"return pop('editHousing" + myObj[it].id_Logement + "')\" ></div>";
                }
            }
                txt +="<a href=\"\" onclick=\"return pop('addLogement') \" >\n" +
                    "            <div class=\"section\">\n" +
                    "                <img src=\"public/images/client/add.png\" class=\"addButton\">\n" +
                    "                <p>Ajouter</p>\n" +
                    "            </div>\n" +
                    "        </a>";
                document.getElementById("logements").innerHTML = txt;
            }
    };
    xmlhttp.open("POST", "model/ajax/showHousingJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

function showRoomsFromDb(idUser, idLogement) {
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idUser": idUser, "idLogement":idLogement };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            if (myObj != null) {
                for (it = 0; it < myObj.length; it++) {
                    txt += "<div><a href='index.php?action=goToSensors&id=" + myObj[it].id_Piece + "'>";
                    switch (myObj[it].piece_type) {
                        case "Garage":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/car.png'>";
                            break;
                        case "Chambre":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/bed.png'>";
                            break;
                        case "Cuisine":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/cutlery.png'>";
                            break;
                        case "Bureau":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/desktop.png'>";
                            break;
                        case "Salle De Bain":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/bathtub.png'>";
                            break;
                        case "Toilettes":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/toilet.png'>";
                            break;
                        case "Salon":
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p><img src='public/images/client/room.png'>";
                            break;
                        default:
                            txt += "<div class='section'><p class=\"namePieceCSS\">" + myObj[it].piece_nom + "</p>";
                    }
                    txt += "</div></a><img src=\"public/images/client/cancel.png\" class=\"suppPiece\" id=\"supp" + myObj[it].id_Piece + "\" onclick=\"return delRoom(" + myObj[it].id_Piece + " , " + idLogement + " , " + idUser + ")\">\n" +
                        "<img src=\"public/images/client/edit.png\" class=\"editPiece\" id=\"edit" + myObj[it].id_Piece + "\"  onclick=\"return pop('editRoom" + myObj[it].id_Piece + "')\" ></div>";

                }
            }
            txt +="<a href=\"\" onclick=\"return pop('addPiece') \" >\n" +
                "            <div class=\"section\">\n" +
                "                <img src=\"public/images/client/add.png\" class=\"addButton\">\n" +
                "                <p>Ajouter</p>\n" +
                "            </div>\n" +
                "        </a>";
            document.getElementById("pieces").innerHTML = txt;
        }
    };
    xmlhttp.open("POST", "model/ajax/showRoomsJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

function showSensorsFromDb(idPiece) {
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idPiece":idPiece };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            if (myObj != null){
                for (it = 0; it < myObj.length; it++) {
                    txt += "<a href=''>";
                    switch (myObj[it].fonction){
                        case "Lumière":
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p onclick=\"return popChart('chartDiv', 10," + idPiece +", "+ myObj[it].ID_capteur_actionneur +", 'Flux lumineux', 'Flux lumineux en fonction du temps','Flux lumineux en lumens', 'Temps en heures')\">Lumière </p>\n" +
                                "                <div class=imgBoutton>\n" +
                                    "                <div class=optionSensor>\n" +
                                "                    <img src=\"public/images/lumière.png\"/>\n" +

                                "                        <label class=\"switch\">\n" +
                                    "                            <input type=\"checkbox\">\n" +
                                    "                            <span class=\"slider round\"></span>\n" +
                                    "                        </label>\n" +
                                    "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur
                                "                </div>\n" +

                                "            </div>" ;
                            break;
                        case "Volets":
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p>Volets</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                <div class=optionSensor>\n" +
                                "                    <img src=\"public/images/volets.png\"/>\n" +
                                "                        <label class=\"switch\">\n" +
                                "                            <input type=\"checkbox\">\n" +
                                "                            <span class=\"slider round\"></span>\n" +
                                "                        </label>\n" +
                                "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur

                                "                </div>\n" +
                                "            </div>";
                            break;
                        case "Température":
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p onclick=\"return popChart('chartDiv',  10," + idPiece +", "+ myObj[it].ID_capteur_actionneur +", 'Température', 'Température en fonction du temps', 'Température en °C', 'Temps en heures')\">Température</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                    "                <div class=optionSensor>\n" +
                                "                    <img src=\"public/images/température.png\"/>\n" +
                                "                        <label class=\"switch\">\n" +
                                    "                            <input type=\"checkbox\">\n" +
                                    "                            <span class=\"slider round\"></span>\n" +
                                    "                        </label>\n" +
                                    "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur

                                "                </div>\n" +
                                "            </div>";
                            break;
                        case "Humidité":
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p onclick=\"return popChart('chartDiv',  10," + idPiece +", "+ myObj[it].ID_capteur_actionneur +", 'Humidité', 'Humidité en fonction du temps', 'Humidité en g par unité de volume', 'Temps en heures')\">Humidité</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                <div class=optionSensor>\n" +
                                "                    <img src=\"public/images/humidité.png\"/>\n" +
                                "                        <label class=\"switch\">\n" +
                                "                            <input type=\"checkbox\">\n" +
                                "                            <span class=\"slider round\"></span>\n" +
                                "                        </label>\n" +
                                "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur

                                "                </div>\n" +
                                "            </div>";
                            break;
                        case "Moteur":
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p onclick=\"return popChart('chartDiv',  10," + idPiece +", "+ myObj[it].ID_capteur_actionneur +", 'Humidité', 'Humidité en fonction du temps', 'Humidité en g par unité de volume', 'Temps en heures')\">Moteur</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                <div class=optionSensor>\n" +
                                "                    <img src=\"public/images/moteur.png\"/>\n" +
                                "                        <label class=\"switch\">\n" +
                                "                            <input type=\"checkbox\">\n" +
                                "                            <span class=\"slider round\"></span>\n" +
                                "                        </label>\n" +
                                "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur

                                "                </div>\n" +
                                "                <img src=\"public/images/fleche_gauche.png\"/>"+
                                "                <img src=\"public/images/bouton_stop.png\"/>"+
                                "                <img src=\"public/images/fleche_droite.png\"/>"+
                                "            </div>";
                            break;
                        default:
                            txt += "<div class=\"section\" id='sensor'>\n" +
                                "                <p onclick=\"return popChart('chartDiv',  10," + idPiece +", "+ myObj[it].ID_capteur_actionneur +", 'Données du capteur/actionneur', 'Données du capteur/actionneur en fonction du temps', 'Axe des ordonnées', 'Axe des abscisse')\">Capteur/actionneur</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                <div class=optionSensor>\n" +
                                "                        <label class=\"switch\">\n" +
                                "                            <input type=\"checkbox\">\n" +
                                "                            <span class=\"slider round\"></span>\n" +
                                "                        </label>\n" +
                                "                </div>\n" +
                                "                    <a href=\"model/deleteSensor.php?idCapteur="+ myObj[it].ID_capteur_actionneur+"&idRoom="+idPiece+"\"><img src=\"public/images/client/cancel.png\" class=\"suppPiece\"></a>\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur
                                "                </div>\n" +
                                "            </div>";
                    }
                    txt += "</a>";
                }
            }
            txt +="<a href=\"\" onclick=\"return pop('addCapteurs') \" >\n" +
                "            <div class=\"section\">\n" +
                "                <img src=\"public/images/client/add.png\" class=\"addButton\">\n" +
                "                <p>Ajouter</p>\n" +
                "            </div>\n" +
                "        </a>";
            document.getElementById("capteursActionneurs").innerHTML = txt;
        }

    };

    xmlhttp.open("POST", "model/ajax/showSensorsJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////   SUPPRESSION    ///////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function delSensor(idCapteur, idPiece){
    var xmlhttp;
    if (confirm("Voulez-vous vraiment supprimer ce capteur/actionneur ?")) {
        var dbParam = JSON.stringify({"idCapteur": idCapteur}); // On encode en JSON dbParam, qui contient l'id capteur
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                showSensorsFromDb(idPiece);
            }
        };
        xmlhttp.open("POST", "model/ajax/deleteSensorJs.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);
    }
}

function delRoom(idPiece, idLogement, idUser){
    var xmlhttp;
    if (confirm("Voulez-vous vraiment supprimer cette pièce ?")) {
        var dbParam = JSON.stringify({"idPiece": idPiece}); // On encode en JSON dbParam, qui contient l'id piece
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                showRoomsFromDb(idUser, idLogement);
                //window.alert("AH");
            }
        };
        xmlhttp.open("POST", "model/ajax/deleteRoomJs.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);
    }
}

function delHousing(idLogement, idUser){
    var xmlhttp;
    if (confirm("Voulez-vous vraiment supprimer ce logement ?")) {
        var dbParam = JSON.stringify({"idLogement": idLogement}); // On encode en JSON dbParam, qui contient l'id logement
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                showHousingsFromDb(idUser);
                //window.alert("AH");
            }
        };
        xmlhttp.open("POST", "model/ajax/deleteHousingJs.php", true);
        xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xmlhttp.send("x=" + dbParam);
    }
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////   AJOUT    ///////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function addSensor(idPiece){
    var array = $('form').serializeArray();
    var obj = {"fonction":array[0].value, "type":array[1].value, "nomCemac":array[2].value, "idPiece":idPiece };
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showSensorsFromDb(idPiece);

          }
      };
    xmlhttp.open("POST", "model/ajax/addSensorJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

}

function addRoom(idUser,idLogement){
    //console.log($('form').serializeArray());
    var array = $('#addPieceForm').serializeArray();
    var obj = {"piece":array[0].value, "nomPiece":array[1].value, "idLogement":idLogement};
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {

              showRoomsFromDb(idUser,idLogement);
              writePopUpsPieces(idUser, idLogement);

          }
      };
    xmlhttp.open("POST", "model/ajax/addRoomJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

}

function addHousing(idUser){
    //console.log($('form').serializeArray());
    var array = $('#addLogementForm').serializeArray();
    var obj = {"adresse":array[0].value, "codePostal":array[1].value, "ville":array[2].value, "pays":array[3].value};
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showHousingsFromDb(idUser);
              writePopUpsLogements(idUser);
          }
      };
    xmlhttp.open("POST", "controller/ajax/addHousingJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////// MODIFIER ///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function editHousing(idUser, idLogement){
    var array = $('#editLogementForm'+idLogement).serializeArray();
    var obj = {"adresse":array[0].value, "codePostal":array[1].value, "ville":array[2].value, "pays":array[3].value, "idLogement":idLogement};
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showHousingsFromDb(idUser);
              writePopUpsLogements(idUser);

          }
      };
    xmlhttp.open("POST", "controller/ajax/editHousingJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

function editRoom(idUser, idLogement, idPiece){ //on prend en argument l'idUser, qui pourrait servir pour la sécurité, l'idlogement pour pouvoir recharger la fonction showPiecesFromDb
    var array = $('#editPieceForm'+idPiece).serializeArray();
    var obj = {"piece":array[0].value, "nomPiece":array[1].value, "idPiece":idPiece};
    //console.log(obj);
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj);
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showRoomsFromDb(idUser, idLogement);
              writePopUpsPieces(idUser, idLogement);

          }
      };
    xmlhttp.open("POST", "model/ajax/editRoomJS.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}
