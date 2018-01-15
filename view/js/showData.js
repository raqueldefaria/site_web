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
                    txt += "<a href=\"clientPieces.php?id="+ myObj[it].id_Logement + "\" >" +
                        "<div class='section'>" +
                        "<p style='font-size: small'>" + myObj[it].logement_adresse + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_codePostal + " " + myObj[it].logement_ville + "</p>" +
                        "<p style='font-size: small'>" + myObj[it].logement_pays + "</p>" +
                        "</div>" +
                        "</a>"
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
                txt += "<a href='capteursPiece.php?id="+ myObj[it].id_Piece + "'>";
                switch (myObj[it].piece_type){
                    case "Garage":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/car.png'></div>";
                        break;
                    case "Chambre":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/bed.png'></div>";
                        break;
                    case "Cuisine":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/cutlery.png'></div>";
                        break;
                    case "Bureau":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/desktop.png'></div>";
                        break;
                    case "Salle de Bain":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/bathtub.png'></div>";
                        break;
                    case "Toilettes":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/toilet.png'></div>";
                        break;
                    case "Salon":
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p><img src='../images/client/room.png'></div>";
                        break;
                    default:
                        txt += "<div class='section'><p>" + myObj[it].piece_nom + "</p></div>";
                }
                txt += "</a>";
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
                                "                </div>\n" +
                                "            </div>";
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
                                "                </div>\n" +
                                "            </div>";
                            break;
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