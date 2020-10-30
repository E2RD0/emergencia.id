const API = HOME_PATH + 'api/app/user.php?action=';

function logout() {
    swal(4, '¿Estás seguro de que quieres cerrar sesión?', false, 0, true, out);
}

function out(text="", alert = 1){
    $.ajax({
        dataType: 'json',
        url: API + 'logout'
    })
    .done(function( response ) {
        if ( response.status ) {
            var message = text == "" ? response.message : text;
            swal( alert, message, 'app/user/login' );
        }
        else if(response.status!= -9) {
            swal( 2, response.exception);
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

idleTime = 0;
$(document).ready(function() {

    var idleInterval = setInterval("timerIncrement()", 300000); // 1 minute //60000
    $(document.body).mousemove(function(e) {
        idleTime = 0;
    });
    $(document.body).keypress(function(e) {
        idleTime = 0;
    });

});

function timerIncrement() {

    idleTime = idleTime + 1;

    if (idleTime >= 2) {
        out('Sesión cerrada por inactividad', 0)
    }
}
