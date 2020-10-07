/*var canvas = document.getElementById("myChart");
var ctx = canvas.getContext("2d");
ctx.font = "14px Arial";
ctx.textAlign = "center";
ctx.fillText("Debes seleccionar una opción", 200, 200);*/

const API_GRAFICOS = HOME_PATH + 'api/admin/analiticas.php?action=';
var generatingReport = false;
$(document).ready(function() {
    getCountries();
    graficaCondicionMedica();
    graficaProdecimientos();
    graficoTop5Medicamentos();
    graficoEstadoUsuarios();
});

function report(event, type) {
    if (generatingReport === false){
        generatingReport = true;
        event.innerHTML =
            '<i class="far fa-spinner-third icon-load ml-0"></i><p class="d-inline-block my-0 ml-2">Generando Reporte</p>';
        axios.post(API_GRAFICOS + type).then((response) => {
            if (response.data.status == 1) {
                fetchResource(HOST_NAME + response.data.file);
            } else {
                swal(2, response.data.exception);
            }
            generatingReport = false;
            event.innerHTML = "Generar Reporte";
        });
    }
};

function getCountries() {
    $.ajax({
        url: API_GRAFICOS + 'getCountries',
        type: 'post',
        dataType: 'json',
        success: function(response) {
            let jsonResponse = response.dataset;
            let dropDown = $('#inputPais').html();

            jsonResponse.forEach(pais => {
                dropDown += `
                    <option value="${pais.id_pais}">${pais.nombre}</option>
                `;
            });

            $('#inputPais').html(dropDown);
        },
        error: function(jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        }
    });
}


