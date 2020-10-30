const API_USUARIOS = HOME_PATH + 'api/app/user.php?action=';

$( '#recover-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'recoverPassword',
        data: $( '#recover-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#recover-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#recover-submit")[0].innerHTML = 'Continuar';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('app/user/recoverCode/' + $('#inputEmail').val().trim());
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
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

$( '#code-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'recoverCode',
        data: $( '#code-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#code-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#code-submit")[0].innerHTML = 'Verificar';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('app/user/newPassword');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Código');
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

$( '#form-newPassword' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'newPassword',
        data: $( '#form-newPassword' ).serialize()+'&email=' + getCookie('email'),
        dataType: 'json',
        beforeSend: function() {
            $("#password-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            $("#password-submit")[0].innerHTML = 'Continuar';
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if ( response.status == 1) {
            redirect('app/user/login');
        } else if (response.status == -1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Nueva Contraseña');
        checkFields(errors, 'NewPasswordR');
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
