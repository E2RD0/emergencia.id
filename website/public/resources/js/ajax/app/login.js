const API = HOME_PATH + 'api/app/user.php?action=';

$( '#login-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'login',
        data: $( '#login-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#login-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Loading';
        },
        complete: function() {
            $("#login-submit")[0].innerHTML = 'Continue';
        }
    })
    .done(function( response ) {
        // If user login is succesfull
        if ( response.status == 1) {
            redirect('app/user/profiles');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
        checkFields(errors, 'Contraseña');
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
