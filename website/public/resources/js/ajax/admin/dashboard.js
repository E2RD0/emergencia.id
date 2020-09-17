/*var canvas = document.getElementById("myChart");
var ctx = canvas.getContext("2d");
ctx.font = "14px Arial";
ctx.textAlign = "center";
ctx.fillText("Debes seleccionar una opción", 200, 200);*/

const API_GRAFICOS= HOME_PATH + 'api/admin/analiticas.php?action=';
$( document ).ready(function() {
    getCountries();
});

function getCountries(){
    $.ajax({
        url: API_GRAFICOS + 'getCountries',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            let jsonResponse = response.dataset;
            let dropDown = $('#inputPais').html();

            jsonResponse.forEach(pais => {
                dropDown += `
                    <option value="${pais.id_pais}">${pais.nombre}</option>
                `;
            });

            $('#inputPais').html(dropDown);
        },
        error: function (jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }
    });
}


$('#tipoSangre').change(function( event ) {
    $.ajax({
        type: 'post',
        url: API_GRAFICOS + 'graficoTipoSangre',
        data: $( '#tipoSangreForm' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        if ( response.status == 1) {
            var columns = [];
            var values = [];
            var data = response.dataset;
            for (var i in data) {
                columns.push(data[i].column);
                values.push(data[i].value);
            }
            grafico('graficoTipoSangre', 'Tipo de sangre por perfil médico', 'bar', columns, values);
        } else{
            swal(2, response.exception);
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

$('#inputPais').change(function( event ) {
    $.ajax({
        type: 'post',
        url: API_GRAFICOS + 'graficoPerfilesPais',
        data: $( '#perfilesPaisForm' ).serialize(),
        dataType: 'json'
    })
    .done(function( response ) {
        if ( response.status == 1) {
            var columns = [];
            var values = [];
            var data = response.dataset;
            for (var i in data) {
                columns.push(data[i].column);
                values.push(data[i].value);
            }
            grafico('graficoPerfilesPais', 'Cantidad de perfiles médicos', 'bar', columns, values);
        } else{
            swal(2, response.exception);
        }
    })
    .fail(function( jqXHR ) {
        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
});

var timer;
$('#inputFechaInicio').change(perfilesFecha);
$('#inputFechaFin').change(perfilesFecha);

function perfilesFecha(){
    clearTimeout(timer);
    timer = setTimeout(function () {
        var form = $('#perfilesFechaForm');
        var fechaInicio = $('#inputFechaInicio');
        var fechaFin = $('#inputFechaFin');

        if(form[0].checkValidity()){
            var d1 = new Date(fechaInicio.val());
            var d2 = new Date(fechaFin.val());
            if (d2.getTime() >d1.getTime()) {
                $("#errorPerfilesFecha").html('');
                $.ajax({
                    type: 'post',
                    url: API_GRAFICOS + 'graficoPerfilesFecha',
                    data: $( '#perfilesFechaForm' ).serialize(),
                    dataType: 'json'
                })
                .done(function( response ) {
                    if ( response.status == 1) {
                        var columns = [];
                        var values = [];
                        var data = response.dataset;
                        for (var i in data) {
                            columns.push(data[i].column);
                            values.push(data[i].value);
                        }
                        grafico('graficoPerfilesFecha', 'Cantidad de perfiles médicos', 'bar', columns, values);
                    } else if( response.status == -1){
                        swal(2, response.exception);
                    }
                    else{
                        $("#errorPerfilesFecha").html(response.exception);
                    }
                })
                .fail(function( jqXHR ) {
                    // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                    if ( jqXHR.status == 200 ) {
                        console.log( jqXHR.responseText );
                    } else {
                        console.log( jqXHR.status + ' ' + jqXHR.statusText );
                    }
                });
            }
            else{
                $("#errorPerfilesFecha").html('La fecha inicial debe de ser anterior a la fecha final.');
            }
        }
    }, 2000);

}


function grafico(id,nombre, tipo, ejeX, ejeY){
    var cxt = $(document.getElementById(id));
    if(cxt.data('graph') != undefined){
        cxt.data('graph').destroy();
    }
    var options = tipo == 'bar' ?
    {scales: {
        yAxes: [{
            ticks: {
                beginAtZero: true,
                stepSize: 1
            }
        }]
    }}:
    {};
    var graph = new Chart(cxt, {
        type: tipo,
        data: {
            labels: ejeX,
            datasets: [{
                label: nombre,
                data: ejeY,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: options
    });
    cxt.data('graph', graph);
}