$('#tipoSangre').change(function(event) {
    $.ajax({
            type: 'post',
            url: API_GRAFICOS + 'graficoTipoSangre',
            data: $('#tipoSangreForm').serialize(),
            dataType: 'json'
        })
        .done(function(response) {
            if (response.status == 1) {
                var columns = [];
                var values = [];
                var data = response.dataset;
                for (var i in data) {
                    columns.push(data[i].column);
                    values.push(data[i].value);
                }
                grafico('graficoTipoSangre', 'Tipo de sangre por perfil médico', 'bar', columns, values);
            } else {
                swal(2, response.exception);
            }
        })
        .fail(function(jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});

$('#inputPais').change(function(event) {
    $.ajax({
            type: 'post',
            url: API_GRAFICOS + 'graficoPerfilesPais',
            data: $('#perfilesPaisForm').serialize(),
            dataType: 'json'
        })
        .done(function(response) {
            if (response.status == 1) {
                var columns = [];
                var values = [];
                var data = response.dataset;
                for (var i in data) {
                    columns.push(data[i].column);
                    values.push(data[i].value);
                }
                grafico('graficoPerfilesPais', 'Cantidad de perfiles médicos', 'bar', columns, values);
            } else {
                swal(2, response.exception);
            }
        })
        .fail(function(jqXHR) {
            // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
            if (jqXHR.status == 200) {
                console.log(jqXHR.responseText);
            } else {
                console.log(jqXHR.status + ' ' + jqXHR.statusText);
            }
        });
});

var timer;
$('#inputFechaInicio').change(perfilesFecha);
$('#inputFechaFin').change(perfilesFecha);

function perfilesFecha() {
    clearTimeout(timer);
    timer = setTimeout(function() {
        var form = $('#perfilesFechaForm');
        var fechaInicio = $('#inputFechaInicio');
        var fechaFin = $('#inputFechaFin');

        if (form[0].checkValidity()) {
            var d1 = new Date(fechaInicio.val());
            var d2 = new Date(fechaFin.val());
            if (d2.getTime() > d1.getTime()) {
                $("#errorPerfilesFecha").html('');
                $.ajax({
                        type: 'post',
                        url: API_GRAFICOS + 'graficoPerfilesFecha',
                        data: $('#perfilesFechaForm').serialize(),
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.status == 1) {
                            var columns = [];
                            var values = [];
                            var data = response.dataset;
                            for (var i in data) {
                                columns.push(data[i].column);
                                values.push(data[i].value);
                            }
                            grafico('graficoPerfilesFecha', 'Cantidad de perfiles médicos', 'bar', columns, values);
                        } else if (response.status == -1) {
                            swal(2, response.exception);
                        } else {
                            $("#errorPerfilesFecha").html(response.exception);
                        }
                    })
                    .fail(function(jqXHR) {
                        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                        if (jqXHR.status == 200) {
                            console.log(jqXHR.responseText);
                        } else {
                            console.log(jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
            } else {
                $("#errorPerfilesFecha").html('La fecha inicial debe de ser anterior a la fecha final.');
            }
        }
    }, 2000);

}

var timer2;
$('#inputFechaInicio2').change(perfilesFecha2);
$('#inputFechaFin2').change(perfilesFecha2);

function perfilesFecha2() {
    clearTimeout(timer2);
    timer2 = setTimeout(function() {
        var form = $('#perfilesFechaForm2');
        var fechaInicio = $('#inputFechaInicio2');
        var fechaFin = $('#inputFechaFin2');

        if (form[0].checkValidity()) {
            var d1 = new Date(fechaInicio.val());
            var d2 = new Date(fechaFin.val());
            if (d2.getTime() > d1.getTime()) {
                $("#errorPerfilesFecha2").html('');
                $.ajax({
                        type: 'post',
                        url: API_GRAFICOS + 'graficoUsuariosFecha',
                        data: $('#perfilesFechaForm2').serialize(),
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.status == 1) {
                            var columns = [];
                            var values = [];
                            var data = response.dataset;
                            for (var i in data) {
                                columns.push(data[i].column);
                                values.push(data[i].value);
                            }
                            grafico('graficoPerfilesFecha2', 'Cantidad de usuarios', 'bar', columns, values);
                        } else if (response.status == -1) {
                            swal(2, response.exception);
                        } else {
                            $("#errorPerfilesFecha2").html(response.exception);
                        }
                    })
                    .fail(function(jqXHR) {
                        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                        if (jqXHR.status == 200) {
                            console.log(jqXHR.responseText);
                        } else {
                            console.log(jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
            } else {
                $("#errorPerfilesFecha2").html('La fecha inicial debe de ser anterior a la fecha final.');
            }
        }
    }, 2000);

}

var timer2;
$('#inputFechaInicio3').change(perfilesFecha3);
$('#inputFechaFin3').change(perfilesFecha3);

function perfilesFecha3() {
    clearTimeout(timer2);
    timer2 = setTimeout(function() {
        var form = $('#perfilesFechaForm3');
        var fechaInicio = $('#inputFechaInicio3');
        var fechaFin = $('#inputFechaFin3');

        if (form[0].checkValidity()) {
            var d1 = new Date(fechaInicio.val());
            var d2 = new Date(fechaFin.val());
            if (d2.getTime() > d1.getTime()) {
                $("#errorPerfilesFecha3").html('');
                $.ajax({
                        type: 'post',
                        url: API_GRAFICOS + 'graficoUsuariosPrivFecha',
                        data: $('#perfilesFechaForm3').serialize(),
                        dataType: 'json'
                    })
                    .done(function(response) {
                        if (response.status == 1) {
                            var columns = [];
                            var values = [];
                            var data = response.dataset;
                            for (var i in data) {
                                columns.push(data[i].column);
                                values.push(data[i].value);
                            }
                            grafico('graficoPerfilesFecha3', 'Cantidad de usuarios', 'bar', columns, values);
                        } else if (response.status == -1) {
                            swal(2, response.exception);
                        } else {
                            $("#errorPerfilesFecha3").html(response.exception);
                        }
                    })
                    .fail(function(jqXHR) {
                        // Se verifica si la API ha respondido para mostrar la respuesta, de lo contrario se presenta el estado de la petición.
                        if (jqXHR.status == 200) {
                            console.log(jqXHR.responseText);
                        } else {
                            console.log(jqXHR.status + ' ' + jqXHR.statusText);
                        }
                    });
            } else {
                $("#errorPerfilesFecha3").html('La fecha inicial debe de ser anterior a la fecha final.');
            }
        }
    }, 2000);

}

function graficaCondicionMedica()
{
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: API_GRAFICOS + 'graficoCondicionMedica',
        data: null
    })
    .done(function( response ) {
        if (true) {
            let condicion = [];
            let cantidad = [];
            response.forEach(function( row ) {
                condicion.push( row.condicion );
                cantidad.push( row.recuentofilas );
            });

            grafico( 'graficoCondicionMedica', 'Cantidad de usuarios', 'bar', condicion, cantidad);
        } else {
            $( '#graficoCondicionMedica' ).remove();
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

function graficoTop5Medicamentos() {
    $.ajax({
        type: 'post',
        url: API_GRAFICOS + 'graficoTop5Medicamentos',
        dataType: 'json'
    })
    .done(function( response ) {
        if ( response.status == 1) {
            let columns = [];
            let values = [];
            let data = response.dataset;
            for (let i in data) {
                columns.push(data[i].nombre);
                values.push(data[i].cantidad);
            }
            grafico('graficoTop5Medicamentos', 'Top 5 medicamentos más solicitados', 'polarArea', columns, values);
        } else {
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
}

function graficoEstadoUsuarios() {
    $.ajax({
        type: 'post',
        url: API_GRAFICOS + 'graficoEstadoUsuarios',
        dataType: 'json'
    })
    .done(function( response ) {
        if ( response.status == 1) {
            let columns = [];
            let values = [];
            let data = response.dataset;
            console.log(data);
            for (let i in data) {
                columns.push(data[i].estado);
                values.push(data[i].cantidad);
            }
            grafico('graficoEstadoUsuarios', 'Cantidad de usuarios por estado ISSS', 'pie', columns, values);
        } else {
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
}

function graficaProdecimientos()
{
    $.ajax({
        type: 'post',
        dataType: 'json',
        url: API_GRAFICOS + 'graficoProcedimientos',
        data: null
    })
    .done(function( response ) {
        if (true) {
            let procedimiento = [];
            let cantidad = [];
            response.forEach(function( row ) {
                procedimiento.push( row.procedimiento );
                cantidad.push( row.recuentofilas );
            });

            grafico( 'graficoProcedimiento', 'Cantidad de usuarios', 'bar', procedimiento, cantidad);
        } else {
            $( '#graficoProcedimiento' ).remove();
        }
    })
    .fail(function( jqXHR ) {
        if ( jqXHR.status == 200 ) {
            console.log( jqXHR.responseText );
        } else {
            console.log( jqXHR.status + ' ' + jqXHR.statusText );
        }
    });
}



function grafico(id, nombre, tipo, ejeX, ejeY) {
    var cxt = $(document.getElementById(id));
    if (cxt.data('graph') != undefined) {
        cxt.data('graph').destroy();
    }
    var options = tipo == 'bar' ? {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero: true,
                    stepSize: 1
                }
            }]
        }
    } : {};
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
