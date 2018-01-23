function writePopUpsLogements(idUser) {
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
                    txt += "<div id=\"editLogement"+myObj[it].id_Logement+"\" class=\"parentDisable\">"+
                           "<div class=\"addLogementOptions\" >"+
                           "<form method=\"post\" action=\"../../controller/addLogement.php\" id=\"editLogementForm"+myObj[it].id_Logement+"\">"+
                                "<p>Modifier un logement :</p>"+
                                "<input type=\"text\" name=\"adresse\" value=\""+ myObj[it].logement_adresse +"\" size=35 placeholder=\"Adresse\" required/>"+
                                "<input type=\"text\" name=\"codePostal\" value=\""+ myObj[it].logement_codePostal +"\" size=35 placeholder=\"Code Postal\" required/>"+
                                "<input type=\"text\" name=\"ville\" value=\""+ myObj[it].logement_ville +"\" size=35 placeholder=\"Ville\" required />"+
                                "<input type=\"text\" name=\"pays\" value=\""+ myObj[it].logement_pays +"\" size=35 placeholder=\"Pays\" required/>"+
                                "<input value=\"Modifier\" type=\"submit\" onclick=\"hide('editLogement"+myObj[it].id_Logement+"'); event.preventDefault(); editLogement("+idUser+","+myObj[it].id_Logement+" );\">"+
                                "<input value=\"Fermer\" type=\"submit\" onclick=\"return hide('editLogement"+myObj[it].id_Logement+"') \">"+
                            "</form>"+
                            "</div>"+
                            "</div>"
                }
                document.getElementById("editLogementPopContainer").innerHTML = txt;
            }
    };
    xmlhttp.open("POST", "../../model/showLogementsJs.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);
}
