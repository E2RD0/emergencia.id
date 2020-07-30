$('#names-submit').click(
    function(e){
        $('#stepOne').removeClass('active');
         $('#stepTwo').tab('show');
    }
);

$('#go-back-1').click(
    function(){
        $('#stepTwo').removeClass('active');
         $('#stepOne').tab('show');
    }
);

function submit(){
    var nombres = $('inputNombres').val();
    var apellidos = $('inputApellidos').val();
    var tel = $('inputTeléfono').val();

    $.ajax({
        type: 'post',
        url: API + 'newUser',
        data: {nombres : nombres, apellidos : apellidos, tel : tel},
        dataType: 'json',
        beforeSend: function() {
            $("#tel-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function() {
            $("#login-submit")[0].innerHTML = 'Continuar';
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
        checkFields(errors, 'Teléfono');
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

/*const API = HOME_PATH + 'api/app/user.php?action=';
$( '#register-form' ).submit(function( event ) {
    event.preventDefault();
    $.ajax({
        type: 'post',
        url: API + 'signup',
        data: $( '#register-form' ).serialize(),
        dataType: 'json',
        beforeSend: function() {
            $("#register-submit")[0].innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Cargando';
        },
        complete: function() {
            $("#register-submit")[0].innerHTML = 'Continuar';
        }
    })
    .done(function( response ) {
        // If user is registered succesfully
        if (response.status==1) {
            redirect('app/user/new');
        } else if(response.status==-1){
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
*/
