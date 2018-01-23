function showLogementsFromDb(idUser) {
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idUser": idUser};
    dbParam = JSON.stringify(obj);
    console.log(dbParam);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function () {
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            console.log(myObj);
            for (it = 0; it < myObj.length; it++) {
                    txt += "<div><a href=\"clientPieces.php?id="+ myObj[it].id_Logement + "\" >" +
                        "<div class='section'>" +
                        "<p style='font-size: small'>" + myObj[it].logement_adresse + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_codePostal + " " + myObj[it].logement_ville + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_pays + "</p>" +
                        "</div>" +
                        "</a><img src=\"../images/client/cancel.png\" class=\"suppPiece\" id=\"supp"+myObj[it].id_Logement+"\" onclick=\"return delLogement("+myObj[it].id_Logement+" , "+idUser+")\">" +
                        "<img src=\"../images/client/edit.png\" class=\"editPiece\" id=\"edit"+myObj[it].id_Logement+"\"  onclick=\"return pop('editLogement"+myObj[it].id_Logement+"')\" ></div>";
                }
                txt +="<a href=\"#\" onclick=\"return pop('addLogement') \" >\n" +
                    "            <div class=\"section\">\n" +
                    "                <img src=\"../images/client/add.png\" class=\"addButton\">\n" +
                    "                <p>Ajouter</p>\n" +
                    "            </div>\n" +
                    "        </a>";
                document.getElementById("logements").innerHTML = txt;
            }
    };
    xmlhttp.open("POST", "../../model/showLogementsJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}


function showPiecesFromDb(idUser, idLogement) {
    console.log(idLogement);
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idUser": idUser, "idLogement":idLogement };
    dbParam = JSON.stringify(obj);
    console.log(dbParam);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        console.log(this.responseText);
        if (this.readyState == 4 && this.status == 200) {
            myObj = JSON.parse(this.responseText);
            for (it = 0; it < myObj.length; it++) {
                txt += "<div><a href='capteursPiece.php?id="+ myObj[it].id_Piece + "'>";
                switch (myObj[it].piece_type){
                    case "Garage":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/car.png'>";
                        break;
                    case "Chambre":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/bed.png'>";
                        break;
                    case "Cuisine":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/cutlery.png'>";
                        break;
                    case "Bureau":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/desktop.png'>";
                        break;
                    case "Salle de Bain":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/bathtub.png'>";
                        break;
                    case "Toilettes":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/toilet.png'>";
                        break;
                    case "Salon":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/room.png'>";
                        break;
                    default:
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p>";
                }
                txt += "</div></a><img src=\"../images/client/cancel.png\" class=\"suppPiece\" id=\"supp"+myObj[it].id_Piece+"\" onclick=\"return delPiece("+myObj[it].id_Piece+" , "+idLogement+" , "+idUser+")\">\n</div>";

            }
            txt +="<a href=\"#\" onclick=\"return pop('addPiece') \" >\n" +
                "            <div class=\"section\">\n" +
                "                <img src=\"../images/client/add.png\" class=\"addButton\">\n" +
                "                <p>Ajouter</p>\n" +
                "            </div>\n" +
                "        </a>";
            document.getElementById("pieces").innerHTML = txt;
        }
    };
    xmlhttp.open("POST", "../../model/showPiecesJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

function showCapteursFromDb(idPiece) {
    var obj, dbParam, xmlhttp, myObj, it, txt = "";
    obj = {"idPiece":idPiece };
    dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState == 4 && this.status == 200) {
            console.log(this.responseText);
            myObj = JSON.parse(this.responseText);
            console.log(myObj);
            if (myObj != null){
                for (it = 0; it < myObj.length; it++) {
                    txt += "<a href='#'>";
                    switch (myObj[it].fonction){
                        case "Lumière":
                            txt += "<div class=\"section\">\n" +
                                "                <p onclick=\"return popChart('chartDiv', 10," + idPiece +", 'Flux lumineux', 'Flux lumineux en fonction du temps','Flux lumineux en lumens', 'Temps en heures')\">Lumière </p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                    <div class=\"onoffswitch\">\n" +
                                "                        <input type=\"checkbox\" name=\"onoffswitch\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>\n" +
                                "                        <label class=\"onoffswitch-label\" for=\"myonoffswitch\">\n" +
                                "                            <span class=\"onoffswitch-inner\"></span>\n" +
                                "                            <span class=\"onoffswitch-switch\"></span>\n" +
                                "                        </label>\n" +
                                "                    </div>\n" +
                                "                    <img src=\"../images/lumière.png\"/>\n" +
                                "                    <img src=\"../images/client/cancel.png\" class=\"suppPiece\" onclick=\"return delCapteur("+myObj[it].ID_capteur_actionneur +" , "+idPiece+")\">\n" + //bouton supprimer, delCapteur( id capteur , id pièce) est une fct qui fonctionne en ajax pour supprimer un capteur
                                "                </div>\n" +
                                "            </div>" ;

                            break;
                        case "Volets":
                            txt += "<div class=\"section\">\n" +
                                "                <p>Volets</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                    <div class=\"onoffswitch\">\n" +
                                "                        <input type=\"checkbox\" name=\"onoffswitch\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>\n" +
                                "                        <label class=\"onoffswitch-label\" for=\"myonoffswitch\">\n" +
                                "                            <span class=\"onoffswitch-inner\"></span>\n" +
                                "                            <span class=\"onoffswitch-switch\"></span>\n" +
                                "                        </label>\n" +
                                "                    </div>\n" +
                                "                    <img src=\"../images/volets.png\"/>\n" +
                                "                    <img src=\"../images/client/cancel.png\" class=\"suppPiece\" onclick=\"return delCapteur("+myObj[it].ID_capteur_actionneur +" , "+idPiece+")\">\n" + // morceau au cas où:  id=\"supp"+myObj[it].ID_capteur_actionneur+"\"
                                "                </div>\n" +
                                "            </div>";
                            break;
                        case "Température":
                            txt += "<div class=\"section\">\n" +
                                "                <p onclick=\"return popChart('chartDiv', 10," + idPiece +", 'Température', 'Température en fonction du temps', 'Température en °C', 'Temps en heures')\">Température</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                    <div class=\"onoffswitch\">\n" +
                                "                        <input type=\"checkbox\" name=\"onoffswitch\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>\n" +
                                "                        <label class=\"onoffswitch-label\" for=\"myonoffswitch\">\n" +
                                "                            <span class=\"onoffswitch-inner\"></span>\n" +
                                "                            <span class=\"onoffswitch-switch\"></span>\n" +
                                "                        </label>\n" +
                                "                    </div>\n" +
                                "                    <img src=\"../images/température.png\"/>\n" +
                                "                    <img src=\"../images/client/cancel.png\" class=\"suppPiece\" onclick=\"return delCapteur("+myObj[it].ID_capteur_actionneur +" , "+idPiece+")\">\n" +
                                "                </div>\n" +
                                "            </div>";
                            break;
                        case "Humidité":
                            txt += "<div class=\"section\">\n" +
                                "                <p onclick=\"return popChart('chartDiv', 10, " + idPiece + ", 'Humidité', 'Humidité en fonction du temps', 'Humidité en g par unité de volume', 'Temps en heures')\">Humidité</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                    <div class=\"onoffswitch\">\n" +
                                "                        <input type=\"checkbox\" name=\"onoffswitch\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>\n" +
                                "                        <label class=\"onoffswitch-label\" for=\"myonoffswitch\">\n" +
                                "                            <span class=\"onoffswitch-inner\"></span>\n" +
                                "                            <span class=\"onoffswitch-switch\"></span>\n" +
                                "                        </label>\n" +
                                "                    </div>\n" +
                                "                    <img src=\"../images/humidité.png\"/>\n" +
                                "                    <img src=\"../images/client/cancel.png\" class=\"suppPiece\" onclick=\"return delCapteur("+myObj[it].ID_capteur_actionneur +" , "+idPiece+")\">\n" +
                                "                </div>\n" +
                                "            </div>";
                            break;
                        default:
                            txt += "<div class=\"section\">\n" +
                                "                <p onclick=\"return popChart('chartDiv', 10, " + idPiece + ", 'Données du capteur/actionneur', 'Données du capteur/actionneur en fonction du temps', 'Axe des ordonnées', 'Axe des abscisse')\">Capteur/actionneur</p>\n" +
                                "                <div class=imgBoutton>\n" +
                                "                    <div class=\"onoffswitch\">\n" +
                                "                        <input type=\"checkbox\" name=\"onoffswitch\" class=\"onoffswitch-checkbox\" id=\"myonoffswitch\" checked>\n" +
                                "                        <label class=\"onoffswitch-label\" for=\"myonoffswitch\">\n" +
                                "                            <span class=\"onoffswitch-inner\"></span>\n" +
                                "                            <span class=\"onoffswitch-switch\"></span>\n" +
                                "                        </label>\n" +
                                "                    </div>\n" +
                                "                </div>\n" +
                                "            </div>";
                    }
                    txt += "</a>";
                }
            }
            txt +="<a href=\"#\" onclick=\"return pop('addCapteurs') \" >\n" +
                "            <div class=\"section\">\n" +
                "                <img src=\"../images/client/add.png\" class=\"addButton\">\n" +
                "                <p>Ajouter</p>\n" +
                "            </div>\n" +
                "        </a>";
            document.getElementById("capteursActionneurs").innerHTML = txt;
        }
    };
    xmlhttp.open("POST", "../../model/showCapteursJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////   SUPPRESSION    ///////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

function delCapteur(idCapteur, idPiece){
    var dbParam = JSON.stringify({"idCapteur":idCapteur }); // On encode en JSON dbParam, qui contient l'id capteur
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              showCapteursFromDb(idPiece);
          }
      }
    xmlhttp.open("POST", "../../model/suppCapteurJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}



function delPiece(idPiece, idLogement, idUser){
    var dbParam = JSON.stringify({"idPiece":idPiece }); // On encode en JSON dbParam, qui contient l'id piece
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              showPiecesFromDb(idUser, idLogement);
              //window.alert("AH");
          }
      }
    xmlhttp.open("POST", "../../model/suppPieceJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}



function delLogement(idLogement, idUser){
    var dbParam = JSON.stringify({"idLogement":idLogement }); // On encode en JSON dbParam, qui contient l'id logement
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
          if (this.readyState == 4 && this.status == 200) {
              showLogementsFromDb(idUser);
              //window.alert("AH");
          }
      }
    xmlhttp.open("POST", "../../model/suppLogementJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}


////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////   AJOUT    ///////////////////////////////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
function addCapteur(idPiece){
    console.log($('form').serializeArray());
    console.log(idPiece);
    var array = $('form').serializeArray();
    var obj = {"fonction":array[0].value, "type":array[1].value, "nomCemac":array[2].value };
    console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showCapteursFromDb(idPiece);

          }
      }
    xmlhttp.open("POST", "../../model/addCapteurJS.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

}

function addPiece(idUser,idLogement){
    console.log($('form').serializeArray());
    var array = $('form').serializeArray();
    var obj = {"piece":array[0].value, "nomPiece":array[1].value};
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showPiecesFromDb(idUser,idLogement);

          }
      }
    xmlhttp.open("POST", "../../model/addPieceJS.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

}

function addLogement(idUser){
    console.log($('form').serializeArray());
    var array = $('#addLogementForm').serializeArray();
    var obj = {"adresse":array[0].value, "codePostal":array[1].value, "ville":array[2].value, "pays":array[3].value};
    console.log(obj);
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj); // On encode en JSON dbParam, qui contient l'id logement
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showLogementsFromDb(idUser);

          }
      }
    xmlhttp.open("POST", "../../controller/addLogement.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}
////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//////////////////////////////////////////////////////////// MODIFIER ///////////////////////////////////////////////////////////////////////////////////////
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////


function editLogement(idUser, idLogement){
    console.log($('#editLogementForm'+idLogement).serializeArray());
    var array = $('#editLogementForm'+idLogement).serializeArray();
    var obj = {"adresse":array[0].value, "codePostal":array[1].value, "ville":array[2].value, "pays":array[3].value, "idLogement":idLogement};
    console.log(obj);
    //console.log(obj.fonction);
    //window.alert("AH");
    var dbParam = JSON.stringify(obj);
    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      //window.alert("BH");
          if (this.readyState == 4) {
              showLogementsFromDb(idUser);
              writePopUpsLogements(idUser);

          }
      }
    xmlhttp.open("POST", "../../controller/editLogementJS.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}
