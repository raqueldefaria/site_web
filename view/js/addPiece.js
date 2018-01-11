function hideAdd(div, idUser) {
    console.log(idUser);
    document.getElementById(div).style.display='none';
    return false;
}

function popAdd(div) {
    document.getElementById(div).style.display='block';
    return false;
}

/*************** Getting data from db (AJAX with JSON) ****************/

function addDataToDb (idUser){
    var parametersSentToDb, dbParam, xmlhttp, responseFromDb;

    parametersSentToDb = {"table":"piece", "user":idUser};
    dbParam = JSON.stringify(parametersSentToDb);

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseFromDb = JSON.parse(this.responseText); // db data
        }
    };

    xmlhttp.open("POST", "../../model/addPiece.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);


}