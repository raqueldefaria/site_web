/*************** Functions to show or hide the graphs ****************/

function popChart(div,table,limit, label, title) {
    var dataArray = gettingDataFromDb(table, limit);
    console.log(dataArray);
    createChart(dataArray, label, title); // creating chart
    document.getElementById(div).style.display='block';
    return false;
}
function hide(div) {
    document.getElementById(div).style.display='none';
    return false;
}

/*************** Getting data from db (AJAX with JSON) ****************/

function gettingDataFromDb (table, limit){
    var parametersSentToDb, dbParam, xmlhttp, responseFromDb, it;
    var yDataArray = [], xDataArray = [], dataArray = [];

    parametersSentToDb = {"table":table, "limit":limit};
    dbParam = JSON.stringify(parametersSentToDb);

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseFromDb = JSON.parse(this.responseText); // db data
            for (it = 0; it < responseFromDb.length; it++){ //separating data
                yDataArray.push(Number(responseFromDb[it].donnees_valeur));
                xDataArray.push(String(responseFromDb[it].donnees_temps));
            }
            dataArray.push(xDataArray);
            dataArray.push(yDataArray);
        }
    };

    xmlhttp.open("POST", "../../model/graph.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

    return dataArray;

}

/*************** Creating chart ****************/

function createChart (dataArray, label, title){

    var chart = new Chart(document.getElementById("chart"), {
        type: 'line',
        data: {
            labels: dataArray[0],
            datasets: [
                {
                    data: dataArray[1],
                    label: label,
                    borderColor: "#3e95cd",
                    fill: false
                }
            ]
        },
        options: {
            title: {
                display: true,
                text: title
            }
        }
    });
}





