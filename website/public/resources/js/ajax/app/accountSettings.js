const API_USUARIOS = HOME_PATH + 'api/app/user.php?action=';
const API_PERFIL = HOME_PATH + 'api/app/perfil.php?action=';
$( document ).ready(function() {
    getUserProfiles();
    getUserInfo();
});

function getUserProfiles(){
    $.ajax({
        url: API_PERFIL + 'perfilesUsuario',
        type: 'post',
        dataType: 'json',
        success: function (response) {
            let jsonResponse = response.dataset;
            let dropDown = $('#inputPerfil').html();

            jsonResponse.forEach(perfil => {
                dropDown += `
                    <option value="${perfil.id_perfil_medico}">${perfil.nombres} ${perfil.apellidos}</option>
                `;
            });

            $('#inputPerfil').html(dropDown);
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
function getUserInfo()
{
    $.ajax({
        dataType: 'json',
        url: API_USUARIOS + 'info'
    })
    .done(function( response ) {
        if (response.status) {
                $( '#spinnerSettings' )[0].innerHTML = '';
                $( '#inputEmail' ).val( response.dataset.email );
                $( '#inputTeléfono' ).val( response.dataset.telefono );
                $( '#inputPerfil' ).val( response.dataset.id_perfil_medico );

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

$( '#account-form' ).submit(function( event ) {
    event.preventDefault();
    updateClient(this, document.getElementById('account-submit'));
});

$( '#password-form' ).submit(function( event ) {
    event.preventDefault();
    updatePassword(this, document.getElementById('password-submit'));
});

function updateClient(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'update',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            getUserInfo();
            $('#nombreUsuario').html(($('#inputPerfil option:selected').text()));
        } else if(response.status==-1){
            swal(2, response.exception);
        }
        var errors = response.errors;
        checkFields(errors, 'Email');
        checkFields(errors, 'Teléfono');
        checkFields(errors, 'Perfil');
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

function updatePassword(form, submitButton)
{
    var inner = submitButton.innerHTML;
    $.ajax({
        type: 'post',
        url: API_USUARIOS + 'updatePassword',
        data: $(form).serialize(),
        dataType: 'json',
        beforeSend: function() {
            submitButton.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>';
        },
        complete: function() {
            submitButton.innerHTML = inner;
        }

    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            $('#password-form')[0].reset();
            swal(1, response.message);
        } else if(response.status==-1){
            swal(2, response.exception);
        }
        var errors = response.errors;
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
