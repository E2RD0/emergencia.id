$( document ).ready(function() {
    getUserInfo();
});

function getUserInfo()
{
    $.ajax({
        dataType: 'json',
        url: API + 'info'
    })
    .done(function( response ) {
        if (response.status) {
                $( '#spinnerSettings' )[0].innerHTML = '';
                $('#labelNombre').html(response.dataset.nombre);
                $( '#inputNombre' ).val( response.dataset.nombre );
                $( '#inputApellido' ).val( response.dataset.apellido );
                $( '#inputEmail' ).val( response.dataset.email );
                $( '#inputTeléfono' ).val( response.dataset.telefono );
                $( '#inputDirección' ).val( response.dataset.direccion );

        } else {
            swal(2, response.exception);
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

$( '#settings-form' ).submit(function( event ) {
    event.preventDefault();
    updateClient(this, document.getElementById('settings-submit'));
});

function updateClient(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API + 'update',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando...';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            getUserInfo();
            swal(1, response.message);
            $('#inputContraseña').val('');
            $('#inputNuevaContraseña').val('');
            $('#inputNewPasswordR').val('');
        } else if(response.status==-1){
            console.log('error con db');
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Nombre');
        checkFields(errors, 'Apellido');
        checkFields(errors, 'Email');
        checkFields(errors, 'Teléfono');
        checkFields(errors, 'Dirección');
        checkFields(errors, 'Contraseña');
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
}
