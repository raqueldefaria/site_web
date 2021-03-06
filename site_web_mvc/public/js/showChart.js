/*************** Functions to show or hide the graphs ****************/

function popChart(div,limit, idPiece, idSensor, label, title, yLabel, xLabel) {
    var xData = xDataFromDb(limit, idPiece, idSensor);
    var yData = yDataFromDb(limit, idPiece, idSensor);
    createChart(xData, yData, label, title, yLabel, xLabel); // creating chart
    document.getElementById(div).style.display='block';
    return false;
}
function hide(div) {
    document.getElementById(div).style.display='none';
    return false;
}

/*************** Getting data from db (AJAX with JSON) ****************/

function xDataFromDb (limit, idPiece, idSensor){
    var parametersSentToDb, dbParam, xmlhttp, responseFromDb, it;
    var dataArray = [];

    parametersSentToDb = {"limit":limit, "idPiece":idPiece, "idSensor":idSensor};
    dbParam = JSON.stringify(parametersSentToDb);

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseFromDb = JSON.parse(this.responseText); // db data
            for (it = responseFromDb.length-1; it>-1; it--){ //separating data
                dataArray.push(String(responseFromDb[it].donnees_temps));
            }
        }
    };

    xmlhttp.open("POST", "model/ajax/chart.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

    return dataArray;
}

function yDataFromDb (limit, idPiece, idSensor){
    var parametersSentToDb, dbParam, xmlhttp, responseFromDb, it;
    var dataArray = [];

    parametersSentToDb = {"limit":limit, "idPiece":idPiece, "idSensor":idSensor};
    dbParam = JSON.stringify(parametersSentToDb);

    xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
        if (this.readyState === 4 && this.status === 200) {
            responseFromDb = JSON.parse(this.responseText); // db data
            for (it = responseFromDb.length-1; it>-1; it--){ //separating data
                dataArray.push(Number(responseFromDb[it].donnees_valeur));
            }
        }
    };

    xmlhttp.open("POST", "model/ajax/chart.php", true);
    xmlhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xmlhttp.send("x=" + dbParam);

    return dataArray;


}

/*************** Creating chart ****************/

function createChart (xData, yData, label, title, yLabel, xLabel){

    var chart = new Chart(document.getElementById("chart"), {
        type: 'line',
        data: {
            labels: xData,
            datasets: [
                {
                    data: yData,
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
            },
            scales: {
                yAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: yLabel
                    }
                }],
                xAxes: [{
                    scaleLabel: {
                        display: true,
                        labelString: xLabel
                    },
                    ticks: {
                        autoSkip: false,
                        maxRotation: 45,
                        minRotation: 30
                    }
                }]
            }
        }
    });
}





